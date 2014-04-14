var emface_desc = [
                    '疑问', '色', '大哭', '发怒', '呲牙', '白眼', '憨笑', '晕', '折磨', '敲打', '擦汗', '抠鼻', '左哼哼', '鄙视', '害羞',
                    '亲亲', '可怜', '猪头', '示爱', '强', '握手', '勾引', '拥抱', '得意', '傲慢', '饥饿', '困', '惊恐', '流汗', '流泪',
                    '大兵', '奋斗', '咒骂', '冷汗', '嘘...', '发呆', '闭嘴', '衰', '骷髅', '睡', '再见', '撇嘴', '尴尬', '鼓掌', '糗大了',
                    '坏笑', '微笑', '右哼哼', '哈欠', '调皮', '委屈', '快哭了', '阴险', '惊讶', '吓', '难过', '酷', '可爱', '抓狂', '吐',
                    '偷笑', '咖啡', '饭', '菜刀', '玫瑰', '凋谢', '吻', '爱心', '心碎', '蛋糕', '闪电', '炸弹', '刀', '足球', '瓢虫',
                    '便便', '月亮', '太阳', '礼物', '西瓜', '啤酒', '弱', '篮球', '胜利', '抱拳', '乒乓', '拳头', '差劲', '爱你', 'NO',
                    'OK', '爱情', '飞吻', '跳跳', '发抖', '怄火', '转圈', '磕头', '回头', '跳绳', '挥手', '激动', '街舞', '献吻', '右太极'
                  ];

/**
 * 当前回复框位置
 */
var reply_form = 0;

/**
 * 关闭表情选择框
 */
function emface_close(){
	$("#emface_pannel").hide();
}

/**
 * 显示表情框
 * @param string $display_mood_id 显示位置
 * @param string $reply_form_id Textarea框
*/
function show_more_face(display_mood_id, reply_form_id){
	var curObj = $("#" + display_mood_id);
	var pos = curObj.offset();
	var pannel = $("#emface_pannel");
	pannel.css("left", pos.left);
	pannel.css("top", pos.top);
	if (pannel.css("display") == "none") pannel.show();
	else pannel.hide();
	reply_form = reply_form_id;
	var reply_content = $("#" + reply_form).val();
	if(reply_content=='记录每一天的心情...' || reply_content=='添加评论...')
	$("#" + reply_form).val("");
}

/**
 * 插入表情
 * @param number index 表情索引
 */
function insertFace(index) {
	/*
    var faceText = '{emf_' + index + '}';
    var contentText = $("#" + reply_form).val();
    $("#" + reply_form).focus();
    $("#" + reply_form).val(contentText + faceText);
    $("#emface_pannel").hide();
	*/
	var tag = '{emf_' + index + '}';
	var myField = document.getElementById(reply_form);
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = tag;
		myField.focus();
	}
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		var cursorPos = endPos;
		myField.value = myField.value.substring(0, startPos)
					  + tag
					  + myField.value.substring(endPos, myField.value.length);
		cursorPos += tag.length;
		myField.focus();
		myField.selectionStart = cursorPos;
		myField.selectionEnd = cursorPos;
	}
	else {
		myField.value += tag;
		myField.focus();
	}
	//$("#emface_pannel").hide();
}

var emf_flag = 0;
/**
 * 当鼠标指上时，表情对应文字提示
 * @param dom object obj
 */
function show_emface_tip(obj, index) {
    $(obj).attr("title", emface_desc[index]);
    $(obj).css("border", "1px solid #0000FF");
    // 以下控制预览框
    var p = $("#emface_preview_pannel");
    var pos = $("#emface_pannel").offset();
    var step = index % 15;
    if (step <= 3) {
        emf_flag =  (15 * 24) - 10;
    } else if (step >= 11) {
        emf_flag = 2;
    }
    pos.left += emf_flag;
    pos.top += 19;
    p.css("left", pos.left + "px");
    p.css("top", pos.top + "px");
    p.html('<img src="'+_ROOT_PATH+'tpl/static/images/face/' + index + '.gif" border="0" style="margin:24px" />');
    p.show();
}

/**
 * 当鼠标离开时，取消提示
 * @param dom object obj
 */
function close_emface_tip(obj, index) {
    $(obj).css("border", "");
    $("#emface_preview_pannel").hide();
}

/*
$("body").click(function () {
	$("#emface_pannel").hide();
});
*/