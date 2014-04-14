<?php

require_once '../source/core/run.php';
$message = '';
if (file_exists(BASE_ROOT.'./install/data/cache.lock')) {
$message = "对不起，您已经执行过了缓存更新！";
}
else {
if (file_exists(BASE_ROOT.'./install/data/conf.php')) {
require_once BASE_ROOT.'./install/data/conf.php';
$sitename = OE_SITENAME;
$siteurl = OE_SITEURL;
$model = X::model('setting','am');
$args = $model->getOptions('site_base');
$args['sitename'] = $sitename;
$args['siteurl'] = $siteurl;
$model->doSave('site_base',$args);
$model->doUpdateCache();
unset($model);
$message = '缓存更新成功';
$lock_content = "OK";
$lock_file = 'install/data/cache.lock';
X::loadUtil('file');
XFile::createFile($lock_file);
XFile::writeFile($lock_file,$lock_content);
}
else {
$message = '缓存更新失败，请登录管理后台更新。';
}
}
echo json_encode(array('message'=>$message));
?>