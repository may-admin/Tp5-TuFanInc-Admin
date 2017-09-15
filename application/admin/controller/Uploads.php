<?php
namespace app\admin\controller;

use think\Controller;
use think\Image;
use app\admin\model\UserInfo;

class Uploads extends Controller
{
    public $file_move_path;   //上传文件移动服务器位置
    public $file_back_path;   //上传文件返回文件地址
    public $up_type;   //上传类型
    
    public $root_path;   //根目录路径
    public $root_url;   //根目录URL
    public $order;   //文件排序
    
    public function _initialize()
    {
        parent::_initialize();
        if (!session('userId')){
            exit();
        }
        $this->up_type = input('get.dir');   //上传文件类型
        $up = cache('DB_UP_CONFIG');
        if(!$up){
            $up = db('config')->where('type', 'eq', 'up')->select();
            $up_config = [];
            foreach ($up as $k => $v){
                $up_config[$v['k']] = $v['v'];
            }
            cache('DB_UP_CONFIG', $up_config);
            $up = cache('DB_UP_CONFIG');
        }
        $this->file_move_path = WEB_PATH.DS.$up['upload_path'].DS.$this->up_type;
        $this->file_back_path = DS.$up['upload_path'].DS.$this->up_type;
        
        $this->root_path = WEB_PATH.'/'.$up['upload_path'].'/';
        $this->root_url = '/'.$up['upload_path'].'/';
        $this->order = empty(input('get.order')) ? 'name' : strtolower(input('get.order'));
    }
    
    /**
     * kindeditor文件上传方法
     */
    public function upload()
    {
        $up_config = cache('DB_UP_CONFIG');   //获取数据库中的上传文件配置信息缓存
        $file = request()->file('imgFile');
        if ($file){
            $info = $file->validate(['size'=>$up_config['image_size'], 'ext' => $up_config[$this->up_type.'_format'] ])
            ->move($this->file_move_path);
            if($info){
                if ( $this->up_type == 'image' && $up_config['isprint'] == 1){   //上传图片，加水印
                    $file = Image::open( $this->file_move_path.DS.$info->getSaveName() );   //打开上传的图片
                    //水印图片、水印位置、水印透明度 -> 保存同名图片覆盖
                    $file->water(WEB_PATH.$up_config['image_print'], $up_config['print_position'], $up_config['print_blur'])
                    ->save( $this->file_move_path.DS.$info->getSaveName() );
                }
                $file_path = $this->file_back_path.DS.$info->getSaveName();
                $file_path = $up_config['image_url'].str_replace('\\', '/', $file_path);
                echo json_encode(['error' => 0, 'url' => $file_path]);
            }else{
                $this->_alert($file->getError());
            }
        }else{
            $this->_alert('请选择文件');
        }
    }
    
    /**
     * @Title: cropper
     * @Description: todo(上传头像并裁剪[ 200x200 ])
     * @author 苏晓信
     * @date 2017年7月30日
     * @throws
     */
    public function cropper()
    {
        $file = request()->file('avatar_file');
        if ($file){
            $data = input('post.');
            $id = $data['id'];   //用户ID
            $avatar_data = json_decode(htmlspecialchars_decode($data['avatar_data']), true);
            $start_x = $avatar_data['x'];       //起始x
            $start_y = $avatar_data['y'];       //起始y
            $end_x   = $avatar_data['width'];   //结束x
            $end_y   = $avatar_data['height'];  //结束y
            $rotate  = $avatar_data['rotate'];  //旋转角度[有正负]
            
            $uiModel = new UserInfo();
            $data = $uiModel->where('uid', $id)->find();
            $oldAvatar = $data['avatar'];   //旧头像
            
            $image = Image::open( $file );   //打开上传的图片
            $extension = end(explode('.', $_FILES["avatar_file"]["name"])); //后缀
            $name = DS.date('Ymd', time()).DS.date('YmdHis', time())."_".rand(100000, 999999).".".$extension;
            $path = $this->file_move_path.$name;
            $back = str_replace('\\', '/', $this->file_back_path.$name);
            //生成目录
            if ( !file_exists($this->file_move_path.DS.date('Ymd', time())) ){
                mkdir($this->file_move_path);
                mkdir($this->file_move_path.DS.date('Ymd', time()));
            }
            $image->rotate($rotate)->crop($end_x, $end_y, $start_x, $start_y, 200, 200)->save($path, null, 100);
            
            if (file_exists($path)){    //检测图片是否保存成功
                $data = ['avatar' => $back];
                $where = ['uid' => $id];
                $result = $uiModel->allowField(true)->where($where)->update($data);
                if ($result){   //保存成功再删除旧头像
                    if ($oldAvatar != '/static/global/face/default.png'){      //删除之前头像
                        unlink(WEB_PATH.$oldAvatar);
                    }
                    $res = [
                        'state'  => 200,
                        'message' => 'success',
                        'result' => $back
                    ];
                }else{
                    $res = [
                        'state'  => 200,
                        'message' => '头像数据保存失败',
                        'result' => ''
                    ];
                }
            }else{
                $res = [
                    'state'  => 200,
                    'message' => '图片保存失败，请检查目录是否生成',
                    'result' => ''
                ];
            }
            return json_encode($res);
        }
    }
    
