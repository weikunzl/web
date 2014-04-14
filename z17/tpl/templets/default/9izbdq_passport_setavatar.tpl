<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce reg">
    <div class="left">
      <div class="reg_left_title">
        <h1>第四步 设置形象照</h1>
      </div>
        <div class="form_box" style="margin-left:65px;">

          <div class="form_li s">
		    <div class="youb">
			  <div class="yout">
			    <!--{include file="<!--{$tplpath}-->imgcropper.tpl"}-->
				<!--{include file="<!--{$tplpath}-->imgcropper.regavatar.tpl"}-->
			  </div>
			  <div class="c"></div>
			</div>
          </div>

        </div>
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