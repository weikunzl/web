<?php
if (! defined ( 'IN_OESOFT' )) {
	exit ( 'OElove Access Denied' );
}
require_once BASE_ROOT . './source/core/smarty/class.smarty.php';
class TPL extends X {
	private static $tpl = NULL;
	private static $cache_dir = 'tpl/_caches';
	private static $compiled_dir = 'tpl/_compiled';
	private static $left_label = '<!--{';
	private static $right_label = '}-->';
	private static $compile_check = true;
	private static $force_compile = false;
	private static $cacheing = false;
	private static $allow_php_tag = false;
	public static function __run() {
		self::$tpl = new Smarty ();
		self::$tpl->setTemplateDir ( BASE_ROOT );
		self::$tpl->setCacheDir ( BASE_ROOT . self::$cache_dir );
		self::$tpl->setCompileDir ( BASE_ROOT . self::$compiled_dir );
		self::$tpl->left_delimiter = self::$left_label;
		self::$tpl->right_delimiter = self::$right_label;
		self::$tpl->setCaching ( self::$cacheing );
		self::$tpl->compile_check = true;
		self::$tpl->force_compile = self::$force_compile;
		self::$tpl->allow_php_tag = self::$allow_php_tag;
		self::_defaultLabel ();
	}
	private static function _defaultLabel() {
		$var_array = array (
				'urlpath' => parent::$urlpath,
				'config' => parent::$cfg,
				'page_charset' => OESOFT_CHARSET,
				'skinpath' => parent::$skinpath,
				'tplpath' => parent::$tplpath,
				'tplpre' => OESOFT_TPLPRE,
				'cppath' => PATH_URL . 'tpl/' . __ADMIN_TPLDIR__ . '/',
				'cptplpath' => 'tpl/' . __ADMIN_TPLDIR__ . '/',
				'cpfile' => __ADMIN_FILE__,
				'uctplpath' => 'tpl/user/',
				'ucpath' => PATH_URL . 'tpl/user/',
				'rootpath' => OESOFT_ROOT,
				'copyright_header' => 'Powered By ZYQ',
				'copyright_author' => 'ZYQ',
				'copyright_poweredby' => "Powered by <a href='http://www.zyiq.cn/' target='_blank'>ZYQ</a>",
				'copyright_type' => OESOFT_TYPE,
				'copyright_version' => OESOFT_VERSION,
				'copyright_release' => OESOFT_RELEASE 
		);
		self::assign ( $var_array );
	}
	public static function assign($array) {
		if (is_array ( $array )) {
			foreach ( $array as $key => $value ) {
				self::$tpl->assign ( $key, $value );
			}
		}
	}
	public static function display($tplfile, $iscache = false) {
		if ($iscache == true) {
			$cacheid = self::getURI ();
			if (self::setCache ()) {
				self::$tpl->display ( $tplfile, $cacheid );
			} else {
				self::$tpl->display ( $tplfile );
			}
		} else {
			self::$tpl->display ( $tplfile );
		}
	}
	public static function setCache() {
		if (parent::$cfg ['cachstatus'] == 1) {
			$cache_seconds = parent::$cfg ['cachtime'] * 60;
			self::$tpl->setCaching ( true );
			self::$tpl->setCacheLifetime ( $cache_seconds );
			return true;
		} else {
			return false;
		}
	}
	public static function getCache($tplfile) {
		$cacheid = self::getURI ();
		if (! self::$tpl->isCached ( $tplfile, $cacheid )) {
			return true;
		} else {
			return false;
		}
	}
	private static function getURI() {
		return md5 ( $_SERVER ["REQUEST_URI"] );
	}
	public static function clearComplied() {
		self::$tpl->clearCompiledTemplate ();
	}
	public static function clearAllCache() {
		self::$tpl->clearAllCache ();
	}
	public static function clearCache($tplfile, $cacheid = NULL) {
		if (! empty ( $tplfile )) {
			$cacheid = self::getURI ();
		}
		self::$tpl->clearCache ( $tplfile, $cacheid );
	}
	public static function regFunction($hook, $function) {
		self::$tpl->registerPlugin ( 'function', $hook, $function );
	}
	public static function fetch($file) {
		if (! empty ( $file )) {
			return self::$tpl->fetch ( $file );
		} else {
			return null;
		}
	}
}
?>