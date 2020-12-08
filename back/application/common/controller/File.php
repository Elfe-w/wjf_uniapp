<?php


namespace app\common\controller;


use think\Image;
use think\Log;

/**
 * Class File
 * @package app\common\controller
 */
class File
{
    /**
     * 图片上传基类
     * @param \think\File $image 图片类
     * @param string $upPath 上传路径
     * @param string|null $imageName 图片名称
     * @return array 正确失败信息 code->200成功,403失败|msg->失败信息,path->成功返回的路径
     */
    public static function upload($image,$upPath,$imageName = null){
        // 获取表单上传文件 例如上传了001.jpg
        // 移动到框架应用根目录/public/$upPath/ 目录下
        if($image === null){
            return ['code'=>403,'msg'=>'图片不能为空'];
        }
        $size = $image->getInfo()['size'];
        $info = $image->validate(['size'=>3145728,'ext'=>'jpg,png,jpeg'])->move('/www/wwwroot/image.ycwl6666.com/'.$upPath);
        if($info){
            self::imageThumb('/www/wwwroot/image.ycwl6666.com/'.$upPath.DS.$info->getSaveName(),$info->getSaveName(),$size,$upPath);
            return ['code'=>200,'path'=>$upPath.DS.$info->getSaveName()];
        }
        // 上传失败获取错误信息
        return ['code'=>403,'msg'=>$image->getError()];
    }

    /*
     * 图片压缩
     */
    protected static function imageThumb($file,$filename,$size,$upPath){
        $image = Image::open($file);
        $imageWidth = $image->width();
        $imageHeight = $image->height();
        $pathname = explode('.',$filename);
        $pathname = $pathname[0].'_s.'.$pathname[1];
        if($size <= 1000000){
            $imageWidth *= 0.3;
            $imageHeight *= 0.3;
        }elseif($size <= 2000000){
            $imageWidth *= 0.2;
            $imageHeight *= 0.2;
        }elseif($size <= 3000000){
            $imageWidth *= 0.1;
            $imageHeight *= 0.1;
        }

        $info = $image->thumb($imageWidth, $imageHeight)->save('/www/wwwroot/image.ycwl6666.com/'.$upPath.DS.$pathname);
        if($info){
            return true;
        }
        Log::log($info->getError());
        return false;
    }
}