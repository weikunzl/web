<?php
/**
 * @CopyRight  (C)2010-2012 OEdev.Net Inc.
 * @WebSite    www.phpcoo.com,www.oedev.net
 * @Author     OEdev <phpcoo@qq.com>
 * @Brief      OElove v3.X
 * @Update     2012.06.20
 * @access     权限值
**/
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
function roll_elements () {
	$elements[] = null;
    
	$elements[0] = array(
		'id'=>'em_1',
		'name'=>'基础设置',
		'value'=>array(
			'setting'=>'系统设置',
		)
	);
    
    $elements[1] = array(
        'id'=>'em_2',
        'name'=>'管理权限',
        'value'=>array(
            'admin_volist'=>'管理员列表',
            'admin_add'=>'添加管理员',
            'admin_edit'=>'修改管理员',
            'admin_del'=>'删除管理员',
            'admin_editpassword'=>'修改密码',
            
            'authgroup_volist'=>'权限组列表',
            'authgroup_add'=>'添加权限组',
            'authgroup_edit'=>'修改权限组',
            'authgroup_del'=>'删除权限组',
        )
    );
    
    $elements[2] = array(
        'id'=>'em_3',
        'name'=>'其他设置',
        'value'=>array(
            'lovesort_volist'=>'交友类型',
            'lovesort_add'=>'添加交友类型',
            'lovesort_edit'=>'修改交友类型',
            'lovesort_del'=>'删除交友类型',
            
            'loveparamter_volist'=>'交友参数',
            'loveparamter_add'=>'添加交友参数',
            'loveparamter_edit'=>'修改交友参数',
            
            'greet_volist'=>'问候语列表',
            'greet_add'=>'添加问候语',
            'greet_edit'=>'修改问候语',
            'greet_del'=>'删除问候语',
            
            'lang_volist'=>'语言包列表',
            'lang_add'=>'添加语言包',
            'lang_edit'=>'修改语言包',
            'lang_del'=>'删除语言包',
            
            'area_volist'=>'地区列表',
            'area_add'=>'添加地区',
            'area_edit'=>'修改地区',
            'area_del'=>'删除地区',
            
            'hometown_volist'=>'户籍列表',
            'hometown_add'=>'添加户籍',
            'hometown_edit'=>'修改户籍',
            'hometown_del'=>'删除户籍',
            
            'htmllabel_volist'=>'HTML标签列表',
            'htmllabel_add'=>'添加HTML标签',
            'htmllabel_edit'=>'编辑HTML标签',
            'htmllabel_del'=>'删除HTML标签',
            
            'zone_volist'=>'广告版位列表',
            'zone_add'=>'添加广告版位',
            'zone_edit'=>'编辑广告版位',
            'zone_del'=>'删除广告版位',
            
            'myads_volist'=>'广告列表',
            'myads_add'=>'添加广告',
            'myads_edit'=>'编辑广告',
            'myads_del'=>'删除广告',

        )
    );
    
    $elements[3] = array(
        'id'=>'em_4',
        'name'=>'文章管理',
        'value'=>array(
            'infocat_volist'=>'分类列表',
            'infocat_add'=>'添加分类',
            'infocat_edit'=>'修改分类',
            'infocat_del'=>'删除分类',
            
            'info_volist'=>'文章列表',
            'info_add'=>'添加文章',
            'info_edit'=>'修改文章',
            'info_del'=>'删除文章',
        )
    );
    
    $elements[4] = array(
        'id'=>'em_5',
        'name'=>'单页管理',
        'value'=>array(
            'aboutcat_volist'=>'分类列表',
            'aboutcat_add'=>'添加分类',
            'aboutcat_edit'=>'修改分类',
            'aboutcat_del'=>'删除分类',
            
            'about_volist'=>'单页列表',
            'about_add'=>'添加单页',
            'about_edit'=>'修改单页',
            'about_del'=>'删除单页',
        )
    );
    
    $elements[5] = array(
        'id'=>'em_6',
        'name'=>'礼物管理',
        'value'=>array(
            'giftcat_volist'=>'分类列表',
            'giftcat_add'=>'添加分类',
            'giftcat_edit'=>'修改分类',
            'giftcat_del'=>'删除分类',
            
            'gift_volist'=>'礼物列表',
            'gift_add'=>'添加礼物',
            'gift_edit'=>'修改礼物',
            'gift_del'=>'删除礼物',
            
            'giftrecord_volist'=>'赠送记录',
            'giftrecord_edit'=>'编辑赠送记录',
            'giftrecord_del'=>'删除赠送记录',
        )
    );
    
    $elements[6] = array(
        'id'=>'em_7',
        'name'=>'日记管理',
        'value'=>array(
            'diarycat_volist'=>'分类列表',
            'diarycat_add'=>'添加分类',
            'diarycat_edit'=>'修改分类',
            'diarycat_del'=>'删除分类',
            
            'diary_volist'=>'日记列表',
            'diary_add'=>'添加日记',
            'diary_edit'=>'修改日记',
            'diary_del'=>'删除日记',
            
            'diarycomment_volist'=>'日记评论',
            'diarycomment_edit'=>'编辑日记评论',
            'diarycomment_del'=>'删除日记评论',
        )
    );
    
    $elements[7] = array(
        'id'=>'em_8',
        'name'=>'求助管理',
        'value'=>array(
            'askcat_volist'=>'分类列表',
            'askcat_add'=>'添加分类',
            'askcat_edit'=>'修改分类',
            'askcat_del'=>'删除分类',
            
            'ask_volist'=>'求助列表',
            'ask_add'=>'添加求助',
            'ask_edit'=>'修改求助',
            'ask_del'=>'删除求助',
            
            'answer_volist'=>'解答列表',
            'answer_edit'=>'编辑解答',
            'answer_del'=>'删除解答',
        )
    );
    
    $elements[8] = array(
        'id'=>'em_9',
        'name'=>'约会管理',
        'value'=>array(
            'datingcat_volist'=>'分类列表',
            'datingcat_add'=>'添加分类',
            'datingcat_edit'=>'修改分类',
            'datingcat_del'=>'删除分类',
            
            'dating_volist'=>'约会列表',
            'dating_add'=>'添加约会',
            'dating_edit'=>'修改约会',
            'dating_del'=>'删除约会',
            
            'datinguser_volist'=>'赴约列表',
            'datinguser_del'=>'删除赴约',
        )
    );
    
    $elements[9] = array(
        'id'=>'em_10',
        'name'=>'活动管理',
        'value'=>array(
            'party_volist'=>'活动列表',
            'party_add'=>'发布活动',
            'party_edit'=>'修改活动',
            'party_del'=>'删除活动',
            
            'partysign_volist'=>'报名列表',
            'partysign_edit'=>'修改报名',
            'partysign_del'=>'删除报名',
            
            'partycomment_volist'=>'活动评论',
            'partycomment_edit'=>'编辑评论',
            'partycomment_del'=>'删除评论',
        )
    );
    
    $elements[10] = array(
        'id'=>'em_11',
        'name'=>'成功故事',
        'value'=>array(
            'storycat_volist'=>'分类列表',
            'storycat_add'=>'添加分类',
            'storycat_edit'=>'修改分类',
            'storycat_del'=>'删除分类',
            
            'story_volist'=>'故事列表',
            'story_add'=>'添加故事',
            'story_edit'=>'修改故事',
            'story_del'=>'删除故事',
            
            'storycomment_volist'=>'祝福列表',
            'storycomment_edit'=>'编辑祝福',
            'storycomment_add'=>'删除祝福',
        )
    );
    
    $elements[11] = array(
        'id'=>'em_12',
        'name'=>'心理测试',
        'value'=>array(
            'ceshicat_volist'=>'分类列表',
            'ceshicat_add'=>'添加分类',
            'ceshicat_edit'=>'修改分类',
            'ceshicat_del'=>'删除分类',
            
            'ceshi_volist'=>'内容列表',
            'ceshi_add'=>'添加内容',
            'ceshi_edit'=>'修改内容',
            'ceshi_del'=>'删除内容',
            
            'cesubject_volist'=>'题目列表',
            'cesubject_add'=>'添加题目',
            'cesubject_edit'=>'修改题目',
            'cesubject_del'=>'删除题目',
            
            'cecomment_volist'=>'评论列表',
            'cecomment_edit'=>'编辑评论',
            'cecomment_del'=>'删除评论',
            
            'cerecord_volist'=>'测试记录',
            'cerecord_del'=>'删除测试记录',

        )
    );
    
    $elements[12] = array(
        'id'=>'em_13',
        'name'=>'微播管理',
        'value'=>array(
            'weibo_volist'=>'微播列表',
            'weibo_edit'=>'编辑微播',
            'weibo_del'=>'删除微播',
            
            'weibocomment_volist'=>'评论列表',
            'weibocomment_edit'=>'编辑评论',
            'weibocomment_del'=>'删除评论',
        )
    );
    
    $elements[13] = array(
        'id'=>'em_14',
        'name'=>'会员管理',
        'value'=>array(
            'usergroup_volist'=>'会员组列表',
            'usergroup_add'=>'添加会员组',
            'usergroup_edit'=>'编辑会员组',
            'usergroup_del'=>'删除会员组',
			
            'user_volist'=>'会员列表',
            'user_add'=>'添加会员',
            'user_edit'=>'编辑会员',
            'user_del'=>'删除会员',
            'user_vip'=>'操作会员VIP',
			'user_view'=>'查看会员',
            
            'album_volist'=>'相册列表',
            'album_add'=>'添加相册',
            'album_edit'=>'修改相册',
            'album_del'=>'删除相册',
            'album_setavatar'=>'设置形象照',
            
            'certify_volist'=>'诚信认证列表',
            'certify_edit'=>'编辑诚信认证',
            'certify_del'=>'删除诚信认证',

            'videorz_volist'=>'视频认证列表',
            'videorz_edit'=>'编辑视频认证',
            'videorz_del'=>'删除视频认证',
            
            'money_volist'=>'金额记录',
            'money_add'=>'充值',
            'points_volist'=>'积分记录',
            'points_add'=>'添加积分',
            'mbsms_volist'=>'短信记录',
            'mbsms_add'=>'添加短信',

			'paymentlog'=>'在线充值记录',
        )
    );
    
    $elements[14] = array(
        'id'=>'em_15',
        'name'=>'信件消息',
        'value'=>array(
            'hi_volist'=>'会员问候列表',
            
            'message_volist'=>'信件列表',
            'message_edit'=>'编辑信件',
            'message_del'=>'删除信件',
            
            'systemmsg_volist'=>'系统信件',
            'systemmsg_add'=>'发送系统信件',
            'systemmsg_view'=>'查看系统信件',
            'systemmsg_del'=>'删除系统信件',
        )
    );
    
    $elements[15] = array(
        'id'=>'em_16',
        'name'=>'充值卡管理',
        'value'=>array(
            'card_volist'=>'充值卡列表',
            'card_add'=>'添加充值卡',
            'card_edit'=>'编辑充值卡',
            'card_del'=>'删除充值卡',
            'card_export'=>'导出充值卡',
        )
    );
    
    $elements[16] = array(
        'id'=>'em_17',
        'name'=>'邮件营销',
        'value'=>array(
            'mailtpl_volist'=>'邮件模板列表',
            'mailtpl_add'=>'添加邮件模板',
            'mailtpl_edit'=>'编辑邮件模板',
            'mailtpl_del'=>'删除邮件模板',
            
            'mail_send'=>'发送邮件',
            'mail_content'=>'邮件内容',
            'mail_log'=>'邮件记录',
        )
    );
    
    $elements[17] = array(
        'id'=>'em_18',
        'name'=>'短信营销',
        'value'=>array(
            'smstpl_volist'=>'短信模板列表',
            'smstpl_add'=>'添加短信模板',
            'smstpl_edit'=>'编辑短息模板',
            'smstpl_del'=>'删除短信模板',
            
            'sms_send'=>'发送短信',
            'mail_content'=>'邮件内容',
            'smslog_volist'=>'短信记录列表',
            'smslog_del'=>'删除短息记录',
        )
    );
    
    $elements[18] = array(
        'id'=>'em_19',
        'name'=>'主题模板',
        'value'=>array(
            'skin_volist'=>'风格列表',
            'skin_edit'=>'设置风格',
            'skin_del'=>'删除风格',
            
            'templet_volist'=>'模板文件列表',
            'templet_edit'=>'编辑模板文件',
            'templet_del'=>'删除模板文件',
        )
    );
    
    $elements[19] = array(
        'id'=>'em_20',
        'name'=>'扩展应用',
        'value'=>array(
		    'upload'=>'上传图片',
            'log_volist'=>'系统日志',
            'log_del'=>'删除日志',
            
            'complaint'=>'举报管理',
			'complaint_edit'=>'修改举报信息',
		    'complaint_del'=>'删除举报信息',

            'promotion'=>'设置注册推广',
            'transfer'=>'设置积分转换',
            
            'netpay_volist'=>'支付方式列表',
            'netpay_add'=>'添加支付方式',
            'netpay_edit'=>'编辑支付方式',
            'netpay_del'=>'删除支付方式',
            
            'oauth_volist'=>'多平台登录',
            'oauth_edit'=>'编辑多平台登录',
            'ucenter'=>'ucenter整合设置',
            'spider'=>'数据采集设置',
            'webim'=>'webim在线聊天设置',

            'plugin_volist'=>'插件列表',
            'plugin_active'=>'激活插件',
            'plugin_inactive'=>'禁用插件',
            'plugin_del'=>'删除插件',
        )
    );
    
    return $elements;

}

/**
 * 获取所有权限
 * @return 一维数组
*/ 
function roll_get_em_array() {
	$emarray = array();
	$em_list = roll_elements();
	foreach ($em_list as $key=>$value) {
		if (!empty($emarray)) {
			$emarray = array_merge($emarray, $value['value']);
		}
		else {
			$emarray = $value['value'];
		}
	}
	return $emarray;
}
?>