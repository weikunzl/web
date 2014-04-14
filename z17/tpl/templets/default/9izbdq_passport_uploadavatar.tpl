<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>第四步 设置形象照</h1>
      </div>
      <form action="<!--{$appfile}-->?c=passport&a=saveupload&uploadpart=uploadpart" method="post" enctype="multipart/form-data" name="up_form" id="up_form">
        <div class="form_box">
          
          <div class="form_li s">
            <label>形象照：</label>
            <input name="uploadpart" id="uploadpart" type="file" class='w1' />&nbsp;&nbsp;&nbsp;
			
		  </div>
          <div class="form_li">
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" href='###' style="cursor:pointer;" onclick="return checkupload();"> <button class="button_register">开始上传</button> </a>
              <label>&nbsp;&nbsp;&nbsp;<a href="<!--{$urlpath}-->index.php?c=passport&a=setcond">跳过这步，以后再设置</a> </label>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="right"> 
	  <a class="login" href="<!--{$appfile}-->?c=passport&a=login">已有帐号？ 点此登录&gt;&gt;</a>
      <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->passport_tips.tpl"}-->
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>
<script type="text/javascript">
function checkupload() {
	var t = "";
	var v = "";

	t = "uploadpart";
	v = $("#"+t).val();
	if(v=="") {
		alert("请选择要上传的图片");
		return false;
	}
	
	$('#up_form').submit();
	return true;
}
</script>