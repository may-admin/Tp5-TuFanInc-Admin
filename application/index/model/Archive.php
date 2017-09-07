<?php
namespace app\index\model;

use think\Model;
use app\index\model\Arctype;

class Archive extends Model
{
    public function arctype()
    {
        return $this->hasOne('Arctype', 'id', 'typeid')->field('typename, mid, dirs');
    }
    
    public function arctypeMod()
    {
        return $this->hasOne('ArctypeMod', 'id', 'mid')->field('mod');
    }
    
    /**
     * 文章模型关联表
     */
    public function addonarticle()
    {
        return $this->hasOne('addonarticle', 'aid', 'id');
    }
    
    /**
     * 视频模型关联表
     */
    public function addonvideo()
    {
        return $this->hasOne('addonvideo', 'aid', 'id');
    }
    
    /**
     * 相册模型关联表
     */
    public function addonalbum()
    {
        return $this->hasOne('addonalbum', 'aid', 'id');
    }
    
    
    /**
     * @Title: arclist
     * @Description: todo(查询栏目下的文章)
     * @param int $typeid 栏目ID（当前栏目下的所有[无限级]栏目ID）
     * @param int $limit 查询数量
     * @param string $flag 推荐[c] 特荐[a] 头条[h] 滚动[s] 图片[p] 跳转[j]
     * @param string $order 排序
     * @return array
     * @author 苏晓信
     * @date 2017年7月5日
     * @throws
     */
    public function arclist($typeid, $limit, $flag, $order)
    {
        if ($typeid == '0'){
            return;
        }
        $typeidStr = cache('ARCTYPE_ARR_'.$typeid);
        if (!$typeidStr){
            $arctype = new Arctype();
            $arctype::$allChild = array();   //初始化无限子分类数组
            $typeidArr = $arctype->allChildArctype($typeid);
            $typeidStr = implode(',', $typeidArr);
            cache('ARCTYPE_ARR_'.$typeid, $typeidStr);
        }
        $where['status'] = 1;
        $where['typeid'] = ['in', $typeidStr];
        if (!empty($flag)){
            $where[] = ['exp', "FIND_IN_SET('".$flag."', flag)"];
        }
        $list = $this->where($where)->limit($limit)->order($order)->select();
        foreach ($list as $k=>$val){
            $mod = $val['mod'];
            $list[$k]['addondata'] = $val->$mod;
            unset($list[$k][$mod]);
            $val->arctype;
            $list[$k]['arctypeurl'] = url('@category/'.$val->arctype->dirs);
            $flag_arr = explode(',', $val['flag']);
            if(in_array('j',$flag_arr) && !empty($val['jumplink'])){
                $list[$k]['arcurl'] = $val['jumplink'];
            }else{
                $list[$k]['arcurl'] = url('detail/'.$val->arctype->dirs.'/'.$val['id']);
            }
        }
        return $list;
    }
    
    /**
     * @Title: prenext
     * @Description: todo(上一篇、下一篇)
     * @param array $archiveArr 当前文档数组
     * @return string
     * @author 苏晓信
     * @date 2017年7月5日
     * @throws
     */
    public function prenext($archiveArr)
    {
        $leftLabel = "<div>";
        $rightLabel = "</div>";
        $preStr = $leftLabel."<span>上一篇：</span>";
        $nextStr = $leftLabel."<span>下一篇：</span>";
        $where = [
                'id' => ['gt', $archiveArr['id']],
                'typeid' => $archiveArr['typeid'],
        ];
        $pre = $this->where($where)->order('id ASC')->find();   //上
        $where = [
                'id' => ['lt', $archiveArr['id']],
                'typeid' => $archiveArr['typeid'],
        ];
        $next = $this->relation('arctype')->where($where)->order('id DESC')->find();   //下
        if(!empty($pre)){
            $flag_arr = explode(',',$pre['flag']);
            if(in_array('j',$flag_arr) && !empty($pre['jumplink']) ){
                $preStr .= "<a href=\"".$pre['jumplink']."\" target=\"_blank\" >".$pre['title']."</a>".$rightLabel;
            }else{
                $preStr .= "<a href=\"".url("detail/".$archiveArr->arctype->dirs."/".$pre['id'])."\">".$pre['title']."</a>".$rightLabel;
            }
        }else{
            $preStr .= "没有了".$rightLabel;
        }
        if(!empty($next)){
            $flag_arr = explode(',',$next['flag']);
            if(in_array('j',$flag_arr) && !empty($next['jumplink']) ){
                $nextStr .= "<a href=\"".$next['jumplink']."\" target=\"_blank\" >".$next['title']."</a>".$rightLabel;
            }else{
                $nextStr .= "<a href=\"".url("detail/".$archiveArr->arctype->dirs."/".$next['id'])."\">".$next['title']."</a>".$rightLabel;
            }
        }else{
            $nextStr .= "没有了".$rightLabel;
        }
        return $preStr.$nextStr;
    }
    
    /**
     * @Title: click
     * @Description: todo(文档点击数+1)
     * @param array $archiveArr 当前文档数组
     * @author 苏晓信
     * @date 2017年7月6日
     * @throws
     */
    public function click($archiveArr)
    {
        return $this->where('id', $archiveArr->id)->setInc('click');
    }
}