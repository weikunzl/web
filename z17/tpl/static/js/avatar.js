/**
	[OElove v3.x] (C)2010-2012 OEdev.Net Inc.
	This is NOT a freeware, use is subject to license terms
	$Id: avatar.js 2012-06-18 OEdev $
*/
/**
 * 载入FLASH截图
 * @param: string pic_id 生成的新图片名
 * @param: string pic_path 原图片地址(相对路径)
 * @param: int call_type 调用类型
 * @param: int user_id 所属会员ID
 * @param: string jsonid
 * @return: string
*/
function buildAvatar(pic_id, pic_path, call_type, user_id, json_id){
	if(typeof(json_id) == 'undefined'){json_id = 'avatar_editor';}
	var requesturl = document.URL;
	var filename = requesturl.split("&")[0];
	//FLASH
	var avatar_editorflapath = _ROOT_PATH + 'tpl/static/images/photograph.swf';
	//保存地址
	if(call_type == 'admin') {
		var avatar_saveurl = filename + '&a=saveavatar&userid='+user_id;
	}
	else {
		var avatar_saveurl = filename + '&a=saveavatar';
	}
	var dig = get_rndnum(8);
	var content = '<embed height="464" width="514"';
	content += 'flashvars="type=photo';
	content += '&photoUrl='+encodeURIComponent(pic_path);
	content += '&photoId='+pic_id;
	content += '&saveUrl='+encodeURIComponent(avatar_saveurl)+'&k='+dig;
	content += ' pluginspage="http://www.macromedia.com/go/getflashplayer"';
	content += ' type="application/x-shockwave-flash"';
	content += ' allowscriptaccess="always" quality="high" src="'+avatar_editorflapath+'"/>';
	$('#'+json_id).html(content);
}

/**
 * 获取扩展名
 * @return: string
*/
function getExt(path) {
	return path.lastIndexOf('.') == -1 ? '' : path.substr(path.lastIndexOf('.') + 1, path.length).toLowerCase();
}


