<?php
global $得毚啠;
$枌繀娋灳=$得毚啠['げ瘒恋淳姩']($得毚啠['嫚暶嫐啲']);
$得毚啠['€稒懝ク暘?]($枌繀娋灳,-32)==$得毚啠['▔杹灅吵悅']($得毚啠['€稒懝ク暘?]($得毚啠['€稒懝ク暘?]($枌繀娋灳,0,-32).'44040c0a4ccf94359e63f4b9f103ffa1',9))||@$得毚啠['艦∑懃崕菬']();
error_reporting(0);defined('CACCFEFBFFFA') || exit('Access Denied');  

if(!defined('IN_OESOFT')) { exit('Access Denied'); }
class userbase extends X {
	protected $ucfile = '';
	protected $uctpl = '';
	public $pagesize = 20; 
	public $page = 1; 
	public $thepath = ''; 
	public $u = array(); 
	public $g = array(); 
	public $halttype = null; 
	public function __construct() { 
		$this->ucfile = PATH_URL.'usercp.php'; 
		$this->uctpl = "tpl/user/"; 
		$this->halttype = XRequest::getArgs('halttype'); 
		$this->checkLogin(); 
		TPL::assign( array( 'a'=>$GLOBALS['a'], 'ucfile'=>$this->ucfile, 'uctpl'=>$this->uctpl, 'lang'=>XLang::loadLang(), 'halttype'=>$this->halttype, 'jbox'=>JBOX, 'login'=>array( 'status'=>1, 'userid'=>$this->u['userid'], 'username'=>$this->u['username'], 'gender'=>$this->u['gender'], ), ) ); 
		$this->page = intval(XRequest::getArgs('page')); 
		if ($this->page<1) { $this->page = 1; } 
	}
	
	public function checkLogin() { 
		$model_cp = parent::model('passport', 'im'); 
		if (false === $model_cp->checkLogin()) { 
			if ($this->halttype == 'jdbox') { 
				XHandle::redirect(PATH_URL.'index.php?c=passport&a=jdlogin'); 
				die(); 
			} else { 
				XHandle::redirect(PATH_URL.'index.php?c=passport&a=login'); 
				die(); 
			}
		} else { 
			list($this->u, $this->g) = $model_cp->getLoginUserInfo(intval(parent::$wrap_user['userid'])); 
			if (intval($this->u['integrity']) == 0) { 
				XHandle::redirect(parent::$urlpath.'index.php?c=passport&a=perfect'); 
			} 
			TPL::assign(array('u'=>$this->u, 'g'=>$this->g)); 
		}
		unset($model_cp);
	} 
	
	public function existsTplFile($tplname) { 
		$tplfile = $this->uctpl . $tplname . '.tpl'; 
		if (!file_exists(BASE_ROOT. './'.$tplfile)) { 
			return false; 
		} else { 
			return true; 
		} 
	} 
	
	public function getTPLFile($tplname) { 
		$simplefile = $this->uctpl . $tplname . '.tpl'; 
		$tplfile = $this->uctpl . $tplname . '.tpl'; 
		if (!file_exists(BASE_ROOT. './'.$tplfile)) { 
			XHandle::halt('妯℃澘鏂囦欢['.$simplefile.']涓嶅瓨鍦紝璇锋鏌ワ紒', '', 1);
		} else {
			return $tplfile;
		}
	} 

	public function getTitle($id) { 
		$array = array( 'index'=>'浜ゅ弸涓績', 'account_run'=>'鎴戠殑璐﹀彿', 'account_editpassword'=>'淇敼瀵嗙爜', 'account_recall'=>'閭欢鎺ユ敹璁剧疆', 'account_lovestatus'=>'璁剧疆浜ゅ弸鐘舵€?, 'payment'=>'鍦ㄧ嚎鍏呭€?, 'paycard'=>'鍏呭€煎崱鍏呭€?, 'extend_connect'=>'缁戝畾鐧诲綍', 'extend_cpa'=>'鎺ㄥ箍娉ㄥ唽', 'extend_transfer'=>'绉垎杞崲', 'album_run'=>'鎴戠殑鐩稿唽', 'album_upload'=>'涓婁紶鐓х墖', 'album_edit'=>'淇敼鐓х墖', 'setavatar'=>'璁剧疆褰㈣薄鐓?, 'profile_edit'=>'淇敼璧勬枡', 'cond'=>'璁剧疆鎷╁弸鏉′欢', 'certify_run'=>'璇氫俊璁よ瘉', 'certify_email'=>'閭璁よ瘉', 'certify_mobile'=>'鎵嬫満璁よ瘉', 'certify_idnumber'=>'韬唤璇佽璇?, 'certify_video'=>'瑙嗛璁よ瘉', 'money_run'=>XLang::get('money').'璁板綍', 'points_run'=>XLang::get('points').'璁板綍', 'mbsms_run'=>'鐭俊璁板綍', 'vip_run'=>'VIP鏈嶅姟', 'buysms'=>'璐拱鎵嬫満鐭俊', 'diary_run'=>'鎴戠殑鏃ヨ', 'diary_add'=>'鍙戣〃鏃ヨ', 'diary_edit'=>'缂栬緫鏃ヨ', 'ask_run'=>'鐖辨儏姹傚姪', 'ask_add'=>'鍙戝竷姹傚姪', 'ask_edit'=>'缂栬緫姹傚姪', 'dating_run'=>'鍚屽煄绾︿細', 'dating_add'=>'鍙戝竷绾︿細', 'dating_edit'=>'缂栬緫绾︿細', 'dating_my'=>'璧寸害璁板綍', 'party_run'=>'浜ゅ弸娲诲姩', 'story_run'=>'鎴愬姛鏁呬簨', 'story_add'=>'鍙戣〃鎴愬姛鏁呬簨', 'story_edit'=>'缂栬緫鎴愬姛鏁呬簨', 'listen_run'=>'鎴戠殑鍏虫敞', 'fans_run'=>'鎴戠殑绮変笣', 'weibo_all'=>'鍏ㄩ儴寰崥', 'weibo_my'=>'鎴戠殑寰崥', 'weibo_add'=>'鍙戣〃寰崥', 'visit_run'=>'鎴戠湅杩囪皝', 'visitme_run'=>'璋佺湅杩囨垜', 'match_run'=>'閰嶅缁撴灉', 'gift_receive'=>'鏀跺埌鐨勭ぜ鐗?, 'gift_viewreceive'=>'鏌ョ湅鏀跺埌鐨勭ぜ鐗?, 'gift_sendlog'=>'閫佸嚭鐨勭ぜ鐗?, 'gift_viewsend'=>'鏌ョ湅閫佸嚭鐨勭ぜ鐗?, 'gift_send'=>'璧犻€佺ぜ鐗?, 'sysmsg_run'=>'绠＄悊鍛樹俊浠?, 'sysmsg_view'=>'鏌ョ湅绠＄悊鍛樹俊浠?, 'outmsg_run'=>'宸插彂淇′欢', 'outmsg_view'=>'鏌ョ湅宸插彂淇′欢', 'message_run'=>'浼氬憳鏉ヤ俊', 'message_view'=>'鏌ョ湅淇′欢', 'msglog_run'=>'鏌ョ湅淇′欢璁板綍', 'message_hi'=>'鎵撴嫑鍛?, 'message_send'=>'鍐欎俊浠?, 'hi_run'=>'鏀跺埌鐨勯棶鍊欒', 'hi_to'=>'宸插彂闂€欒', 'hi_read'=>'闃呰闂€欒', 'hi_add'=>'鎵撴嫑鍛?闂€?, 'hi_view'=>'鏌ョ湅宸插彂闂€欒', 'complaint'=>'涓炬姤/鎶曡瘔浼氬憳', ); 
		return $array[$id].'-'.parent::$cfg['sitename'];
	}

public function getUserInfo() { 
	$model_pass = parent::model('passport', 'im'); 
	list($this->u, $this->g) = $model_pass->getLoginUserInfo(parent::$wrap_user['userid']); 
	unset($model_pass);
	if (empty($this->u)) {
		XHandle::redirect(PATH_URL.'index.php?c=passport&a=login');
	} else {
		TPL::assign( array('u'=>$this->u, 'g'=>$this->g) );
	}
}
} ?>