<?php
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
/**
 * 写入cache
 * @param:: string $cacheData 缓存数据
 * @param:: string $file 文件名
 * @return:: NULL
*/
function online_write_cache($cacheData, $file) {
    $cacheData = serialize($cacheData);
	$cachefile = BASE_ROOT.'./source/plugin/online/cache/'.$file;
	@$fp = fopen($cachefile, 'wb') OR XHandle::halt('读取缓存数据失败。如果您使用的是Unix/Linux主机，请修改缓存目录 (source/plugin/online/cache/'.$file.') 下所有文件的权限为777。如果您使用的是Windows主机，请联系管理员，将该目录下所有文件设为everyone可写', '', 1);
	@$fw = fwrite($fp, $cacheData) OR XHandle::halt('写入缓存数据失败，缓存目录 (source/plugin/online/cache/'.$file.') 不可写');
	@fclose($fp);
}

/**
 * 读取cache
 * @param:: sting $file 文件名
 * @return:: array()
*/
function online_read_cache($file) {
	$cachefile = BASE_ROOT . './source/plugin/online/cache/'.$file;
    if (false === file_exists($cachefile)) {
        return array();
    }
    else {
    	if ($fp = fopen($cachefile, 'r')) {
    		$data = fread($fp, filesize($cachefile));
    		fclose($fp);
            return XHandle::dounSerialize($data);
    		//return unserialize($data);
    	}
        else {
            return array();
        }
    }
}

/**
 * 删除cache
*/
function online_del_cache($file) {
    $cachefile = BASE_ROOT.'./source/plugin/online/cache/'.$file;
    if (true === file_exists($cachefile)) {
        @unlink($cachefile);
    }
}

/**
 * 在线客服浮动
*/
function online_plugin_preview() {
    //读取数据
    $online = online_read_cache('config');
    if (!empty($online)) {
        
        //开启在线客服
        if ($online['type'] == 1 OR $online['type'] == 2) {
            
            //读取列表
            $array = online_read_cache('online');
            if (!empty($array)) {
                $array = XHandle::sysSortArray($array, 'orders');
            }
            require_once(BASE_ROOT.'./source/plugin/online/block/skin_css.tpl.php');
            require_once(BASE_ROOT.'./source/plugin/online/block/skin_body.tpl.php');
            
            //浮动JS
            if ($online['type'] == 1){
                require_once(BASE_ROOT.'./source/plugin/online/block/float_left.tpl.php');
            }
            else {
                require_once(BASE_ROOT.'./source/plugin/online/block/float_right.tpl.php');
            }
        }
    }
}
?>