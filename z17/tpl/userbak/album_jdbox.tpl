<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<div class="artbox-content">
  <!--{if $a == 'edit'}-->
  <div class="nav-tips">温馨提示：打勾(√)表示正常，打叉(X)表示待审核或者锁定。</div>
  <form action="<!--{$ucfile}-->?c=album" method="post" name="myform" id="myform" >
  <input type="hidden" name="a" id="a" value="saveedit" />
  <input type="hidden" name="id" id="id" value="<!--{$id}-->" />
  <input type="hidden" name="halttype" id="halttype" value="<!--{$halttype}-->" />
  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh25">
    <tr>
	  <td width="20%" valign="top">
	  <a href="<!--{$album.uploadfiles}-->" target="_blank"><img src="<!--{$album.thumbfiles}-->" /></a>
	  </td>
	  <td width="80%" valign="top">
		<table cellpadding='0' cellspacing='0' border='0' width="95%" class="lh30" style="margin-left:10px;">
	      <!-- 状态 -->
		  <tr>
		    <td width="25%" class="lblock">审核状态：</td>
		    <td class="rblock">
			  <!--{if $album.flag==1}-->
			  <img src="<!--{$ucpath}-->images/ok.gif" /> <font color="green">正常</font>
			  <!--{else}-->
			  <img src="<!--{$ucpath}-->images/cuo.gif" /> <font color="#999999">锁定</font>
			  <!--{/if}-->
		    </td>
		  </tr>
          <!-- 上传时间 -->
		  <tr>
		    <td class="lblock">上传时间：</td>
		    <td class="rblock"><!--{$album.timeline|date_format:"%Y-%m-%d %H:%M:%S"}--></td>
		  </tr>
          <!-- 浏览次数 -->
		  <tr>
		    <td class="lblock">浏览次数：</td>
		    <td class="rblock"><!--{$album.hits}--></td>
		  </tr>
          <!-- 描述 -->
		  <tr>
		    <td class="lblock">照片描述：</td>
		    <td class="rblock"><input type="text" name="title" id="title" value="<!--{$album.title}-->" class="input-txt" /></td>
		  </tr>
		  <tr>
		    <td height="40"></td>
		    <td class="lblock"><input type="submit" name="btn_save" value="提交保存" class="button-qing" /></td>
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
  </form>
  <!--{/if}-->
</div>
</body>
</html>
