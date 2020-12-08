<?php
namespace app\lib\exception;

use Exception;
use think\Config;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;
use think\Log;
use think\Response;
use think\response\Json;

/**
 * Class BaseException
 * @package app\lib\exception
 */
class BaseException extends Handle
{

    /**
     * 异常处理拦截类
     * @param Exception $e
     * @return Response|Json
     */
    public function render(Exception $e)
    {
        $debug = Config::get('Config')['debug'];
        // 参数验证错误
        if ($e instanceof ValidateException) {
            return json('不正确的参数', 500);
        }
        // 请求异常
        if ($e instanceof HttpException && request()->isAjax()) {

            return response($e->getMessage(), $e->getStatusCode());
        }
        //TODO::开发者对异常的操作
        $msg = $e->getMessage();
        $data = explode(':',$msg);

        //以下是PHP错误处理
        if($data[0] == 'Undefined index'){
            $msg = '请求体中可能缺少:'.$data[1];
        }
        //该路由不存在
        if($data[0] == 'module not exists'){
            $msg = '该地址路径没有携带参数，请重试:'.$data[1];
        }
        if($data[0]=='Parse error'){
            $result = explode(',',$data[1]);
            $msg = '语法错误,请检查最近改动! 提示信息:'.end($result);
        }

        //以下是数据库错误处理
        if($data[0] == 'Uncaught InvalidArgumentException'){
            $msg = '与服务器失去连接，请稍后再试!';
        }
        if($data[0]=='SQLSTATE[42S22]'){
            $result = explode(',',end($data));
            $resultColumn= str_replace(['/1054 Unknown column \'+/i', '/\' in \'where clause\'+/i'], '', end($result));
            $msg = '不存在的字段名，请检查提交字段:'.$resultColumn;
        }
        if($data[0] == "Array to string conversion"){
            $msg = '预计内容为字符串,实际内容为数组！请检查代码!';
        }
        //可以在此交由系统处理
        Log::log($e->getLine());
        Log::log($e->getTraceAsString());
        Log::log($msg);
        $res=[
            'code'=>500,
            'msg'=>$debug['enable'] == false ? $msg : $debug['msg'],
            'data'=>[]
        ];
        return json($res);
    }

}