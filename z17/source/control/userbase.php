<?php
if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class userbase extends X {
	protected $ucfile = '';
	protected $uctpl = '';
	public $pagesize = 20;
	public $page = 1;
	public $thepath = '';
	public $u = array ();
	public $g = array ();
	public $halttype = null;
	public function __construct() {
		$this->ucfile = PATH_URL . 'usercp.php';
		$this->uctpl = "tpl/user/";
		$this->halttype = XRequest::getArgs ( 'halttype' );
		$this->checkLogin ();
		TPL::assign ( array (
				'a' => $GLOBALS ['a'],
				'ucfile' => $this->ucfile,
				'uctpl' => $this->uctpl,
				'lang' => XLang::loadLang (),
				'halttype' => $this->halttype,
				'jbox' => JBOX,
				'login' => array (
						'status' => 1,
						'userid' => $this->u ['userid'],
						'username' => $this->u ['username'],
						'gender' => $this->u ['gender'] 
				) 
		) );
		$this->page = intval ( XRequest::getArgs ( 'page' ) );
		if ($this->page < 1) {
			$this->page = 1;
		}
	}
	public function checkLogin() {
		$model_cp = parent::model ( 'passport', 'im' );
		if (false === $model_cp->checkLogin ()) {
			if ($this->halttype == 'jdbox') {
				XHandle::redirect ( PATH_URL . 'index.php?c=passport&a=jdlogin' );
				die ();
			} else {
				XHandle::redirect ( PATH_URL . 'index.php?c=passport&a=login' );
				die ();
			}
		} else {
			list ( $this->u, $this->g ) = $model_cp->getLoginUserInfo ( intval ( parent::$wrap_user ['userid'] ) );
			if (intval ( $this->u ['integrity'] ) == 0) {
				XHandle::redirect ( parent::$urlpath . 'index.php?c=passport&a=perfect' );
			}
			TPL::assign ( array (
					'u' => $this->u,
					'g' => $this->g 
			) );
		}
		unset ( $model_cp );
	}
	public function existsTplFile($tplname) {
		$tplfile = $this->uctpl . $tplname . '.tpl';
		if (! file_exists ( BASE_ROOT . './' . $tplfile )) {
			return false;
		} else {
			return true;
		}
	}
	public function getTPLFile($tplname) {
		$simplefile = $this->uctpl . $tplname . '.tpl';
		$tplfile = $this->uctpl . $tplname . '.tpl';
		if (! file_exists ( BASE_ROOT . './' . $tplfile )) {
			XHandle::halt ( '模板文件[' . $simplefile . ']不存在，请检查！', '', 1 );
		} else {
			return $tplfile;
		}
	}
	public function getTitle($id) {
		$array = array (
				'index' => '交友中心',
				'account_run' => '我的账号',
				'account_editpassword' => '修改密码',
				'account_recall' => '邮件接收设置',
				'account_lovestatus' => '设置交友状态',
				'payment' => '在线充值',
				'paycard' => '充值卡充值',
				'extend_connect' => '绑定登录',
				'extend_cpa' => '推广注册',
				'extend_transfer' => '积分转换',
				'album_run' => '我的相册',
				'album_upload' => '上传照片',
				'album_edit' => '修改照片',
				'setavatar' => '设置形象照',
				'profile_edit' => '修改资料',
				'cond' => '设置择友条件',
				'certify_run' => '诚信认证',
				'certify_email' => '邮箱认证',
				'certify_mobile' => '手机认证',
				'certify_idnumber' => '身份证认证',
				'certify_video' => '视频认证',
				'money_run' => XLang::get ( 'money' ) . '记录',
				'points_run' => XLang::get ( 'points' ) . '记录',
				'mbsms_run' => '短信记录',
				'vip_run' => 'VIP服务',
				'buysms' => '购买手机短信',
				'diary_run' => '我的日记',
				'diary_add' => '发表日记',
				'diary_edit' => '编辑日记',
				'ask_run' => '爱情求助',
				'ask_add' => '发布求助',
				'ask_edit' => '编辑求助',
				'dating_run' => '同城约会',
				'dating_add' => '发布约会',
				'dating_edit' => '编辑约会',
				'dating_my' => '赴约记录',
				'party_run' => '交友活动',
				'story_run' => '成功故事',
				'story_add' => '发表成功故事',
				'story_edit' => '编辑成功故事',
				'listen_run' => '我的关注',
				'fans_run' => '我的粉丝',
				'weibo_all' => '全部微博',
				'weibo_my' => '我的微博',
				'weibo_add' => '发表微博',
				'visit_run' => '我看过谁',
				'visitme_run' => '谁看过我',
				'match_run' => '配对结果',
				'gift_receive' => '收到的礼物',
				'gift_viewreceive' => '查看收到的礼物',
				'gift_sendlog' => '送出的礼物',
				'gift_viewsend' => '查看送出的礼物',
				'gift_send' => '赠送礼物',
				'sysmsg_run' => '管理员信件',
				'sysmsg_view' => '查看管理员信件',
				'outmsg_run' => '已发信件',
				'outmsg_view' => '查看已发信件',
				'message_run' => '会员来信',
				'message_view' => '查看信件',
				'msglog_run' => '查看信件记录',
				'message_hi' => '打招呼',
				'message_send' => '写信件',
				'hi_run' => '收到的问候语',
				'hi_to' => '已发问候语',
				'hi_read' => '阅读问候语',
				'hi_add' => '打招呼/问候',
				'hi_view' => '查看已发问候语',
				'complaint' => '举报/投诉会员' 
		);
		return $array [$id] . '-' . parent::$cfg ['sitename'];
	}
	public function getUserInfo() {
		$model_pass = parent::model ( 'passport', 'im' );
		list ( $this->u, $this->g ) = $model_pass->getLoginUserInfo ( parent::$wrap_user ['userid'] );
		unset ( $model_pass );
		if (empty ( $this->u )) {
			XHandle::redirect ( PATH_URL . 'index.php?c=passport&a=login' );
		} else {
			TPL::assign ( array (
					'u' => $this->u,
					'g' => $this->g 
			) );
		}
	}
}
?>