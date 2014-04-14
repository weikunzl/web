/**
	[OElove v3.x] (C)2010-2012 OEdev.Net Inc.
	This is NOT a freeware, use is subject to license terms
	$Id: art.js 2012-08-20 OEdev $
*/

/**
 * 警告
 * @param {String}消息内容
*/
artDialog.alert = function (content) {
    return artDialog({
        id: 'Alert',
        icon: 'warning',
        fixed: true,
        lock: true,
        content: content,
        ok: true
    });
};

