<?php


namespace app\common\controller;


use PHPExcel;
use PHPExcel_Exception;
use PHPExcel_IOFactory;
use PHPExcel_Reader_Exception;
use PHPExcel_Writer_IWriter;
use think\Db;
use think\Exception;
use think\File;

/**
 * Class Excel
 * @package app\common\controller
 */
class Excel
{
    /**
     * 通用表格导入
     * @param File $file Excel文件
     * @param string $table 需要导入的表
     * @param array $tableColumn 表字段
     * 按excel列排序字段
     * @param array $extraColumn 额外字段
     * @return array
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     */
    public function GeneralImportExcel(File $file, string $table, array $tableColumn, array $extraColumn = []): array
    {
        vendor('PHPExcel.Classes.PHPExcel.IOFactory');
        $load_excel = PHPExcel_IOFactory::load($file->getInfo()['tmp_name']);
        $head_excel = $load_excel->getSheet()->toArray();
        array_shift($head_excel);
        $error = [];
        $success = 0;
        $num = 1;
        foreach ($head_excel as $key){
            $data = [];
            $num++;
            foreach ($tableColumn as $tableKey => $tableValue){
                $data[$tableValue] = $key[$tableKey];
            }
            foreach ($extraColumn as $tableKey => $tableValue){
                $data[$tableKey] = $tableValue;
            }
            $result = $this->GeneralImportTable($table,$data,$num);
            if($result != 'ok'){
                $error[] = [
                    'msg'=>$result
                ];
            }else{
                $success ++;
            }
        }
        return compact('success', 'error');
    }

    /**
     * 导入表
     * @param string $table 表名
     * @param array $data 导入数据
     * @param int $num 当前数据所在表格行数
     * @return string
     */
    protected function GeneralImportTable(string $table, array $data, int $num): string
    {
        Db::startTrans();
        try {
            $result = Db::table($table)->insert($data);
            if(!$result){
                throw new Exception('第'.$num.'未导入,请检查!');
            }
            Db::commit();
        }catch (\Exception $e){
            Db::rollback();
            return $e->getMessage();
        }
        return 'ok';
    }

    /**
     * 导出表
     * @param array $data 需要导出的数据
     * @param array|null $column data每个单元的键名替换成的表头,不填则默认为data的键名
     * @return PHPExcel_Writer_IWriter 返回file文件,由用户自行处理导出到指定位置或下载
     */
    public function ExportExcel(array $data, array $column = null): PHPExcel_Writer_IWriter
    {
        vendor('PHPExcel.Classes.PHPExcel');
        vendor('PHPExcel.Classes.PHPExcel.IOFactory');
        $save = new PHPExcel();
        $let = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        if($column == null){
            $column = array_keys($data[0]);
        }
        $save->setActiveSheetIndex();
        $save->getActiveSheet()->setTitle('excel');

        foreach ($column as $key => $val){
            $save->getActiveSheet()->setCellValue($let[$key].'1',$column[$key]);
        }
        $num = 2;
        foreach ($data as $key => $val){
            $index = 0;
            foreach ($val as $columnKey => $columnVal){
                $save->getActiveSheet()->setCellValue($let[$index].$num,$column[$key]);
                $index++;
            }
            $num++;
        }
        $file = PHPExcel_IOFactory::createWriter($save, 'Excel2007');
        $save = null;
        return $file;
    }
}