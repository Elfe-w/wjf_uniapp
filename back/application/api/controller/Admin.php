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
 * Class Admin
 * @package app\api\controller
 */
class Admin extends Base
{


    public function upLoadImg(){
        Log::log($_FILES['file']);
        if(!empty($_FILES['file'])){
            //获取扩展名
            $exename  = $this->getExeName($_FILES['file']['name']);
            if(!in_array($exename, array('png', 'gif', 'jpeg', 'jpg'))){
                $this->err('upload error 03');
            }
            $imageSavePath = ROOT_PATH.'public'.DS.'uploads'.DS.uniqid().'.'.$exename;
            Log::log($imageSavePath);
            if(move_uploaded_file($_FILES['file']['tmp_name'], $imageSavePath)){
                Log::log(basename($imageSavePath));
                $this->ok(basename($imageSavePath));
            }else{
                $this->err('upload error 01');
            }
        }else{
            $this->err('upload error 02');
        }
    }

    public function getExeName($fileName){
        $pathinfo      = pathinfo($fileName);
        return strtolower($pathinfo['extension']);
    }



    /*
     * 管理员登录
     */
    public function AdminLogin(): void
    {
        $result = User::UserLogin($this->data['su_name'],$this->data['su_password'],'4343_sys_user',['su_name','su_password'],['su_status != 4']);
        if($result == null){
            $this->err('用户名或密码错误!');
        }

        if(RSA::publicDecrypt2048($result['su_password']) != $this->data['su_password']){
            $this->err('密码错误!');
        }

        Session::set('admin_user','admin_'.$result['su_name']);
        Cache::set('admin_'.$result['su_name'],$result);
        unset($result['su_password']);
        $this->ok($result);
    }

    public function AddAdmin(): void
    {
        $result = Db::table('4343_sys_user')->insert([
            'su_name'=>$this->data['su_name'],
            'su_password'=>RSA::publicEncrypt2048($this->data['su_password'])
        ]);
        if($result == 1){
            $this->ok();
        }
        $this->err('注册失败,请稍后再试!');
    }

    /*
     * 添加活动
     */
    public function AddActivity(): void
    {
        Log::log($this->data);
        $result = Db::table('4343_activity')->insert([
            'act_title'=>$this->data['act_title'],
            'act_content'=>$this->data['act_content'],
            'act_start_date'=>$this->data['act_begin_date'],
            'act_end_date'=>$this->data['act_end_date'],
            'act_integral'=>$this->data['act_integral'],
            'act_tag'=>$this->data['act_tag'],
            'act_img'=>$this->data['act_img'],
            'su_id'=>Cache::get(Session::get('admin_user'))['su_id']
        ]);
        if($result == 1){
            $this->ok();
        }
        $this->err('活动添加失败,请稍后再试!');
    }

    /*
     * 所有活动列表
     */
    public function ActivityList(): void
    {
        $act_count = '('.Db::table('4343_activity_user')
            ->where('au_status = 1 and act_id = 4a.act_id')
            ->fetchSql()
            ->count().')';
        Log::log($act_count);
//        $result = Db::table('4343_activity')->page($this->data['page'],10)->alias('4a')
//            ->join('4343_sys_user su','4a.su_id = su.su_id')
//            ->field('act_id,act_title,act_start_date,act_end_date,su.su_name,'.$act_count.' act_count')
//            ->order('act_start_date','desc')
//            ->select();
//        Log::log($act_count);
        $result = Db::table('4343_activity')->page($this->data['page'],10)->alias('4a')
            ->join('4343_sys_user su','4a.su_id = su.su_id')
            ->field('act_id,act_title,act_start_date,act_end_date,su.su_name,'.$act_count.' act_count')
            ->order('act_start_date','desc')
            ->select();

        $this->ok($result);
    }

    /*
     * 活动详情
     */
    public function ActivityDetail(): void
    {
        $result= Db::table('4343_activity')->alias('4a')
            ->join('4343_sys_user su','4a.su_id = su.su_id')
            ->where('4a.act_id',$this->data['act_id'])
            ->field('4a.act_id,4a.act_title,4a.act_content,4a.act_img,4a.act_start_date,4a.act_end_date,4a.act_integral,4a.act_tag,su.su_name')
            ->find();
        if($result == null){
            $this->err('请求失败,请稍后再试');
        }
        $this->ok($result);
    }

    public function AllActivity(): void
    {
        $result = Db::table('4343_activity')
            ->field('act_id,act_title')
            ->where('act_end_date > "'.date('Y-m-d H:i:s').'"')
            ->order('act_start_date','desc')
            ->select();
        $this->ok($result);
    }

    /*
     * 申请加入活动数据列表
     */
    public function ChangeActivityList(): void
    {
        $result = Db::table('4343_activity_user')->alias('au')
            ->join('4343_user u','au.user_id = u.user_id')
            ->join('4343_activity 4a','au.act_id = 4a.act_id')
            ->where('au_status = 2')
            ->field('au.au_id,4a.act_title,u.user_id,u.user_name,au.au_date')
            ->order('au.au_date','desc')
            ->select();
        $this->ok($result);
    }

    /*
     * 审核活动用户
     */
    public function ChangeActivityUser(): void
    {
        $result = Db::table('4343_activity_user')
            ->where('au_id',$this->data['au_id'])
            ->update(['au_status'=>$this->data['status']]);
        if($result < 1){
            $this->err('审核失败,请稍后再试!');
        }
        $this->ok();
    }

    public function AllRank(): void
    {
        $markAll = '('.Db::table('4343_user_mark')->alias('um')
                ->join('4343_activity act','um.act_id = act.act_id')
                ->where('um_status = 1 and um.user_id = u.user_id')
//                ->where('act.act_end_date < "'.date('Y-m-d H:i:s').'"')
                ->field('ifnull(sum(act_integral),0) user_mark')
                ->fetchSql()
                ->find().') user_mark';


        $r = '('.Db::table('4343_user')->alias('u')
                ->field($markAll.',u.user_id')
                ->fetchSql()
                ->order('ranks.user_mark','desc')
                ->select().') ranks';

        Db::query('SET @curRank := 0;');
        $result = Db::table('4343_user')->alias('uu')
                ->join($r,'uu.user_id = ranks.user_id')

                ->field('@curRank := @curRank + 1 as ranks,uu.user_name,ranks.user_mark')
                ->select();

        Log::log($result);



        $this->ok($result);
    }
}