<?php
/*
Plugin Name: ShareBar
Version: v1.0
Plugin URL:
Description: 在文章末尾添加分享条，将你的文章分享到各大分享站。
For Version: OElove v3.x所有版本
Author: OElove官方
Author URL: http://www.phpcoo.com/
Last Update: 2012-04-10
*/
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
?>

<?php
/**
 * 载入JS和CSS样式
*/
function sharebar_plugin_loading() {
?>

<link href="<?php echo PATH_URL;?>source/plugin/sharebar/sharebar.css" rel="stylesheet" type="text/css" />
<script src="<?php echo PATH_URL;?>source/plugin/sharebar/sharebar.js"></script>
<script type="text/javascript">
var share_site_url = "<?php echo X::$cfg['siteurl'];?>";
var share_site_name = "<?php echo X::$cfg['sitename'];?>";
</script>
<?php
}
//注册前台样式
XHook::addAction('index_head', 'sharebar_plugin_loading');
?>

<?php
/**
 * 载入ShareBar图标
*/
function sharebar_plugin_show(){
?>

<p class="pg_share pg_clearfix">
  <span><a class="t_qq" title="分享到腾讯微博">腾讯微博</a></span>
  <span><a class="sina" title="分享到新浪微博">新浪微博</a></span>
  <span><a class="twitter" title="分享到Twitter">Twitter</a></span>
  <span><a class="renren" title="分享到人人网">人人网</a></span>
  <span><a class="qzone" title="分享到QQ空间">QQ空间</a></span>
</p>

<?php
}	

//注册文章尾部分享
XHook::addAction('content_share', 'sharebar_plugin_show');
?>