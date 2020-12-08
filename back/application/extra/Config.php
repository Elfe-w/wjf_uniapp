<?php

return [
    //调试模式
    'debug'=>[
        //是否启用调试,启用后将在报错后返回报错信息,
        //关闭则提示默认信息,用户将不在收到详细报错数据
        'enable'=>true,
        //调试模式关闭后用户收到的提示
        'msg'=>'服务器异常,请稍后尝试!',
    ],
    //模块配置
    'module'=>[
    ],
    //请求数据处理
    'request'=>[
        //请求头是否需要开启加解密
        'enableSecret'=>true,
        //加解密方式,支持RSA、AES加密方式
        //如使用AES,请公钥处填写16位密钥,且加密模式为AES-128-ECB,参数则是OPENSSL_RAW_DATA,其它加密请自行修改
        'secretMode'=>'AES',
        //公钥,默认使用下方公钥
        'public'=>'default',
        //私钥,默认使用下方密钥,当启用AES模式时,私钥无效
        'private'=>'default',
    ],
    //RSA密钥
    'rsa2048'=>[
        //公钥
        'public'=>ROOT_PATH.'application'.DS.'lib'.DS.'secret'.DS.'rsa2048_pub.pem',
        //私钥
        'private'=>ROOT_PATH.'application'.DS.'lib'.DS.'secret'.DS.'rsa2048_pri.pem',
    ],
    //AES密钥
    'aesKey'=>'abcdefghijklmnop',
    //cache配置,参照thinkphp配置即可
    'cache'=>[
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => CACHE_PATH,
        // 缓存前缀
        'prefix' => '',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],
    'sql'=>[
        //是否启用数据库加密
        'enableDbSecret'=>false,
        //数据库加密密钥
        'aes_key'=>''
    ]
];