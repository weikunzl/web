<!--{include file="<!--{$uctplpath}-->block_head.tpl"}-->
<!--{include file="<!--{$uctplpath}-->block_top.tpl"}-->
<!--{assign var="cp_menuid" value="message"}-->
<div class="user_main">
  <!--{include file="<!--{$uctplpath}-->block_menu.tpl"}-->

  <div class="main_right">
    <div class="div_">个人中心 &gt;&gt; 我的信件</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="<!--{$ucfile}-->?c=message">会员来信</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=outmsg">已发信件</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=hi">收到问候</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=hi&a=to">已发问候</a></li>
		  <li class="tab_item"><a href="<!--{$ucfile}-->?c=sysmsg">系统信件</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
	<div class="div_smallnav_content_hover">
	  
	  <!--{if $a eq 'run'}-->
	  <div class="nav-tips">
	    <div class="span">收到信件<!--{$total}-->封</div>
	    筛选排序：
	    <img src="<!--{$ucpath}-->images/tips-msg01.gif" /><a href="<!--{$ucfile}-->?c=message&type=unread">未读信件</a> &nbsp;&nbsp;&nbsp;
	    <img src="<!--{$ucpath}-->images/tips-msg02.gif" /><a href="<!--{$ucfile}-->?c=message&type=read">已读信件</a>&nbsp;&nbsp;&nbsp;
	    <br />
		每天阅读同性会员信件：<!--{if $g.msg.txviewlimit==1}--><!--{$g.msg.txviewnum}--> 封 <!--{else}--> 不限<!--{/if}-->&nbsp;&nbsp;&nbsp;
		每天阅读异性会员信件：<!--{if $g.msg.yxviewlimit==1}--><!--{$g.msg.yxviewnum}--> 封 <!--{else}--> 不限<!--{/if}--><br />
		如果没有阅读权限，需要支付&nbsp;<font color="blue"><b><!--{$g.fee.viewmsgfee}--></b></font>&nbsp;元阅读每封信件。

	  </div>
	  <form action="<!--{$ucfile}-->?c=message&type=<!--{$type}-->" method="post" name="myform" id="myform">
	  <input type="hidden" name="a" id="a" value="" />
	  <table class="table">
		<tr> 	 	 	 	
		  <td width='10%'>状态</td>
		  <td width='60%'>发信人</td>
		  <td>查看</td>
		  <td width='15%'>时间</td>
		</tr>
		<!--{if empty($message)}-->
		<tr>
		  <td colspan="4" align="center" class='hback'>对不起， 暂没有信件。</td>
		</tr>
		<!--{else}-->
		<!--{foreach $message as $volist}-->
		<tr>
		  <td>
		    <input name='id[]' type='checkbox' value='<!--{$volist.msgid}-->' onClick="checkItem(this, 'chkAll')">
			<!--{if $volist.readflag == '0'}-->
			  <img src="<!--{$ucpath}-->images/tips-msg01.gif" title="未读信件" alt="未读信件" />
			<!--{elseif $volist.readflag == '1'}-->
			   <img src="<!--{$ucpath}-->images/tips-msg02.gif" title="已读信件" alt="已读信件" />
			<!--{/if}-->
		  </td>
		  <td style="text-align:left;">
		    <table border="0" cellpadding="0" cellspacing="0" align="left" class="table-inside">
			  <tr>
			    <td width="60"><img src="<!--{$volist.avatarurl}-->" width="40" height="48" class="table-inside-img" /></td>
				<td<!--{if $volist.readflag=='0'}--> style="font-weight:bold;"<!--{/if}-->>
				  <a href="<!--{$volist.homeurl}-->" target="_blank"><!--{$volist.username}--></a><br />
					<!--{if $volist.gender==1}-->男<!--{else}-->女<!--{/if}-->&nbsp;&nbsp;<!--{$volist.age}-->岁&nbsp;&nbsp;
					<!--{hook mod='var' item='marrystatus' type='text' value=$volist.marrystatus}-->
					<!--{area type='text' value=$volist.provinceid}-->&nbsp;
					<!--{area type='text' value=$volist.cityid}-->&nbsp;
					<!--{hook mod='var' item='education' type='text' value=$volist.education}-->&nbsp;
					<!--{hook mod='var' item='salary' type='text' value=$volist.salary}-->
				</td>
			  </tr>
			</table>
		  </td>
		  <td>
		  <!--{if true === $volist.needpaystatus}-->
		  <a href='###' onclick="read_payfee('<!--{$volist.msgid}-->', '<!--{$type}-->', '<!--{$page}-->');" class="letter-button4"></a>
		  <!--{else}-->
	        <!--{if $volist.readflag=='0'}-->
			  <a href='<!--{$ucfile}-->?c=readmsg&a=read&id=<!--{$volist.msgid}-->&type=<!--{$type}-->&page=<!--{$page}-->' class="letter-button3"></a>
			<!--{else}-->
			  <a href='<!--{$ucfile}-->?c=readmsg&a=read&id=<!--{$volist.msgid}-->&type=<!--{$type}-->&page=<!--{$page}-->' class="letter-button6"></a>
			<!--{/if}-->
		  <!--{/if}-->
		  </td>
		  <td style="text-align:left;<!--{if $volist.readflag=='0'}-->font-weight:bold;<!--{/if}-->"><!--{$volist.sendtime|date_format:"%Y/%m/%d %H:%M"}--></td>
		</tr>
		<!--{/foreach}-->
		<tr>
		  <td style="border-bottom:0px;"><input name='chkAll' type='checkbox' id='chkAll' onClick="checkAll(this, 'id[]')" value='checkbox' />全选</td>
		  <td style="text-align:left;border-bottom:0px;" colspan="4">
		    <input type="submit" name="btn_delete" id="btn_delete" value="删除选定" onClick="{if(confirm('确定要删除吗？')){$('#a').val('del');$('#myform').submit();return true;}return false;}" class="button-red" style="cursor:pointer;" />
		  </td>
		</tr>
		<!--{/if}-->
	  </table>
	  </form>

	  <!--{if $showpage!=""}-->
	  <div class="page_digg" style="margin-top:15px"><!--{$showpage}--></div>
	  <!--{/if}-->
	  <!--{/if}-->

	</div>
	<div class="clear"></div>
	<!--//div_smallnav_content_hover End-->
  </div>
  <div class="clear"></div>
  <!--//main_right End-->
  
  <div class="right_kj" id="kj_box">
    <ul>
      <li><a href="<!--{$ucfile}-->?c=message">会员来信</a></li>
      <li><a href="<!--{$ucfile}-->?c=outmsg">已发信件</a></li>
	  <li><a href="<!--{$ucfile}-->?c=hi">收到问候</a></li>
	  <li><a href="<!--{$ucfile}-->?c=hi&a=to">已发问候</a></li>
	  <li><a href="<!--{$ucfile}-->?c=sysmsg">系统信件</a></li>
    </ul>
  </div>
  <div style="margin: 30px;"></div>
  <!--//right_kj End-->
  
