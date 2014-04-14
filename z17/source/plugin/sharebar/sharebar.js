$(function() {
		   function getParamsOfShareWindow(width, height) {
		//分享条
		return ['toolbar=0,status=0,resizable=1,width=' + width + ',height=' + height + ',left=', (screen.width - width) / 2, ',top=', (screen.height - height) / 2].join('');
	}

	function bindShareList() {
		var link = encodeURIComponent(document.location);
		// 文章链接
		var title = encodeURIComponent(document.title.substring(0, 76));
		// 文章标题
		var source = encodeURIComponent(share_site_name);
		// 网站名称
		var windowName = 'share';
		// 子窗口别称
		var site = share_site_url;
		// 网站链接

		jQuery('.twitter').click(function() {
			var url = 'http://twitter.com/home?url=' + link + '&text=' + title;
			var params = getParamsOfShareWindow(500, 375);
			window.open(url, windowName, params);
		});

		jQuery('.renren').click(function() {
			var url = 'http://share.renren.com/share/buttonshare?link=' + link + '&title=' + title;
			var params = getParamsOfShareWindow(626, 436);
			window.open(url, windowName, params);
		});

		jQuery('.sina').click(function() {
			var url = 'http://v.t.sina.com.cn/share/share.php?url=' + link + '&title=' + title;
			var params = getParamsOfShareWindow(607, 523);
			window.open(url, windowName, params);
		});

		jQuery('.t_qq').click(function() {
			var url = 'http://v.t.qq.com/share/share.php?title=' + title + '&source=' + source + '&url=' + link;
			var params = getParamsOfShareWindow(642, 468);
			window.open(url, windowName, params);
		});

		jQuery('.qzone').click(function() {
			var url = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title=' + title + '&url=' + link + '&site=' + site;
			var params = getParamsOfShareWindow(634, 668);
			window.open(url, windowName, params);
		});
	}
	bindShareList();
		   })