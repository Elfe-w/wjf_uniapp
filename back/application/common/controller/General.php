<?php


namespace app\common\controller;


use think\Request;

class General
{

    /**
     * 随机数生成
     * @param $len
     * @return string
     */
    public static function random($len): string
    {
        $chars = ['0','1','2','3','4','5','6','7','8','9'];
        shuffle($chars);
        $str = '';
        for ($i=0;$i<$len;$i++) {
            $str.=$chars[random_int(0, 9)];
        }
        return $str;
    }

    /**
     * 数组递归
     * @param array $set 原始数据
     * @param array $setColumn 需要保留的键值，递归键值不要放在这里
     * @param array $childColumn 提供给下级判断的id键名,与$childRule保持一致,例如['pid','status']
     * @param array $rootRule 根级菜单规则 键名对应的键值为判断条件
     * @param array $childRule 子级规则 键名对应的键值为判断条件,如判断该子集的归属上级,用数组表明上级键值
     * 如:['upid'=>['pid']],数字和字符串会被正常判断
     * @param string $jump 下一级递归键值,默认为 children
     * @param array|null $extra 额外需要保存的参数,子集有效
     * 格式:['column'=>[],'nickColumn'=>[]]
     * @param array|null $rootData 子集需要的递归上级内容,不需要填入
     * @param array|null $extraData 无需填入
     * @param int|null $root 无需填入
     * @return array|null 返回当前功能或菜单信息|是否多次循环
     */
    public static function recursiveSet(array $set, array $setColumn, array $childColumn, array $rootRule, array $childRule, $jump = 'children', $extra = null, $rootData = null, $extraData = null,$root = null): ?array
    {
        $id = 0;
        $setMenu = [];
        if ($root == null) {
            foreach ($set as $key => $value) {
                //根菜单优先判断
                if($rootRule != false){
                    $result = true;
                    foreach ($rootRule as $ruleKey => $ruleVal){
                        if($value[$ruleKey] != $ruleVal){
                            $result = false;
                            break;
                        }
                    }
                    if($result == false){
                        continue;
                    }
                    $data = [];
                    foreach ($setColumn as $columnKey => $columnVal){
                        $data[$columnVal] = $value[$columnVal];
                    }
                    foreach ($childColumn as $childKey => $childVal){
                        $rootData[$childVal] = $value[$childVal];
                    }
                    if($extra != null){
                        foreach ($extra['column'] as $extraKey => $extraVal){
                            $extraData[$extraVal] = $value[$extraVal];
                        }
                    }
                    unset($set[$key]);
                    $data[$jump] = self::recursiveSet($set,$setColumn,$childColumn,$rootRule,$childRule,$jump,$extra,$rootData,$extraData,1);
                    $setMenu[$id] = $data;
                    $id++;
                }

            }
        } else {
            foreach ($set as $key => $value) {
                $result = true;
                foreach ($childRule as $ruleKey => $ruleVal){
                    //判断是否为特殊条件
                    if (is_array($childRule[$ruleKey])){
                        //判断当前值是否为上级下属
                        if($value[$ruleKey] != $rootData[$childRule[$ruleKey][0]]){
                            $result = false;
                            break;
                        }
                    }else if($value[$ruleKey] != $ruleVal){
                        $result = false;
                        break;
                    }
                }
                if($result == false){
                    continue;
                }
                $data = [];
                foreach ($setColumn as $columnKey => $columnVal){
                    $data[$columnVal] = $value[$columnVal];
                }
                $rootJumpData = [];
                foreach ($childColumn as $childKey => $childVal){
                    $rootJumpData[$childVal] = $value[$childVal];
                }
                $jumpData = [];
                if($extra != null){
                    foreach ($extra['column'] as $extraKey => $extraVal){
                        $data[$extra['nickColumn'][$extraKey]] = $extraData[$extraVal];
                        $jumpData[$extraVal] = $value[$extraVal];
                    }
                }
                unset($set[$key]);
                $data[$jump] = self::recursiveSet($set,$setColumn,$childColumn,$rootRule,$childRule,$jump,$extra,$rootJumpData,$jumpData,1);
                $setMenu[$id] = $data;
                $id++;
            }
        }
        if (empty($setMenu)) {
            $setMenu = null;
        }
        return $setMenu;
    }

    /**
     * 商户订单号
     * @param string|null $tg 平台区分标识,订单号前缀,为空则纯数字
     * @return string
     */
    public static function merchantsOrderNumber(string $tg = null): string
    {
        $ParagraphOne = Date('Ymd');
        $ParagraphTwo = '';
        $ip = explode('.',Request::instance()->ip());
        foreach ($ip as $key => $val){
            $ParagraphTwo .= $val;
        }
        $len = strlen($ParagraphTwo);
        if($len < 9){
            $fill = '';
            for ($num = 0;$num <(9 - $len);$num++){
                $fill .= '0';
            }
            $ParagraphTwo = $fill.$ParagraphTwo;
        }
        $ParagraphTwo = str_shuffle($ParagraphTwo);
        $ParagraphThree = time();
        $ParagraphFour = self::random(5);
        $orderNo = $ParagraphOne.$ParagraphTwo.$ParagraphThree.$ParagraphFour;
        return $tg == null ? $orderNo : $tg.$orderNo;
    }
}