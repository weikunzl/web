(function($) {
	$.fn.validationEngineLanguage = function() {
	};
	$.validationEngineLanguage = {
		newLang : function() {
			$.validationEngineLanguage.allRules = {
				"required" : { 
					"regex" : "none",
					"alertText" : "* 非空选项.",
					"alertTextCheckboxMultiple" : "* 请选择一个单选框.",
					"alertTextCheckboxe" : "* 请选择一个复选框."
				},
				"length" : {
					"regex" : "none",
					"alertText" : "* 长度必须在 ",
					"alertText2" : " 至 ",
					"alertText3" : " 之间."
				},
				
				// bluespring添加 区间效验
				"region" : {
					"regex" : "none",
					"alertText" : "* 取值必须在 ",
					"alertText2" : " 至 ",
					"alertText3" : " 之间."
				},
				"maxCheckbox" : {
					"regex" : "none",
					"alertText" : "* 最多选择 ",
					"alertText2" : " 项."
				},
				"minCheckbox" : {
					"regex" : "none",
					"alertText" : "* 至少选择 ",
					"alertText2" : " 项."
				},
				"confirm" : {
					"regex" : "none",
					"alertText" : "* 两次输入不一致,请重新输入."
				},
				"telephone" : {
					"regex" : "/^(0[0-9]{2,3}\-)?([2-9][0-9]{6,7})+(\-[0-9]{1,4})?$/",
					"alertText" : "* 请输入有效的电话号码,如:010-29292929."
				},
				"mobilephone" : {
					"regex" : "/(^0?[1][358][0-9]{9}$)/",
					"alertText" : "* 请输入有效的手机号码."
				},
				"email" : {
					"regex" : "/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
					"alertText" : "* 请输入有效的邮件地址."
				},
				"date" : {
					"regex" : "/^(19[0-9]{2}|2[0-9]{3})-(0[1-9]|1[012])-([123]0|[012][1-9]|31)$/",
					"alertText" : "* 请输入有效的日期,如:2010-01-01."
				},
				"datetime" : {
					"regex" : "/^(19[0-9]{2}|2[0-9]{3})-(0[1-9]|1[012])-([123]0|[012][1-9]|31) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/",
					"alertText" : "* 请输入有效的日期时间,如:2010-01-01 12:12:01."
				},
				"ip" : {
					"regex" : "/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/",
					"alertText" : "* 请输入有效的IP."
				},
				"chinese" : {
					"regex" : "/^[\u4e00-\u9fa5]+$/",
					"alertText" : "* 请输入中文."
				},
				"url" : {
					"regex" : "/^[a-zA-z]:\\/\\/[^s]$/",
					"alertText" : "* 请输入有效的网址."
				},
				"zipcode" : {
					"regex" : "/^[0-9]\d{6}$/",
					"alertText" : "* 请输入有效的邮政编码."
				},
				"onlyNumber" : {
					"regex" : "/^[0-9]+$/",
					"alertText" : "* 请输入数字."
				},
				"onlyNumbers" : {
					"regex" : "/^\-?([1-9][0-9]*|0)(\.[0-9]+)?$/",
					"alertText" : "* 请输入数字."
				},
				"onlyLetter" : {
					"regex" : "/^[a-zA-Z]+$/",
					"alertText" : "* 请输入英文字母."
				},
				"noSpecialCaracters" : {
					"regex" : "/^[0-9a-zA-Z]+$/",
					"alertText" : "* 请输入英文字母和数字."
				},
				"ajaxUser" : {
					"file" : "admin_user.php?act=ajaxUser&id="+$("#admin_id").val(),
					"alertTextOk" : "* 帐号可以使用.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 帐号不能使用."
				},
				"ajaxPass" : {
					"file" : "admin_user.php?act=ajaxPass&id="+$("#admin_id").val(),
					//"extraData" : "eric", //其他的参数
					"alertTextOk" : "* 密码输入正确.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 密码不匹配."
				},
				"ajaxCompanyName" : {
					"file" : "member.php?act=ajaxCompanyName&id="+$("#member_id").val(),
					"alertTextOk" : "* 公司名可以使用.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 公司名不能使用."
				},
				"ajaxMemberUser" : {
					"file" : "member.php?act=ajaxMemberUser&id="+$("#member_id").val(),
					//"extraData":"id="+$("#member_id").val(),
					"alertTextOk" : "* 会员名可以使用.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 会员名不能使用."
				},
				"ajaxMemberPass" : {
					"file" : "member.php?act=ajaxMemberPass&id="+$("#member_id").val(),
					"alertTextOk" : "* 密码输入正确.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 密码不匹配."
				},
				"ajaxMemberPasss" : {
					"file" : "member_password_up.php?act=ajaxMemberPasss",
					"alertTextOk" : "* 密码输入正确.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 密码不匹配."
				},
				"ajaxUsers" : {
					"file" : "admincp.php?c=user&a=ajaxUser",
					"alertTextOk" : "* 此身份证可以使用.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 此身份证已被注册."
				},
				"ajaxCompany_name" : {
					"file" : "member.php?act=ajaxCompany_name",
					"alertTextOk" : "* 公司名字可以使用.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 公司名已被注册."
				},
				"ajaxUsers_en" : {
					"file" : "../member.php?act=ajaxUser",
					"alertTextOk" : "* 帐号可以使用.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 帐号已被注册."
				},
				"ajaxCompany_name_en" : {
					"file" : "../member.php?act=ajaxCompany_name",
					"alertTextOk" : "* 公司名字可以使用.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 公司名已被注册."
				},
				"ajaxMember_news_title" : {
					"file" : "member_news.php?act=ajaxtitle",
					"alertTextOk" : "* 标题可以使用.",
					"alertTextLoad" : "* 检查中, 请稍后...",
					"alertText" : "* 标题不能使用."
				},
				"points_max" : {
					"nname" : "points_max",
					"alertText" : "* 积分上限必须大于积分下限."
				}
			};
		}
	};
})(jQuery);

$(document).ready(function() {
	$.validationEngineLanguage.newLang();
});