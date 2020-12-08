<?php
declare(strict_types=1);


namespace app\common\controller;


use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use Alipay\EasySDK\Kernel\Factory;
use think\Config;
use think\Log;

/**
 * Class AliPay
 * @package app\common\controller
 */
class AliPay
{
    private static $instance;
    private static $config;
    /**
     * AliPay constructor.
     * 详细配置请看extra中的配置
     */
    private function __construct(){
        self::$config = Config::get('AliConfig');
        $config = self::$config['pay'];
        $options = new \Alipay\EasySDK\Kernel\Config();
        $options->protocol = $config['protocol'];
        $options->gatewayHost = $config['gatewayHost'];
        $options->signType = $config['signType'];
        $options->appId = $config['appId'];
        $options->notifyUrl = $config['notifyUrl'];
        $options->merchantPrivateKey = $config['merchantPrivateKey'];
        $options->alipayCertPath = $config['alipayCertPath'];
        $options->alipayRootCertPath = $config['alipayRootCertPath'];
        $options->merchantCertPath = $config['merchantCertPath'];
        $options->alipayPublicKey = $config['alipayPublicKey'];
        $options->encryptKey = $config['encryptKey'];
        Factory::setOptions($options);
        $options = null;
    }

    /**
     * 调用时初始化
     * @return AliPay
     */
    public static function init(): AliPay
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 支付宝授权
     * @param string $code 支付宝返回的auth_code
     * @return bool|string
     */
    public function UserAuth(string $code)
    {
        try {
            return Factory::base()->oauth()->getToken($code)->userId;
        }catch (\Exception $e){
            return false;
        }
    }


}