<script type="text/javascript" language="JavaScript" src="<!--{$urlpath}-->tpl/static/js/mood-eif.js" ></script>
<style>
.emface-border{
 border:1px solid #A7D2E2;
 width:436px;
 position:absolute;
 background-color:#ffffff;
 left:0px;
 top:0px;
}
.emface-bg{
 padding:5px;
 background-color:#EFF7FA;
 width:425px;
 text-align:right;
}
a.face-body, a.face-body:hover,a.face-body:visited,a.face-body:link{float:left;width:29px;height:29px;margin:0;padding:0;}

.eif-preview-pannel {
	position:absolute;left:0px;top:0px;width:85px;height:85px;border:1px solid #0000FF;
	background-color:#FFF;z-index:1002;
	display:none;
}

.eif-pannel {
	display:none;
	position:absolute;
	/*
	top:-1000px;left:-1000px;
	*/
	z-index:1000;
}
.eif-content {
	background-image:url(<!--{$ucpath}-->images/face_gif.png);
	background-repeat:no-repeat;width:438px;height:206px;overflow:hidden
}
</style>
<div id="emface_preview_pannel" class="eif-preview-pannel"></div>
<div id="emface_pannel" class="eif-pannel">
  <div class="emface-border">
	<div class="emface-bg"><a href="###" onclick="emface_close();"><img src="<!--{$ucpath}-->images/em_close.gif" border="0"/></a></div>
	<div class="clear"></div>
	<div class="eif-content">
	  <!--{for $eif_i = 0 to 104}-->
	  <a href="###" onclick="insertFace('<!--{$eif_i}-->');" onmouseover="show_emface_tip(this, '<!--{$eif_i}-->')" onmouseout="close_emface_tip(this, '<!--{$eif_i}-->')" class="face-body" ></a>
	  <!--{/for}-->
	</div>
  </div>
</div>