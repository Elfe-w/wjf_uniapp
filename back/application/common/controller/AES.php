<?php


namespace app\common\controller;


use think\Config;
use think\Log;

/**
 * Class AES
 * @package app\common\controller
 */
class AES
{
    /**
     * @param string $data 数据
     * @param string|null $key 密钥
     * @return false|string
     */
    public static function encrypt(string $data,string $key = null){
        if ($key == null){
            $key = Config::get('Config')['aesKey'];
        }
        return openssl_encrypt($data,'AES-128-ECB',$key,OPENSSL_RAW_DATA);
    }

    /**
     * @param string $data 数据
     * @param string|null $key 密钥
     * @return false|string
     */
    public static function decrypt(string $data,string $key = null){
        if ($key == null){
            $key = Config::get('Config')['aesKey'];
        }
        return openssl_decrypt(base64_decode($data),'AES-128-ECB',$key,OPENSSL_RAW_DATA);
    }
}