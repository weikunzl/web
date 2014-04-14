/**
	[OElove v3.x] (C)2010-2012 OEdev.Net Inc.
	This is NOT a freeware, use is subject to license terms
	$Id: usercp.js 2012-06-20 OEdev $
*/

/**
 * 快速回复信件
 * @param:: tinyint $type 类型
 * @param:: string $content 输入框ID
 * @return:: string
*/
function fast_replymsg(type, content) {
	if (typeof(content) == 'undefined') {content = 'content'}
	if (type == '1') {
		$('#'+content).val('感谢您的来信！很高兴能和您相识。');
	}
	else if (type == '2') {
		$('#'+content).val('非常感谢你的来信，很遗憾，我们的条件不太匹配，愿早日寻找到幸福。');
	}
	else if (type == '3') {
		$('#'+content).val('让我们保持联系吧，希望我是那个你一直在寻找的人。');
	}
	else {
		$('#'+content).val('谢谢来信，可以介绍一些你的基本情况吗？如家庭、工作等等。');
	}
}

