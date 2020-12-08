<?php
declare(strict_types=1);


namespace app\api\controller;


use app\base\controller\Base;
use app\common\controller\AliCloud;
use app\common\controller\User;
use app\common\controller\Wx;
use think\Cache;

/**
 * Class Index
 * @package app\api\controller
 */
class Index extends Base
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


//        if(RSA::publicDecrypt2048($result['user_password']) != $this->data['user_password']){
//            $this->err('用户名或密码错误!');
//        }


        Cache::set($result['user_phone'],$result);
        unset($result['user_password']);
        $this->ok($result);
    }

    /*
     * 手机号登录
     */
    public function PhoneLogin(): void
    {
        $result = User::PhoneLogin($this->data['user_phone'],$this->data['code'],'4343_user');
        if ($result == null){
            $this->stringOk('手机号码不存在!');
        }
        $this->stringOk($result);
    }

    public function SendSMS(): void
    {
        $result = AliCloud::init()->SendSMS($this->data['phone']);
        if ($result == false){
            $this->stringOk('短息下发失败!');
        }
        $this->stringOk($result);
    }

    /*
     * 微信授权
     */
    public function WxLogin(): void
    {
        $result = Wx::init()->UserAuth($this->data['code']);
        if ($result == false){
            $this->ok([],'50000','微信授权失败!');
        }
        $this->ok($result);
    }
}