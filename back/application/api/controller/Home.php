<?php


namespace app\api\controller;


use app\base\controller\Base;
use think\Cache;
use think\Db;
use think\Session;

/**
 * Class Home
 * @package app\api\controller
 */
class Home extends Base
{
    /*
     * 活动列表
     */
    public function ActivityList(): void
    {
        $result = Db::table('4343_activity')->alias('act')
            ->join('4343_sys_user su','act.su_id = su.su_id')
            ->field('act.act_id,act.act_title,act.act_content,act.act_start_date,act.act_end_date,act.act_integral,su.su_name')
            ->order('act.act_start_date','desc')
            ->select();
        $this->ok($result);
    }

    /*
     * 活动详情
     */
    public function ActivityDetail(): void
    {
        $user = '('.Db::table('4343_activity_user')
            ->where('act_id',$this->data['act_id'])
            ->where('user_id',Cache::get(Session::get('user_name'))['user_id'])
            ->field('au_status')
            ->fetchSql()
            ->find().') user_status';
        $result = Db::table('4343_activity')->alias('act')
            ->join('4343_sys_user su','act.su_id = su.su_id')
            ->where('act_id',$this->data['act_id'])
            ->field('act.act_id,act.act_title,act.act_content,act.act_img,act.act_start_date,act.act_end_date,act.act_integral,act_tag,'.$user.',su.su_name')
            ->find();
        if($result == null){
            $this->err('服务器异常,请稍后再试!');
        }
        $this->ok($result);
    }

    /*
     * 参加活动
     */
    public function JoinActivity(): void
    {
        $result = Db::table('4343_activity_user')->insert([
            'act_id'=>$this->data['act_id'],
            'user_id'=>Cache::get(Session::get('user_name'))['user_id']
        ]);
        if($result == 1){
            $this->ok();
        }
        $this->err('参加失败,请稍后再试!');
    }
}