<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>第二步 设置内心独白</h1>
      </div>
      <form method="post" action="<!--{$urlpath}-->index.php?c=passport&a=savemonolog" name="reg_form" id="reg_form" />
        <div class="form_box">

          <div class="form_li">
            <label>
			内心独白 (<!--{$config.molminlen}--> ~ <!--{$config.molmaxlen}-->个字) <br />
			可以是一篇日记，一段歌词，一句座右铭，一个有趣的签名档……(<a id="auto_gen" href="javascript:void(0)">自动生成一个)</a>
			</label>
			<textarea name='content' id='content' style='width:85%;height:150px;overflow:auto;line-height:23px;' onkeydown="count_char('content', 'counter');" onkeyup="count_char('content', 'counter');"><!--{$monolog}--></textarea>

			<br />
			<font color='#999999'>(限<!--{$config.molminlen}--> ~ <!--{$config.molmaxlen}-->个字，目前已输入<span id="counter"><!--{$monolog_len}--></span>字)</font>

          </div>
          
          <div class="form_li">
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' onclick="return checkreg();"> <button class="button_register">下一步</button> </a>
              <label>&nbsp;&nbsp;&nbsp;<a href="<!--{$urlpath}-->index.php?c=passport&a=setcontact">跳过，以后再写</a> </label>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="right"> 
	  <a class="login" href="<!--{$urlpath}-->index.php?c=passport&a=login">已有帐号？ 点此登录&gt;&gt;</a>
      <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->passport_tips.tpl"}-->
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->

<script language='javascript'>
function checkreg(){
	var t = '';
	var v = '';

	t = 'content';
	v = $('#'+t).val();
	if (v == '') {
		alert('内心独白不能为空');
		$('#'+t).focus();
		return false;
	}
	else {
		if (strQuantity(v)<<!--{$config.molminlen}--> || strQuantity(v)><!--{$config.molmaxlen}-->) {
			alert('内心独白字数必须在<!--{$config.molminlen}-->~<!--{$config.molmaxlen}-->个字之间');
			$('#'+t).focus();
			return false;
		}
	}

	$('#reg_form').submit();
	return true;
}

$('#auto_gen').click(function(){
	$.ajax({
		type: "GET",
		url: _ROOT_PATH + "index.php?c=passport&a=getmonolog",
		cache: false,
		success: function(data) {
			if(data==''){
				alert('获取失败，请重试！');
			}else{
				$('#content').text(data);
			}
		},
		error: function() {
			alert('获取失败，请重试！');
		}
	});
});
</script>
</body>
</html>