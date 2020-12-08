<?php


namespace app\common\controller;


use think\Config;
use think\Log;

/**
 * Class RSA
 * @package app\common\controller
 */
class RSA
{
    /**
     * RSA公钥加密(2048位)
     * @param string $data 数据
     * @param string|null $public_key 公钥
     * @return false|string
     */
    public static function publicEncrypt2048(string $data,string $public_key = null){

        if ($public_key == null){
            $public_key = file_get_contents(Config::get('Config')['rsa2048']['public']);
        }elseif(stripos($public_key,'.pem') != false){
            $public_key = file_get_contents($public_key);
        }else{
            $public_key = '-----BEGIN RSA PRIVATE KEY-----'."\r\n".$public_key."\r\n".'-----END RSA PRIVATE KEY-----';
        }

        if (!openssl_pkey_get_public($public_key)) return false;

        $text = '';

        openssl_public_encrypt($data, $text, $public_key);

        $text = base64_encode($text);

        return $text;

    }


    /**
     * RSA公钥解密(2048位)
     * @param string $data 数据
     * @param string|null $public_key 公钥
     * @return false|string
     */
    public static function publicDecrypt2048(string $data,string $public_key = null){

        if ($public_key == null){
            $public_key = file_get_contents(Config::get('Config')['rsa2048']['public']);
        }elseif(stripos($public_key,'.pem') != false){
            $public_key = file_get_contents($public_key);
        }else{
            $public_key = '-----BEGIN RSA PRIVATE KEY-----'."\r\n".$public_key."\r\n".'-----END RSA PRIVATE KEY-----';
        }

        if (!openssl_pkey_get_public($public_key)) return false;

        $text = '';

        openssl_public_decrypt(base64_decode($data), $text, $public_key);

        return $text;

    }

    /**
     * RSA私钥加密(2048位)
     * @param string $data 数据
     * @param string|null $private_key 私钥
     * @return false|string
     */
    public static function privateEncrypt2048(string $data,string $private_key = null){

        if ($private_key == null){
            $private_key = file_get_contents(Config::get('Config')['rsa2048']['private']);
        }elseif(stripos($private_key,'.pem') != false){
            $private_key = file_get_contents($private_key);
        }else{
            $private_key = '-----BEGIN RSA PRIVATE KEY-----'."\r\n".$private_key."\r\n".'-----END RSA PRIVATE KEY-----';
        }

        if (!openssl_pkey_get_private($private_key)) return false;

        $text = '';

        openssl_private_encrypt($data, $text, $private_key);

        $text = base64_encode($text);

        return $text;

    }

    /**
     * RSA私钥解密(2048位)
     * @param string $data 数据
     * @param string|null $private_key 私钥
     * @return false|string
     */
    public static function privateDecrypt2048(string $data,string $private_key = null){

        if ($private_key == null){
            $private_key = file_get_contents(Config::get('Config')['rsa2048']['private']);
        }elseif(stripos($private_key,'.pem') != false){
            $private_key = file_get_contents($private_key);
        }else{
            $private_key = '-----BEGIN RSA PRIVATE KEY-----'."\r\n".$private_key."\r\n".'-----END RSA PRIVATE KEY-----';
        }


        if (!openssl_pkey_get_private($private_key)) return false;

        $text = '';

        openssl_private_decrypt(base64_decode($data), $text, $private_key);

        return $text;

    }

}