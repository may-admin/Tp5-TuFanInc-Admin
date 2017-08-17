<?php
namespace expand;

class Tree
{
    static public $treeList=array();   //存放无限极分类结果
    
    public function __construct()
    {
        self::$treeList = array();   //为什么要重置为空数组，因为如果同一个文件，发生两次都调用 树 时，第二次调用会将第一次中的数据保存在 数组($treeList) 中，因此每次清空 数组($treeList)。
    }
    
    public function create($data, $pid=0, $h_layer=0)
    {
        if(is_array($data)){
            foreach($data as $key => $value){
                $h_layer++;
                if($value['pid'] == $pid){
                    $value['h_layer'] = $h_layer;
                    self::$treeList[]=$value;
                    unset($data[$key]);
                    self::create($data,$value['id'],$h_layer);
                }
                $h_layer--;
            }
        }
        return self::$treeList;
    }
}