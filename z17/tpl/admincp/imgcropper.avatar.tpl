<table width="600px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="300px">
	  <div id="bgDiv">
        <div id="dragDiv">
          <div id="rRightDown"> </div>
          <div id="rLeftDown"> </div>
          <div id="rRightUp"> </div>
          <div id="rLeftUp"> </div>
          <div id="rRight"> </div>
          <div id="rLeft"> </div>
          <div id="rUp"> </div>
          <div id="rDown"></div>
        </div>
      </div>
	  <br />
	</td>
    <td align="center" width="300px" valign="top">
	  <table width="90%" border="0" cellspacing="0" cellpadding="0" class="dragTable" style="margin-left:5px;">
	    <tr>
		  <td><div id="viewDiv" style="width:<!--{$config.avatarwidth}-->px; height:<!--{$config.avatarheight}-->px;"></div></td>
		</tr>
		<tr>
		  <td><b>效果预览</b></td>
		</tr>
		<tr>
		  <td><font color="#999999">形象照大小为<!--{$config.avatarwidth}-->x<!--{$config.avatarheight}-->像素</font></td>
		</tr>
		<tr>
		  <td align="center">
			<input type="button" name='btn_save' value="裁剪保存" onclick="cutImage();" />
		  </td>
		</tr>
	  </table>
	</td>
  </tr>
</table>
<script>
var ic = new ImgCropper("bgDiv", "dragDiv", "<!--{$album.uploadfiles}-->", {
	Width: 300, Height: 368, Color: "#ffffff",
	Resize: true,
	Scale: true,
	Opacity: 80,
	Right: "rRight", Left: "rLeft", Up:	"rUp", Down: "rDown",
	RightDown: "rRightDown", LeftDown: "rLeftDown", RightUp: "rRightUp", LeftUp: "rLeftUp",
	Preview: "viewDiv", viewWidth: <!--{$config.avatarwidth}-->, viewHeight: <!--{$config.avatarheight}-->
})
function cutImage() {
	var p = ic.Url;
	var o = ic.GetPos();
	var x = o.Left;
	var y = o.Top;
	var w = o.Width;
	var h = o.Height;
	var pw = ic._layBase.width;
	var ph = ic._layBase.height;
	cpSetAvatar('<!--{$album.uploadfiles}-->', x, y, w, h, pw, ph, <!--{$album.userid}-->);
}
</script>