</div>
<!--//user_main End-->

<!--{include file="<!--{$uctplpath}-->block_footer.tpl"}-->
</body>
</html>
<script type="text/javascript">
//支付阅读
function read_payfee(id, type, page) {
	var umoney = <!--{$u.money}-->;
	var syspafee = <!--{$g.fee.viewmsgfee}-->;
	if (syspafee <= 0) {
		syspafee = 1;
	}
	if (parseFloat(umoney) < parseFloat(syspafee)) {
		$.dialog.tips("对不起，你的余额不足，不能看这封信，请先充值。", 3);
		return false;
	}
	else {
		$.dialog({
			lock:true,
			title: '温馨提示',
			content: '确定使用'+syspafee+'元阅读这封信件吗？', 
			icon: 'warning',
			button: [
				{
					name: '确定',
					callback: function () {
						if (id > 0) {
							$.ajax({
								type: "POST",
								url: _ROOT_PATH + "usercp.php?c=message",
								cache: false,
								data: {a: "readpay", id: id, r:get_rndnum(8)},
								dataType: "json",
								beforeSend: function(XMLHttpRequest) {
									XMLHttpRequest.setRequestHeader("request_type", "ajax");
								},
								success: function(data) {
									var json = eval(data);
									var response = json.response;
									var msg = json.msg;
									if (response == '1') {
										//跳转到阅读页面
										window.location.href="<!--{$ucfile}-->?c=readmsg&a=read&id="+id+"&type="+type+"&page="+page+"";
									}
									else {
										//邮票失败
										if (msg.length>0) {
											$.dialog.tips(msg, 3);
										}
										else {
											$.dialog.tips("对不起，支付失败", 3);
										}
									}
								},
								error: function() {}
							});
						}

					}
				}, 
				{
					name: '取消'
				}
			]
		});
	}
}
</script>