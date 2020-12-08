<?php


namespace app\common\controller;


use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use think\Config;
use think\Log;

/**
 * Class AliCloud
 * @package app\common\controller
 */
class AliCloud
{
    private static $instance;

    private static $config;

    /**
     * AliPay constructor.
     * 详细配置请看extra中的配置
     */
    private function __construct(){
        self::$config = Config::get('AliConfig');
    }

    /**
     * 调用时初始化
     * @return AliCloud
     */
    public static function init(): AliCloud
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 短信发送
     * 默认为验证码发送
     * 请在extra中配置签名模版
     * @param string $userPhone 用户手机号码
     * @param array|null $TemplateParam 模版参数
     * @param string|null $signName 签名名称
     * @param string|null $smsModel 签名模版
     * @return false|array
     * @throws ClientException
     */
    public function SendSMS(string $userPhone, array $TemplateParam = null, string $signName = null, string $smsModel = null): bool
    {
        $flag = true;
        if($TemplateParam == null){
            $TemplateParam = ['code'=>(string)General::random(6)];
            $flag = false;
        }
        if($signName == null){
            $signName = self::$config['sms']['signName'];
        }
        if($smsModel == null){
            $smsModel = self::$config['sms']['signModel'];
        }
        AlibabaCloud::accessKeyClient(self::$config['accessKey'], self::$config['accessKeySecret'])
            ->regionId('cn-hangzhou')
            ->asDefaultClient();
        try {
            $result = AlibabaCloud::rpc()
                ->product(self::$config['sms']['product'])
                ->version(self::$config['sms']['version'])
                ->action(self::$config['sms']['action'])
                ->method(self::$config['sms']['method'])
                ->host(self::$config['sms']['host'])
                ->options([
                    'query' => [
                        'RegionId' => "cn-hangzhou",
                        'PhoneNumbers' => $userPhone,
                        'SignName' => $signName,
                        'TemplateCode' => $smsModel,
                        'TemplateParam' => json_encode($TemplateParam),
                    ],
                ])
                ->request();
            $result = json_decode($result->toJson(),true);
            if($result['Message'] != 'OK'){
                return Config::get('Code')['aliSMS'][$result['Code']];
            }
            return $flag == false ? ['code'=>$TemplateParam['code'],'result'=>$result]:$result;
        } catch (ClientException $e) {
            Log::log($e->getMessage());
            return false;
        } catch (ServerException $e) {
            Log::log($e->getMessage());
            return false;
        }
    }
}