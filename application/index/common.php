<?php
use app\index\model\Arctype;
use app\index\model\Archive;
use app\index\model\Config;
use app\index\model\Flink;
use app\index\model\Banner;


/**
 * @Title: ajaxReturn
 * @Description: todo(ajax提交返回状态信息)
 * @param string $info
 * @param url $url
 * @param string $status
 * @author duqiu
 * @date 2016-5-12
 */
function ajaxReturn($info='', $url='', $status='', $data = ''){
    if(!empty($url)){   //操作成功
        $result = array( 'info' => '操作成功', 'status' => 1, 'url' => $url, );
    }else{   //操作失败
        $result = array( 'info' => '操作失败', 'status' => 0, 'url' => '', );
    }
    if(!empty($info)){$result['info'] = $info;}
    if(!empty($status)){$result['status'] = $status;}
    if(!empty($data)){$result['data'] = $data;}
    echo json_encode($result);
    exit();
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
function channeldata($pid){
    $arctype = new Arctype();
    return $arctype->channeldata($pid);
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
function channel($pid, $nowid='', $ishome='', $leftlabel="", $rightlabel="", $class=""){
    $arctype = new Arctype();
    return $arctype->channel($pid, $nowid, $ishome, $leftlabel, $rightlabel, $class);
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
function arctypefield($id, $key){
    $arctype = new Arctype();
    return $arctype->arctypefield($id, $key);
}

/**
 * @Title: typename
 * @Description: todo(栏目名称)
 * @param int $id 栏目ID
 * @author 苏晓信
 * @date 2017年7月2日
 * @throws
 */
function typename($id){
    $arctype = new Arctype();
    return $arctype->typename($id);
}

/**
 * @Title: typelink
 * @Description: todo(栏目完整链接)
 * @param int $id 栏目ID
 * @author 苏晓信
 * @date 2017年7月2日
 * @throws
 */
function typelink($id){
    $arctype = new Arctype();
    return $arctype->typelink($id);
}

/**
 * @Title: toparctypedata
 * @Description: todo(返回当前栏目的顶级栏目数据)
 * @param int $id
 * @author 苏晓信
 * @date 2017年7月2日
 * @throws
 */
function toparctypedata($id){
    $arctype = new Arctype();
    return $arctype->topArctypeData($id);
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
function position($id, $home="首页", $line=">"){
    $arctype = new Arctype();
    return $arctype->position($id, $home, $line);
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
function arclist($typeid='0', $limit='', $flag='', $order='id DESC'){
    $archive = new Archive();
    return $archive->arclist($typeid, $limit, $flag, $order);
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
function prenext($archiveArr){
    $archive = new Archive();
    return $archive->prenext($archiveArr);
}

/**
 * @Title: click
 * @Description: todo(文档点击数+1)
 * @param array $archiveArr 当前文档数组
 * @author 苏晓信
 * @date 2017年7月6日
 * @throws
 */
function click($archiveArr){
    $archive = new Archive();
    $archive->click($archiveArr);
}

/**
 * @Title: confv
 * @Description: todo(获取配置值)
 * @param string $k
 * @param string $type
 * @return string
 * @author 苏晓信
 * @date 2017年8月26日
 * @throws
 */
function confv($k, $type = 'web'){
    $config = new Config();
    return $config->confv($k, $type);
}

function flinks(){
    $flink = new Flink();
}

/**
 * @Title: banners
 * @Description: todo(banner模块数据)
 * @param int $mid
 * @param string $limit
 * @author 苏晓信
 * @date 2017年8月26日
 * @throws
 */
function banners($mid, $limit=''){
    $banner = new Banner();
    return $banner->banners($mid, $limit);
}

function tag(){
    
}