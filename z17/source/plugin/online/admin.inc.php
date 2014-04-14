<?php
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
//载入函数
require_once(BASE_ROOT.'./source/plugin/online/function.php');
/**
 * 在线客服设置页面
*/
function online_plugin_setting() {
    $data = array();
    //读取配置文件
    $data = online_read_cache('config');
    require_once(BASE_ROOT.'./source/plugin/online/block/adm_config.tpl.php');    
}
//注册设置事件
XHook::addAction('online_plugin_setting_event', 'online_plugin_setting');

/**
 * 保存设置
*/
function online_plugin_savesetting() {
    $args = XRequest::getGpc(array(
        'type', 'left_leftpr', 'left_toppr',
        'right_rightpr', 'right_toppr',
        'title', 'close',
        'skin', 'color', 'qqicon', 'msnicon', 'skypeicon',
        'taobaoicon', 'aliicon', 
    ));
    $remark = XRequest::getArgs('remark', '', false);
    $args['type'] = intval($args['type']);
    $args['left_leftpr'] = intval($args['left_leftpr']); 
    $args['left_toppr'] = intval($args['left_toppr']); 
    $args['right_rightpr'] = intval($args['right_rightpr']); 
    $args['right_toppr'] = intval($args['right_toppr']); 
    $args = array_merge($args, array('remark'=>$remark));
    //生成配置文件
    online_write_cache($args, 'config');
    XHandle::halt('设置成功', __ADMIN_FILE__.'?c=plugin&plugin_id=online&a=setting', 0);
}

/**
 * 在线客服列表页面
*/
function online_plugin_list(){
    $data = array();
    //读取列表cache
    $data = online_read_cache('online');
    if (empty($data)) {
        $count = 0;
    }
    else {
        //排序
        $data = XHandle::sysSortArray($data, 'orders');
        $count = count($data);
    }
    //载入模板文件
    require_once(BASE_ROOT.'./source/plugin/online/block/adm_list.tpl.php');
    
}
//注册列表事件
XHook::addAction('online_plugin_list_event', 'online_plugin_list');

/**
 * 保存添加
*/
function online_plugin_saveadd(){
    $args = XRequest::getGpc(array(
        'orders', 'name', 'type', 'number', 'show'
    ));
    if (empty($args['name'])){
        XHandle::halt('请填写客服名称', '', 1);
    }
    if (empty($args['number'])) {
        XHandle::halt('请填写客服号码', '', 1);
    }
    $args['orders'] = intval($args['orders']);
    $args['show'] = intval($args['show']);
    
    //读取cache
    $array = array();
    $array = online_read_cache('online');
    if (empty($array)) {
        $array = array($args);
    }
    else {
        $array = array_merge($array, array($args));
    }
    //写入Cache
    online_write_cache($array, 'online');
    XHandle::halt('添加成功', __ADMIN_FILE__.'?c=plugin&plugin_id=online&a=setting&do=list', 0); 
}

/**
 * 批量更新保存
*/
function online_plugin_saveupdate() {
    $array_id = XRequest::getArray('id');
    if (empty($array_id)) {
        XHandle::halt('对不起，没有要更新的数据。', '', 1);
    }
    $array = array();
    for($ii=0; $ii<count($array_id); $ii++){
        $id = intval($array_id[$ii]);
        //获取参数
        $args = NULL;
        $args = array(
            'orders'=>XRequest::getInt('orders_'.$id),
            'name'=>XRequest::getArgs('name_'.$id),
            'type'=>XRequest::getArgs('type_'.$id),
            'number'=>XRequest::getArgs('number_'.$id),
            'show'=>XRequest::getInt('show_'.$id),
        );
        $array[] = $args;      
    }
    if (!empty($array)) {
        //删除原来cache数据
        online_del_cache('online');
        //重新创建新Cache数据
        online_write_cache($array, 'online');
        
        XHandle::halt('更新成功', __ADMIN_FILE__.'?c=plugin&plugin_id=online&a=setting&do=list', 0);
    }
    else {
        XHandle::halt('更新失败，没有要更新的数据！', '', 1);
    }
}

/**
 * 删除
*/
function online_plugin_del() {
    $id = XRequest::getInt('id');
    if ($id<1) {
        XHandle::halt('请选择要删除的ID', '', 1);
    }    
    //读取数据
    $array = array();
    $array = online_read_cache('online');
    if (empty($array)) {
        XHandle::halt('对不起，载入数据失败！', '', 1);
    }
    else {
        //排序后再删除数组，否则对应不上数组下标
        $array = XHandle::sysSortArray($array, 'orders');
        unset($array[$id-1]);        
    }
    //重写cache
    online_write_cache($array, 'online');
    XHandle::halt('删除成功', __ADMIN_FILE__.'?c=plugin&plugin_id=online&a=setting&do=list', 0);
}

//注册后台预览事件
XHook::addAction('online_plugin_preview_event', 'online_plugin_preview');

?>