    /**
     * kindeditor文件管理方法
     */
    public function manager()
    {
        $up_config = cache('DB_UP_CONFIG');   //获取数据库中的上传文件配置信息缓存
        $ext_arr = explode(',', $up_config['image_format']);
        if (!in_array($this->up_type, array('', 'image', 'flash', 'media', 'file'))) {   //kindeditor允许的文件目录名
            exit("Invalid Directory name.");
        }
        if ($this->up_type !== '') {
            $this->root_path .= $this->up_type.'/';
            $this->root_url .= $this->up_type . '/';
            if (!file_exists($this->root_path)) {
                mkdir($this->root_path);
            }
        }
        //根据path参数，设置各路径和URL
        if (empty(input('get.path'))) {
            $current_path = realpath($this->root_path).'/';
            $current_url = $this->root_url;
            $current_dir_path = '';
            $moveup_dir_path = '';
        } else {
            $current_path = realpath($this->root_path).'/' . input('get.path');
            $current_url = $this->root_url . input('get.path');
            $current_dir_path = input('get.path');
            $moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
        }
        
        //不允许使用..移动到上一级目录
        if (preg_match('/\.\./', $current_path)) {
            exit('Access is not allowed.');
        }
        //最后一个字符不是/
        if (!preg_match('/\/$/', $current_path)) {
            exit('Parameter is not valid.');
        }
        //目录不存在或不是目录
        if (!file_exists($current_path) || !is_dir($current_path)) {
            exit('Directory does not exist.');
        }
        //遍历目录取得文件信息
        $file_list = array();
        if ($handle = opendir($current_path)) {
            $i = 0;
            while (false !== ($filename = readdir($handle))) {
                if ($filename{0} == '.') continue;
                $file = $current_path . $filename;
                if (is_dir($file)) {
                    $file_list[$i]['is_dir'] = true; //是否文件夹
                    $file_list[$i]['has_file'] = (count(scandir($file)) > 2); //文件夹是否包含文件
                    $file_list[$i]['filesize'] = 0; //文件大小
                    $file_list[$i]['is_photo'] = false; //是否图片
                    $file_list[$i]['filetype'] = ''; //文件类别，用扩展名判断
                } else {
                    $file_list[$i]['is_dir'] = false;
                    $file_list[$i]['has_file'] = false;
                    $file_list[$i]['filesize'] = filesize($file);
                    $file_list[$i]['dir_path'] = '';
                    $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
                    $file_list[$i]['filetype'] = $file_ext;
                }
                $file_list[$i]['filename'] = $filename; //文件名，包含扩展名
                $file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file)); //文件最后修改时间
                $i++;
            }
            closedir($handle);
        }
        
        $file_list = $this->_order_func($file_list, $this->order);
        
        $result = array();
        //相对于根目录的上一级目录
        $result['moveup_dir_path'] = $moveup_dir_path;
        //相对于根目录的当前目录
        $result['current_dir_path'] = $current_dir_path;
        //当前目录的URL
        $result['current_url'] = $current_url;
        //文件数
        $result['total_count'] = count($file_list);
        //文件列表数组
        $result['file_list'] = $file_list;
        
        //输出JSON字符串
        return json_encode($result);
    }
    
    /**
     * 文件排序
     * @param Array $file_list      排序数组
     * @param String $sort_key      以什么字段排序
     * @param string $sort          排序方式【正序|倒序】SORT_DESC|SORT_DESC
     * @return boolean|unknown
     */
    public function _order_func(&$file_list, $sort_key, $sort = SORT_ASC){
        if ($sort_key == 'type'){
            $sort_key = 'filetype';
        }else if ($sort_key == 'size'){
            $sort_key = 'filesize';
        }else{   //name
            $sort_key = 'filename';
        }
        if(is_array($file_list)){
            foreach ($file_list as $key => $row_array){
                $num[$key] = $row_array[$sort_key];
            }
        }else{
            return false;
        }
        //对多个数组或多维数组进行排序
        array_multisort($num, $sort, $file_list);
        //array_multisort($num1, SORT_ASC, $num2, SORT_ASC, $file_list);
        return $file_list;
    }
    
    /**
     * kindeditor 文件和文件夹删除
     * @return json
     */
    public function delete()
    {
        $data = input('post.');
        $res['msg'] = '删除失败';
        $res['code'] = 400;
        $res['data'] = [];
        if ($data['dir'] == 'dir'){
            deldir(WEB_PATH.$data['del_url'], 'y');   //删除目录
            if (!file_exists(WEB_PATH.$data['del_url'])){   //检测目录是否还存在
                $res['msg'] = '目录删除成功';
                $res['code'] = 200;
            }else {
                $res['msg'] = '目录删除失败';
                $res['code'] = 400;
            }
        }else if($data['dir'] == 'file'){
            unlink(WEB_PATH.$data['del_url']);   //删除文件
            if (!file_exists(WEB_PATH.$data['del_url'])){   //检测目录是否还存在
                $res['msg'] = '文件删除成功';
                $res['code'] = 200;
            }else {
                $res['msg'] = '文件删除失败';
                $res['code'] = 400;
            }
        }else{
        }
        return json_encode($res);
    }
    
    public function _alert($msg)
    {
        header('Content-type: text/html; charset=UTF-8');
        echo json_encode(['error' => 1, 'message' => $msg]);
        exit;
    }
}
