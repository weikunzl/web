/**
	[OElove v3.x] (C)2010-2012 OEdev.Net Inc.
	This is NOT a freeware, use is subject to license terms
	$Id: imbox.js For artDialog 2012-06-20 OEdev $
*/

/**
 * 初始化Notice
*/
artDialog.notice = function (options) {
    var opt = options || {},
        api, aConfig, hide, wrap, top,
        duration = 800;
        
    var config = {
        id: 'Notice',
        left: '100%',
        top: '100%',
        fixed: true,
        drag: false,
        resize: false,
        follow: null,
        lock: false,
        init: function(here){
            api = this;
            aConfig = api.config;
            wrap = api.DOM.wrap;
            top = parseInt(wrap[0].style.top);
            hide = top + wrap[0].offsetHeight;
            
            wrap.css('top', hide + 'px')
                .animate({top: top + 'px'}, duration, function () {
                    opt.init && opt.init.call(api, here);
                });
        },
        close: function(here){
            wrap.animate({top: hide + 'px'}, duration, function () {
                opt.close && opt.close.call(this, here);
                aConfig.close = $.noop;
                api.close();
            });
            
            return false;
        }
    };	
    
    for (var i in opt) {
        if (config[i] === undefined) config[i] = opt[i];
    };
    
    return artDialog(config);
};


/**
 * ajax_imbox
*/
function roll_ajax_imbox() {
	$.ajax({
		type: "POST",
		url: _ROOT_PATH + 'index.php?c=ajax&a=imbox',
		cache: false,
		data: {r: get_rndnum(8)},
		dataType: 'json',
		beforeSend: function(XMLHttpRequest) {
			XMLHttpRequest.setRequestHeader('request_type', 'ajax');
		},
		success: function(data) {
			var json = eval(data);
			var msg = json.msg;
			if (msg != '') {
				eject_imbox(msg);
			}
		},
		error: function() {

		}
	});
}

/**
 * loop_ajax_imbox
 * @param:: int $timer 毫秒
*/
function loop_ajax_imbox(timer) {
	$.ajax({
		type: "POST",
		url: _ROOT_PATH + 'index.php?c=ajax&a=imbox',
		cache: false,
		data: {r: get_rndnum(8)},
		dataType: 'json',
		beforeSend: function(XMLHttpRequest) {
			XMLHttpRequest.setRequestHeader('request_type', 'ajax');
		},
		success: function(data) {
			var json = eval(data);
			var msg = json.msg;
			if (msg != '') {
				eject_imbox(msg);
			}
		},
		error: function() {

		}
	});
	setTimeout("loop_ajax_imbox()", timer);
}


/**
 * roll imbox
*/
function roll_imbox() {
	roll_ajax_imbox();
}

/**
 * loop imbox
 * @param:: int $looptimer
*/
function loop_imbox(looptimer) {
	if (typeof(looptimer) == 'undefined') {looptimer = 60;}
	looptimer = looptimer*1000; //毫秒
	loop_ajax_imbox(looptimer);
}

/**
 * 弹出消息框
 * @param:: string content 内容
 * @param:: title,width,holdtimer 外面定义
 * @return:: string
*/
function eject_imbox(content) {
	//标题
	if (typeof(imbox_title) == 'undefined') {imbox_title = '消息提醒';}
	//宽度
	if (typeof(imbox_width) == 'undefined') {imbox_width = 230;}
	//保持时长 秒
	if (typeof(imbox_holdtimer) == 'undefined') {imbox_holdtimer = 10;}
	//高度自动伸缩
	/*if (typeof(imbox_height) == 'undefined') {imbox_height = 210;}*/
	if (content.length>0) {
		art.dialog.notice({
			title: imbox_title,
			width: imbox_width,
			content: content,
			icon: 'face-smile',
			time: imbox_holdtimer
		});
	}
}
