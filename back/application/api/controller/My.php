<?php


namespace app\api\controller;


use app\base\controller\Base;
use think\Cache;
use think\Db;
use think\Log;
use think\Session;

/**
 * Class My
 * @package app\api\controller
 */
class My extends Base
{

    /*
     * 我的数据
     */
    public function Info(): void
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
                ->select().') ranks';

        Db::query('SET @curRank := 0;');
        $r1 ='('. Db::table('4343_user')->alias('uu')
            ->join($r,'uu.user_id = ranks.user_id')
            ->order('ranks.user_mark','desc')
            ->field('@curRank := @curRank + 1 as ranks,uu.user_id ,uu.user_name,ranks.user_mark')
             ->fetchSql()
            ->select().') ranks2';

        $result['info'] = Db::table('4343_user')->alias('b')
            ->join($r1,'ranks2.user_id = b.user_id')
            ->where('b.user_id',Cache::get(Session::get('user_name'))['user_id'])
            ->field('b.user_name,b.user_avatar,b.user_sex,ranks2.user_mark,ranks2.ranks')
            ->find();

        $result['totalNum']=Db::table('4343_user')->count();
        Log::log($result['totalNum']);
        if($result['info'] == null){
            $this->err('服务器异常,，，，，，，，，，请稍后再试!');
        }

        $user = '('.Db::table('4343_activity_user')
                ->where('act_id = act.act_id')
                ->where('user_id',Cache::get(Session::get('user_name'))['user_id'])
                ->field('au_status')
                ->fetchSql()
                ->find().') user_status';
        $result['activity'] = Db::table('4343_activity_user')->alias('au')
            ->join('4343_activity act','au.act_id = act.act_id')
            ->where('au.user_id',Cache::get(Session::get('user_name'))['user_id'])
            ->field('act.act_id,act.act_title,'.$user)
            ->order('au.au_date','desc')
            ->select();


        $this->ok($result);
    }

    /*
     * 活动排名
     */
    public function ActivityRank(): void
    {
        $mark = '('.Db::table('4343_user_mark')->alias('um')
                ->join('4343_activity act','um.act_id = act.act_id')
                ->where('um_status = 1')
                ->where('act.act_end_date < "'.date('Y-m-d H:i:s').'"')
                ->where('user_id = au.user_id')
                ->field('ifnull(sum(act_integral),0)')
                ->fetchSql()
                ->find().') user_mark';

        $result = Db::table('4343_activity_user')->alias('au')
            ->join('4343_user u','au.user_id = u.user_id')
            ->where('au.act_id',$this->data['act_id'])
            ->field('u.user_name,'.$mark)
            ->order('user_mark','desc')
            ->select();
        $this->ok($result);
    }
}