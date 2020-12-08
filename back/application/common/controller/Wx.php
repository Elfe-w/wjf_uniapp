<?php


namespace app\common\controller;


use think\Config;
use think\Request;

/**
 * Class Wx
 * @package app\common\controller
 */
class Wx
{

    private static $instance;

    private static $appId;

    private static $appSecret;

    private static $apiKey;

    private static $mchId;

    private static $notifyUrl;

    /**
     * Wx constructor.
     */
    private function __construct()
    {
        $config = Config::get('WxConfig');
        self::$appId = $config['appId'];
        self::$appSecret = $config['appSecret'];
        self::$apiKey = $config['pay']['apiKey'];
        self::$mchId = $config['pay']['mchId'];
        self::$notifyUrl = $config['pay']['notifyUrl'];
    }

    /**
     * @return Wx
     */
    public static function init(): Wx
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 微信授权
     * @param string|mixed $authCode 微信授权码
     * @return false|mixed
     */
    public function UserAuth(string $authCode){
        $host = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.self::$appId.'&secret='.self::$appSecret.'&code='.$authCode.'&grant_type=authorization_code';
        $result = $this->Send($host);
        if(array_key_exists('errmsg',$result)){
            return false;
        }
        return $result;
    }

    /**
     * 微信订单预创建
     * @param string $title 商品标题
     * @param string|float $money 金额
     * @param string|null $busNo 商户订单号,不传则默认生成
     * @return array|false
     */
    public function PreOrder(string $title, $money, string $busNo = null){
        $flag = false;
        if ($busNo == null){
            $busNo = General::merchantsOrderNumber('WX');
            $flag = true;
        }
        $ip = Request::instance()->ip();
        $nonce_str = md5(substr(str_shuffle('QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm'),0,32).time());
        $urlParameter =
            'appid='.self::$appId.
            '&body='.$title.
            '&mch_id='.self::$mchId.
            '&nonce_str='.$nonce_str.
            '&notify_url='.self::$notifyUrl.
            '&out_trade_no='.$busNo.
            '&spbill_create_ip='.$ip.
            '&total_fee='.$money.
            '&trade_type=APP';
        $sign = strtoupper(md5($urlParameter.'&key='.self::$apiKey));
        $data =
            '<xml>\n'.
            '<appid>'.self::$appId.'</appid>\n'.
            '<mch_id>'.self::$mchId.'</mch_id>\n'.
            '<body>'.$title.'</body>\n'.
            '<nonce_str>'.$nonce_str.'</nonce_str>\n'.
            '<out_trade_no>'.$busNo.'</out_trade_no>\n'.
            '<total_fee>'.$money.'</total_fee>\n'.
            '<trade_type>APP</trade_type>\n'.
            '<spbill_create_ip>'.$ip.'</spbill_create_ip>\n'.
            '<notify_url>'.self::$notifyUrl.'</notify_url>\n'.
            '<sign>'.$sign.'</sign>'.
            '</xml>';
        //到此以上数据均可覆盖
        $result = $this->Send('https://api.mch.weixin.qq.com/pay/unifiedorder',$data);
        $result = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA);
        $result = json_decode(json_encode($result),true);
        if($result['return_code'] != 'SUCCESS'){
            return false;
        }
        $result['partnerid'] =$result['mch_id'];
        $result['package'] = 'Sign=WXPay';
        $result['timestamp'] = (string)time();
        $sign = 'appid='.$result['appid'].'&noncestr='.$result['nonce_str']. '&package=Sign=WXPay'. '&partnerid='.$result['mch_id']. '&prepayid='.$result['prepay_id']. '&timestamp='.$result['timestamp'];
        $sign = strtoupper(md5($sign.'&key='.self::$apiKey));
        $result = [
            'appid'=>$result['appid'],
            'noncestr'=>$result['nonce_str'],
            'package'=>$result['package'],
            'partnerid'=>$result['partnerid'],
            'prepayid'=>$result['prepay_id'],
            'timestamp'=>$result['timestamp'],
            'sign'=>$sign
        ];
        return $flag == true ? $result : ['busNo'=>$busNo,'data'=>$result];
    }

    /**
     * @param string $host 发送地址
     * @param mixed $data 发送的数据,填入数据则为提交post
     * @return mixed 返回正常结果数组
     */
    private function Send(string $host, $data = null){
        $curl = curl_init();
        $header = [];
        if ($data != null){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
            $header[] = 'Content-type: text/xml';
        }
        curl_setopt($curl, CURLOPT_URL, $host);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_NOBODY, false);
        $result = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($result,true);
        return $data == null ? $result : $data;
    }
}