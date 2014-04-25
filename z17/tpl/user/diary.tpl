<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{assign var="menuid" value="diary"}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<style>
.diary_item{margin-top:10px;margin-bottom:20px; position: relative;}
.diary_item .item_left{background:#f0f0f0;border:0px dashed #ccc; border-right:0px; padding:16px; float:left;}
.diary_item .item_right{border:0px dashed #ccc; border-left:0px; padding-left:10px; float:left; line-height:24px; width:669px;}
.item_right m{color:gray; margin-right:10px;}
.diary_gn{top: -12px; right: 10px;padding: 10px;position: absolute; display:none;}
.diary_gn a{color:#3e8ac0;}
.diary_content{line-height:20px; color:gray; margin-top:3px;}

.write_diary_time{border-bottom:1px solid #e1e1e1; padding:10px 0px;}
.write_diary_time a{border:1px solid #e1e1e1; background:#e1e1e1; padding:3px 10px; float:left; line-height:20px; margin-bottom:10px;}
.my_weather{position: absolute; border:1px solid #e1e1e1; background:#FFF; padding:0px 10px; top:40px; display:none;}
.my_mood{position: absolute; border:1px solid #e1e1e1; background:#FFF; padding:0px 10px; display:none;}
.sub_w_cl li{float:left; margin-left:10px; margin-right:0px; border:1px solid #ccc; padding:3px; 0px; width:80px; line-height:20px; cursor:pointer; text-align:center;}
.sub_m_cl li{float:left; margin-left:10px; margin-right:0px; border:1px solid #ccc; padding:3px; 10px; line-height:20px; cursor:pointer;}
</style>
<script type="text/javascript">
	$(function () {
		$(".item_right").bind({
			mouseover: function () {
				$("#" + $(this).attr("id") + "_cz").show();
			},
			mouseout: function () {
				$("#" + $(this).attr("id") + "_cz").hide();
			}
		});
	});
</script>
<div class="user_main">
  <div class="main_right">
    <div class="div_"> 个人中心 &gt;&gt; 我的日记</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<!--{if $a == 'run'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=diary">我的日记</a></li>
		  <li class="tab_item<!--{if $a == 'add'}--> current<!--{/if}-->"><a href="<!--{$ucfile}-->?c=diary&a=add">发表日记</a></li>
		  <li class="tab_item<!--{if $a == 'edit'}--> current<!--{/if}-->">编辑日记</li>
		</ul>
	  </div>
    </div>
	<!--TAB END-->
	
	<!--{if $a == 'run'}-->
    <div class="div_smallnav_content_hover">
	  <!--{if empty($diary)}-->
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
	    <tr>
		  <td align="center">对不起，你还没写日记。</td>
		</tr>
	  </table>
	  <!--{else}-->
	  <!--{foreach $diary as $volist}-->
      <div class="diary_item">
        <div class="item_left">
		<!--{if $volist.diaryopen=='1'}-->
		<img src="<!--{$ucpath}-->images/unlock.png" title="公开" toc="unlock" />
		<!--{else}-->
		<img src="<!--{$ucpath}-->images/lock.png" title="仅自己查看" toc="lock" />
		<!--{/if}-->
		</div>
        <div class="item_right" id="mydiary_<!--{$volist.diaryid}-->">
          <m>[<!--{$volist.catname}-->]</m>
          <strong><!--{$volist.title}--></strong>&nbsp;&nbsp;&nbsp;&nbsp;<span class="cc"><!--{$volist.timeline|date_format:"%Y-%m-%d %H:%M"}--></span>&nbsp;&nbsp;&nbsp;
		  (
		  <!--{if $volist.flag=='1'}-->
		  <font color='green'>已通过</font>
		  <!--{else}-->
		  <font color='red'>待审核/锁定</font>
		  <!--{/if}-->
		  )
		  
          <div class="diary_content"><!--{$volist.content|filterhtml:100}-->...</div>
          <div class="diary_gn" id="mydiary_<!--{$volist.diaryid}-->_cz">浏览(<!--{$volist.hits}-->)&nbsp;&nbsp;&nbsp;评论(<!--{$volist.commentcount}-->)&nbsp;&nbsp;&nbsp;<a href="<!--{$ucfile}-->?c=diary&a=edit&id=<!--{$volist.diaryid}-->&page=<!--{$page}-->">编辑</a>&nbsp;&nbsp;&nbsp;<a href="###" onclick="diary_del('<!--{$volist.diaryid}-->');">删除</a></div>
        </div>
        <div class="clear"></div>
      </div>
	  <!--{/foreach}-->
	  <!--{/if}-->

    </div>
	<!--{if $showpage!=""}-->
	<div class="page_digg" style="margin-top:15px"><!--{$showpage}--></div>
	<div class="clear"></div>
	<!--{/if}-->
	<!--{/if}-->
	

	<!--{if $a == 'add'}-->
    <div class="div_smallnav_content_hover">
	  <form name="myform" id="myform" action="<!--{$ucfile}-->?c=diary" method="post">
	  <input type="hidden" name="a" id="a" value="saveadd" />
      <div style="background:#FEFCE7; padding:5px;margin-top:10px;margin-bottom:10px;"> 
	    日记分类：
        <!--{hook mod='diarycategory' type='select' name='catid' text='=请选择='}-->
        &nbsp;&nbsp;&nbsp;
		阅读权限：
        <select name="diaryopen" id="diaryopen">
          <option value="1">公开</option>
          <option value="0">仅自己看</option>
        </select>
	    &nbsp;&nbsp;&nbsp;
		天气：<!--{hook mod='var' item='weather' name='weather' type='select' text=''}-->
		&nbsp;&nbsp;&nbsp;
		心情：<!--{hook mod='var' item='feel' name='feel' type='select' text=''}-->
      </div>
      <div style="background:url(<!--{$ucpath}-->images/81177_bg.jpg); text-align:center;">
        <input type="text" style="width:90%;font-size:24px; background-color: transparent; border:0px; margin-top:30px; text-align:center;font-family: 微软雅黑; box-shadow: 0px 0px 0px #F0F0F0;" name="title" id="title" value="请在这里输入日记标题" onclick="del_title();" onblur="attr_title();" />
        <div style="margin:20px 10px 10px 10px; padding-top:20px; border-top:1px dashed Gray;">
          <textarea rows="1" tabindex="1" style="width:100%; height:500px; font-size:13px; background-color: transparent; border:0px; margin-top:20px; font-family: 微软雅黑; line-height:25px; overflow:auto;" name="content" id="content" onclick="del_content();" onblur="attr_content();">请在这里写日记...</textarea>
        </div>
      </div>
      <div style="margin-top:10px;">
        <input type="button" name="btn_save" id="btn_save" value="发表日记" class="button-red" />&nbsp;&nbsp;
		<input type="button" name="btn_return" id="btn_return" value="返回列表" onclick="javascript:window.location.href='<!--{$urlpath}-->usercp.php?c=diary';" class="button-coff" />
      </div>
      <div class="clear"> </div>
	  </form>
    </div>
	<!--{/if}-->

	<!--{if $a == 'edit'}-->
    <div class="div_smallnav_content_hover">
	  <form name="myform" id="myform" action="<!--{$ucfile}-->?c=diary&<!--{$comeurl}-->" method="post">
	  <input type="hidden" name="a" id="a" value="saveedit" />
	  <input type="hidden" name="id" id="id" value="<!--{$id}-->" />
      <div style="background:#FEFCE7; padding:5px;margin-top:10px;margin-bottom:10px;"> 
	    日记分类：
        <!--{hook mod='diarycategory' name='catid' type='select' text='=请选择=' value=$diary.catid}-->
        &nbsp;&nbsp;&nbsp;
		阅读权限：
        <select name="diaryopen" id="diaryopen">
          <option value="1"<!--{if $diary.diaryopen=='1'}--> selected<!--{/if}-->>公开</option>
          <option value="0"<!--{if $diary.diaryopen=='0'}--> selected<!--{/if}-->>仅自己看</option>
        </select>
	    &nbsp;&nbsp;&nbsp;
		天气：<!--{hook mod='var' type='select' item='weather' name='weather' text='' value=$diary.weather}-->
		&nbsp;&nbsp;&nbsp;
		心情：<!--{hook mod='var' type='select' item='feel' name='feel' text='' value=$diary.feel}-->
      </div>
      <div style="background:url(<!--{$ucpath}-->images/81177_bg.jpg); text-align:center;">
        <input type="text" style="width:90%;font-size:24px; background-color: transparent; border:0px; margin-top:30px; text-align:center;font-family: 微软雅黑; box-shadow: 0px 0px 0px #F0F0F0;" name="title" id="title" value="<!--{$diary.title}-->" onclick="del_title();" onblur="attr_title();" />
        <div style="margin:20px 10px 10px 10px; padding-top:20px; border-top:1px dashed Gray;">
          <textarea rows="1" tabindex="1" style="width:100%; height:500px; font-size:13px; background-color: transparent; border:0px; margin-top:20px; font-family: 微软雅黑; line-height:25px; overflow:auto;" name="content" id="content" onclick="del_content();" onblur="attr_content();"><!--{$diary.content}--></textarea>
        </div>
      </div>
      <div style="margin-top:10px;">
        <input type="button" name="btn_save" id="btn_save" value="编辑日记" class="button-red" />&nbsp;&nbsp;
		<input type="button" name="btn_return" id="btn_return" value="返回列表" onclick="javascript:window.location.href='<!--{$urlpath}-->usercp.php?c=diary';" class="button-coff" />
      </div>
      <div class="clear"> </div>
	  </form>
    </div>
	<!--{/if}-->

  </div>
  <div class="clear"> </div>
  <!--//main_right End-->

  <div class="right_kj">
    <ul>
	  <li><a href="<!--{$ucfile}-->?c=diary">我的日记</a></li>
	  <li><a href="<!--{$ucfile}-->?c=diary&a=add">发表日记</a></li>
	</ul>
  </div>
  <div style="margin:30px;"></div>
</div>
<!--//user_main End-->
<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script type="text/javascript">
$(function(){
	//添加、编辑保存
	$("#btn_save").click(function(){
		//标题
		if ($('#catid').val() == '') {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请选择日记分类', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}
		//标题
		if ($('#title').val() == '' || $('#title').val() == '请在这里输入日记标题') {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请填写日记标题', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}
		//内容
		if ($('#content').val() == '' || $('#content').val() == '请在这里写日记...') {
			$.dialog({
				lock:true,
				title: '错误提示',
				content: '请填写日记内容', 
				icon: 'error',
				button: [ 
					{
						name: '确定'
					}
				]
			});
			return false;
		}		
		$('#myform').submit();
		return true;
	});

});


//标题
function del_title() {
	var title = $("#title").val();
	if (title == '请在这里输入日记标题') {
		$("#title").val("");
	}
}
function attr_title() {
	var title = $("#title").val();
	if (title == '') {
		$("#title").val("请在这里输入日记标题");
	}
}
//内容
function del_content() {
	var content = $("#content").val();
	if (content == '请在这里写日记...') {
		$("#content").val("");
	}
}
function attr_content() {
	var content = $("#content").val();
	if (content == '') {
		$("#content").val("请在这里写日记...");
	}
}

//删除
function diary_del(id){
	$.dialog({
		lock:true,
		title: '信息提示',
		content: '确定要删除吗？', 
		icon: 'warning',
		button: [
			{
				name: '确定',
				callback: function () {
					top.window.location = "<!--{$ucfile}-->?c=diary&a=del&id="+id;
				}
			}, 
			{
				name: '取消'
			}
		]
	});
}
</script>
