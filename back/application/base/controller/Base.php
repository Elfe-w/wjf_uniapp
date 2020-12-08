<?php
declare(strict_types=1);


namespace app\base\controller;


use app\common\controller\AES;
use app\common\controller\RSA;
use think\Config;
use think\Controller;
use think\exception\HttpResponseException;
use think\Log;
use think\Request;
use think\Response;

/**
 * Class Base
 * @package app\base\controller
 */


class Base extends Controller
{
    protected $token;

    /**
     * @var array|string 请求数据
     */
    protected $data;

    protected $config;



    //控制器的初始化方法
    protected function _initialize() :void
    {
        Log::log("访问了".$this->request->getInput());
        parent::_initialize();
        //处理跨域请求
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials:true');
        // 响应类型
        header('Access-Control-Allow-Methods:POST,GET,PUT,OPTIONS');
        // 响应头设置
        header('Access-Control-Allow-Headers:Origin,X-Requested-With,Content-Type,Accept,Authorization');
        //OPTIONS请求缓存48小时，避免多次预请求
        header('Access-Control-Max-Age:172800');
        //过滤OPTIONS请求
        if(Request::instance()->method() === 'OPTIONS'){
            $this->ok();
        }
        $this->config = Config::get('Config');
        if($this->config['request']['enableSecret'] == true && (Request::instance()->getInput() != '' && Request::instance()->getInput() != '{}')){
            switch ($this->config['request']['secretMode']){
                case 'RSA':
                    $this->data = RSA::privateDecrypt2048(Request::instance()->getInput(), $this->config['request']['private'] == 'default' ? null : $this->config['request']['private']);
                    if($this->data == false){
                        $this->fail('data get error! decrypt method to '.$this->config['request']['secretMode']);
                    }
                    $this->data = json_decode($this->data,true);break;
                case 'AES':
                    $this->data = AES::decrypt(Request::instance()->getInput(), $this->config['request']['public'] == 'default' ? null : $this->config['request']['public']);
                    if($this->data == false){
                        $this->fail('data get error!');
                    }
                    $this->data = json_decode($this->data,true);break;
                default:$this->data = Request::instance()->{strtolower($_SERVER['REQUEST_METHOD'])}();
            }
            if($this->data == null || $this->data == ''){
                $this->fail('data get error!');
            }
        }else{
            $this->data = Request::instance()->{strtolower($_SERVER['REQUEST_METHOD'])}();
        }
    }

    /**
     * 通用的响应
     * @param int|string $code 错误码
     * @param string $msg 错误信息
     * @param mixed $data 返回的数据
     * @param int $responseCode 浏览器状态码
     */
    protected function response($code, string $msg,$data,int $responseCode = 200) :void
    {
        $res= compact('code', 'msg', 'data');
        $response = Response::create($res,'json',$responseCode);
        throw new HttpResponseException($response);
    }

    /**
     * 默认成功的响应
     * @param mixed $data 返回数据
     * @param int|string $code 响应码
     * @param string $msg 响应信息
     */
    protected function ok($data = [],$code = 20000,string $msg='') :void
    {
        if ($msg == ''){
            //extra目录中获取代码
            $msg = Config::get('Code')['base'][(string)$code];
        }
        $this->response($code, $msg, $data);
    }

    /**
     * 兼容字符数据,在只需要返回msg的时候使用
     * @param mixed $data 返回数据
     * @param int|string $code 响应码
     * @param string $msg 响应信息
     */
    protected function stringOk($data = [], $code = 20000, string $msg=''): void
    {
        if(is_string($data)){
            $msg = $data;
            $data = [];
        }elseif ($msg == ''){
            //extra目录中获取代码
            $msg = Config::get('Code')['base'][(string)$code];
        }
        $this->response($code, $msg, $data);
    }

    /**
     * 根据code返回提示信息,默认获取base定义的code
     * 自定义code请在extra下Code.php文件中定义
     * @param int|string $code code
     * @param string $file 获取的文件名,默认为Code
     * @param string $config 需要获取的位置,默认为base
     */
    protected function codeOk($code = 20000,$file = 'Code',$config = ''): void
    {
        if($file != 'Code' && $config == ''){
            $this->response($code,Config::get($file)[(string)$code],[]);
        }else{
            $this->response($code,Config::get($file)[$config == '' ? 'base' : $config][(string)$code],[]);
        }

    }

    /**
     * 默认假失败的响应
     * @param string $msg 响应信息
     * @param int|string $code 响应码
     * @param array|mixed $data 返回数据
     */
    protected function err($msg = '',$code=50000,$data = []): void
    {
        $this->response($code,$msg,$data);
    }

    /**
     * 默认真实失败的响应
     * @param string $msg 响应信息
     * @param int|string $code 响应码
     * @param array|mixed $data 返回数据
     */
    protected function fail(string $msg ='',$code = 50000, $data = []) :void
    {
        if ($msg == ''){
            //extra目录中获取代码
            $msg = Config::get('Code')['base'][(string)$code];
        }
        $this->response($code, $msg, $data,500);
    }

}