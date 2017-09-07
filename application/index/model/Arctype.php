<?php
namespace app\index\model;

use think\Model;

class Arctype extends Model
{
    static public $allChild=array();   //无限子分类所有ID数组
    
    public function arctypeMod()
    {
        return $this->hasOne('ArctypeMod', 'id', 'mid');
    }
    
    public function getContentAttr($value, $data)
    {
        return htmlspecialchars_decode($data['content']);
    }
    
    
    /**
     * @Title: arctypefield
     * @Description: todo(指定查询栏目键值)
     * @param int $id 栏目ID
     * @param string $key 查询键值
     * @author 苏晓信
     * @date 2017年7月2日
     * @throws
     */
    public function arctypefield($id, $key){
        $result = $this->where('id', $id)->value($key);
        return htmlspecialchars_decode($result);
    }
    
    /**
     * @Title: typename
     * @Description: todo(栏目名称)
     * @param int $id 栏目ID
     * @author 苏晓信
     * @date 2017年7月2日
     * @throws
     */
    public function typename($id){
        return $this->arctypefield($id, 'typename');
    }
    
    /**
     * @Title: typelink
     * @Description: todo(栏目链接)
     * @param int $id 栏目ID
     * @author 苏晓信
     * @date 2017年7月2日
     * @throws
     */
    public function typelink($id){
        $data = $this->where('id', $id)->find();
        $data->arctypeMod;
        if ( $data->arctypeMod->mod == 'addonjump' && !empty($data->jumplink) ){
            $result = $data->jumplink;
        }else{
            $result = url('@category/'.$data->dirs);
        }
        return $result;
    }
    
    /**
     * @Title: channeldata
     * @Description: todo(当前ID的平级栏目)
     * @param int $pid 上级栏目ID
     * @return array
     * @author 苏晓信
     * @date 2017年7月2日
     * @throws
     */
    public function channeldata($pid){
        $result = cache('DB_ARCTYPE_PID_'.$pid);
        if(!$result){
            $where = [
                    'pid' => $pid,
                    'status' => 1,
            ];
            $result = $this->where($where)->order('sorts ASC,id ASC')->select();
            foreach ($result as $k =>$val){
                $val->arctypeMod;
                if ( $val->arctypeMod->mod == 'addonjump' && !empty($val->jumplink) ){
                    $result[$k]['typelink'] = $val->jumplink;
                    $result[$k]['target'] = " target=\"_blank\"";
                }else{
                    $result[$k]['typelink'] = url('@category/'.$val->dirs);
                    $result[$k]['target'] = " target=\"".$val->target."\"";
                }
            }
            cache('DB_ARCTYPE_PID_'.$pid, $result);
        }
        return $result;
    }
    
    /**
     * @Title: channel
     * @Description: todo(直接输出导航链接)
     * @param int $pid 上级栏目ID
     * @param int $nowid 当前显示ID
     * @param string $ishome 是否显示首页
     * @param string $leftlabel 左标签
     * @param string $rightlabel 右标签
     * @param string $class 类名
     * @return string
     * @author 苏晓信
     * @date 2017年7月2日
     * @throws
     */
    public function channel($pid, $nowid, $ishome, $leftlabel, $rightlabel, $class){
        $data = $this->channeldata($pid);
        $result = '';
        if($ishome != ''){
            if ($nowid == '' || empty($nowid)){
                $classs = "class=\"active ".$class."\"";
            }else{
                $classs = "class=\"".$class."\"";
            }
            $result .= $leftlabel;
            $result .= "<a href=\"".url('/')."\" ".$classs." >".$ishome."</a>";
            $result .= $rightlabel;
        }
        foreach ($data as $k => $val){
            if ($val['id'] == $nowid){
                $classs = "class=\"active ".$class."\"";
            }else{
                $classs = "class=\"".$class."\"";
            }
            $result .= $leftlabel;
            $result .= "<a href=\"".$val['typelink']."\" ".$classs.$val['target']." >".$val['typename']."</a>";
            $result .= $rightlabel;
        }
        return $result;
    }
    
    /**
     * @Title: position
     * @Description: todo(当前位置)
     * @param int $id
     * @param string $home
     * @param string $line
     * @return string
     * @author 苏晓信
     * @date 2017年7月2日
     * @throws
     */
    public function position($id, $home, $line){
        $interval = "<span>".$line."</span>";
        $positionArr = [];
        $positionArr = $this->positionArctype($id);
        $positionArr = array_reverse($positionArr);
        $result = "<a href=\"".url("/")."\">".$home."</a>".$interval;
        $num = count($positionArr) - 1;
        foreach($positionArr as $k=>$val){
            $result .= '<a href="'.url('@category/'.$val['dirs']).'">'.$val['typename'].'</a>';
            if($k != $num){
                $result .= $interval;
            }
        }
        return $result;
    }
    public function positionArctype($id, $result=[]){
        $data = $this->where('id', $id)->find();
        if(!$data){
            return false;
        }else {
            $data = $data->toArray();
        }
        if($data['pid'] == '0'){
            $result[] = $data;
        }else{
            $result[] = $data;
            return $this->positionArctype($data['pid'], $result);
        }
        return $result;
    }
    
    
    /********************************************-系统方法-********************************************/
    
    /**
     * 查询当前ID下无限分级栏目的所有ID
     * @param int $pid
     */
    public function topArctypeData($pid){
        $data = $this->where(['id' => $pid])->find();
        if($data['pid'] == '0'){
            $data->arctypeMod;
            $result = $data;
        }else{
            return $this->topArctypeData($data['pid']);
        }
        return $result;
    }
    
    /**
     * 查询当前ID下无限分级栏目的所有ID
     * @param int $id
     */
    public function allChildArctype($id){
        self::$allChild[] = $id;
        $where = array(
                'pid' => $id,
                'status' => '1',
        );
        $data = $this->where($where)->order('sorts ASC,id ASC')->select();
        if(is_array($data) && !empty($data)){
            foreach($data as $k=>$v){
                $this->allChildArctype($v['id'],$result);
            }
        }
        $result = self::$allChild;
        return $result;
    }
}