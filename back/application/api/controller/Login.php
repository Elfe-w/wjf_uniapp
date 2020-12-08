<?php


namespace app\api\controller;


use app\base\controller\Base;
use app\common\controller\RSA;
use app\common\controller\User;
use think\Cache;
use think\Db;
use think\Log;
use think\Session;

/**
 * Class Login
 * @package app\api\controller
 */
class Login extends Base
{
    /*
     * 会员登录
     */
    public function UserLogin(): void
    {
        $result = User::UserLogin($this->data['user_name'],$this->data['user_password'],'4343_user',['user_name','user_password'],['user_status != 4']);
        if($result == null){
            $this->err('用户名或密码错误!');
        }


        if(RSA::publicDecrypt2048($result['user_password']) != $this->data['user_password']){
            $this->err('用户名或密码错误!');
        }


        Session::set('user_name',$result['user_name']);
        Cache::set($result['user_name'],$result);
        unset($result['user_password']);
        $this->ok($result);
    }

    /*
     * 用户注册
     */
    public function UserRegister(): void
    {
        if(Db::table('4343_user')->where('user_name',$this->data['user_name'])->where('user_status != 4')->count() > 1){
            $this->err('该用户名已被注册,请重新填写!');
        }
        $result = Db::table('4343_user')->insert([
            'user_name'=>$this->data['user_name'],
            'user_password'=>RSA::privateEncrypt2048($this->data['user_password']),
            'user_email'=>$this->data['user_email'],
            'user_sex'=>$this->data['user_sex']
        ]);
        if($result == 1){
            $this->ok();
        }
        $this->err('注册失败,请稍后再试!');
    }

    public function ResetPassword(): void
    {
        $result = Db::table('4343_user')
            ->where('user_name',$this->data['user_name'])
            ->where('user_email',$this->data['user_email'])
            ->where('user_status != 4')
            ->update(['user_password'=>RSA::privateEncrypt2048($this->data['new_password'])]);
        Log::log( $result);
        if($result < 1){
            $this->err('用户名或密保错误!');
        }
        $this->ok();
    }

    public function ResetAvatar(): void
    {

        $result =  Db::table('4343_user')->alias('b')
            ->where('b.user_id',Cache::get(Session::get('user_name'))['user_id'])
            ->find();
        if($result < 1){
            $this->err('用户头像修改错误!');
        }
        $result =  Db::table('4343_user')->alias('b')
            ->where('b.user_id',Cache::get(Session::get('user_name'))['user_id'])
            ->where('user_status != 4')
            ->update(['user_avatar'=>$this->data['user_avatar']]);
        $this->ok($result );
    }
}