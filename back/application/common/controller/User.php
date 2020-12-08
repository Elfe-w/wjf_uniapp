<?php


namespace app\common\controller;


use think\Cache;
use think\Config;
use think\Db;

/**
 * Class User
 * @package app\common\controller
 */
class User
{
    /**
     * 用户登录
     * @param string $username 用户名
     * @param string $password 密码
     * @param string $table 表名
     * @param array $column 表对应用户名密码键值 如['username','password','salt'],如果不启用解密,则salt键则无需填写
     * @param array $extra 额外条件, 如['status != 4','or id = 5']
     * @return mixed
     */
    public static function UserLogin(string $username, string $password, string $table,array $column = ['username','password'],array $extra = []){
        $result = Db::table($table)
            ->where(function ()use ($extra){
                if($extra == []){
                    return '1 = 1';
                }
                $where = '';
                foreach ($extra as $key => $value){
                    $where .= $value; 
                }
                return $where;
            })
            ->where($column[0],$username)
            ->find();
        if ($result == null){
            return null;
        }
        if(Config::get('Config')['sql']['enableDbSecret'] == true){
            if(RSA::privateDecrypt2048($result[$column[1]]) == RSA::privateDecrypt2048($password)){
                return $result;
            }
            return null;
        }
        return $result;
    }

    /**
     * @param string $phone 手机号码
     * @param string|int $code 验证码
     * @param string $table 表名
     * @param string $column
     * @param array $extra
     * @param int|string $timeout 超时时间
     * @return bool|string
     */
    public static function PhoneLogin(string $phone,$code, string $table,string $column = 'user_phone',array $extra = [],int $timeout = 300){
        if($phone == null || $code == null){
            return '手机号码或验证码为空!';
        }
        //缓存被清空时
        if(Cache::get($phone) == false){
            return '登录信息失效,请重新尝试!';
        }
        //判断缓存中的验证码
        if(Cache::get($phone)['code'] != $code){
            return '验证码不正确!';
        }
        //判断时间是否超时
        if(time() - Cache::get($phone)['code'] > $timeout){
            Cache::rm($phone);
            return '验证码已失效,请重新获取!';
        }
        return Db::table($table)
            ->where(function ()use ($extra){
                if($extra == []){
                    return '1 = 1';
                }
                $where = '';
                foreach ($extra as $key => $value){
                    $where .= $value;
                }
                return $where;
            })
            ->where($column,$phone)
            ->field($column,true)
            ->field(Config::get('Config')['sql']['enableDbSecret'] == true ? 'aes_decrypt(unhex('.$column.'),"'.Config::get('Config')['sql']['aes_key'].'") '.$column : $column)
            ->find();
    }
}