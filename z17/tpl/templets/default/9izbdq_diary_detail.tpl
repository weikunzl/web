<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_headinc.tpl"}-->
<body>
<!--{assign var='menuid' value='diary'}-->
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_menu.tpl"}-->
<div id="page-index" class="page">
  <div class="ce member">
    
	<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_search.tpl"}-->

    <div class="left ri">
      <div class="search_sort">
        <div id="rank" class="search_sle">你的位置：<a href="<!--{$appfile}-->">首页</a> &gt;&gt; <a href="<!--{$appfile}-->?c=diary">心情日记</a> &gt;&gt; 正文 </div>
      </div>
      <div class="content">
        <h1><!--{$diary.title}--></h1>
        <div class="jian">天气：<!--{hook mod='var' item='weather' type='text' value=$diary.weather}-->&nbsp;&nbsp;心情：<!--{hook mod='var' item='feel' type='text' value=$diary.feel}-->&nbsp;&nbsp;发表时间：<!--{$diary.timeline|date_format:"%m-%d %H:%M"}-->  人气：<font id='json_hits'></font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#content">我要评论</a></div>
        <div class="real">

	      <div class="topj"> <a href="<!--{$diary.homeurl}-->" class="topimg"><!--{$diary.useravatar}--></a> 发表人：<!--{$diary.levelimg}--><a href="<!--{$diary.homeurl}-->"><!--{$diary.username}--></a><br>
            <span><!--{$diary.age}-->岁 <!--{area type='text' value=$diary.provinceid}--> <!--{area type='text' value=$diary.cityid}--> <!--{$diary.height}-->CM <!--{hook mod='var' item='education' type='text' value=$diary.education}--> <!--{hook mod='var' item='salary' type='text' value=$diary.salary}--></span><br>
			<!--{if $diary.molstatus == 1}-->
            <label class="db">
			<!--{$diary.monolog|filterhtml:80}--> 
			</label>
			<!--{/if}-->
			<a href="###" class="sg" onclick="artbox_writemsg('<!--{$diary.userid}-->');"><img src="<!--{$skinpath}-->themes/images/f.gif"></a>
			<a href="###" class="sg" onclick="artbox_hi('<!--{$diary.userid}-->');"><img src="<!--{$skinpath}-->themes/images/zh.gif"></a>
			<a href="###" class="sg" onclick="artbox_sendgift('<!--{$diary.userid}-->');"><img src="<!--{$skinpath}-->themes/images/sl.gif"></a>
		  </div>
		  <!--{$diary.content|nl2br}-->
		  <br />
		  <!--{assign var='pluginaction' value=XHook::doAction('content_share')}-->
        </div>

        <div class="comments">
          <ul>
			<!--{foreach $comment as $volist}-->
            <li> 
			  <a href="<!--{$volist.homeurl}-->" class="head" target='_blank'><!--{avatar width='50' height='61' value=$volist.avatarurl}--></a><span><a href="<!--{$volist.homeurl}-->" target="_blank"><b><!--{$volist.username}--></b></a> 说：</span>
			  <!--{$volist.content|nl2br}-->
			  <div class="jilou">
			    <span>评论于：<!--{$volist.timeline|date_format:"%m-%d %H:%M"}--></span>  <label><!--{$volist.ordersi}-->楼</label>
			  </div>
              <div style="clear:both"></div>
            </li>
			<!--{/foreach}-->
            <div style="clear:both"></div>
          </ul>

		  <!--{if !empty($showpage)}-->
			<div class="pagecode">
			<!--{$showpage}-->
			</div>
			<div style="clear:both;"></div>
		  <!--{/if}-->

          <h2 style="margin-top:5px;">发表评论：</h2>
		  <input type='hidden' name='id' id='id' value="<!--{$id}-->" />
		  <table width="100%" border="0" cellspacing="5" cellpadding="5" style="line-height:25px;">
		    <tr>
			  <td><textarea style="width:98.6%;height:90px;" class='comment_textarea' id="content" name="content"></textarea></td>
			</tr>
			<!--{if $config.commentcode == '1'}-->
			<tr>
			  <td>验证码：
			  <input type="text" id="checkcode" name="checkcode" class="checkcode"  maxlength='6' /> <img id="checkCodeImg" src="<!--{$urlpath}-->source/include/imagecode.php?act=verifycode" align="middle" /> <a href="javascript:refresh_code('checkCodeImg');"> 换一张</a>
			  </td>
			</tr>
			<!--{/if}-->
			<tr>
			  <td>
			  <!--{if $login.status==1}-->
			  欢迎您：<!--{$login.username}-->&nbsp;&nbsp;&nbsp;
			  <a class="btn_b3 btn" name='btn_roll' id='btn_roll'><span>提交评论</span></a>
			  <!--{else}-->
			  只有登录会员才可以进行评论! <a href="###" onclick="artbox_loginbox();">登录</a> 或者 <a href="<!--{$appfile}-->?c=passport&a=reg">免费注册</a>
			  <!--{/if}-->
			  </td>
			</tr>
		  </table>

          
        </div>
      </div>
    </div>
    <div class="right yue1">
      <h2>热门日记</h2>
      <ul class="list_blog">
	    <!--{assign var='hotdiary' value=vo_list("mod={diary} orderby={v.hits DESC} num={12}")}-->
		<!--{foreach $hotdiary as $volist}-->
        <li><a href="<!--{$volist.url}-->" title="<!--{$volist.title}-->"><!--{$volist.title|filterhtml:20}--></a> </li>
		<!--{/foreach}-->
      </ul>
      <h2 style="margin-top:10px;">猜你喜欢</h2>
	  <!--{include file="<!--{$tplpath}--><!--{$tplpre}-->user_80x96.tpl"}-->
      <div style="clear:both;"></div>
    </div>
   

   <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<!--{include file="<!--{$tplpath}--><!--{$tplpre}-->block_footer.tpl"}-->
</body>
</html>
<script type='text/javascript'>
$(function(){
	$('#btn_roll').click(function(){
		var id = $('#id').val();
		var content = $('#content').val();
		var checkcode = '';

		if (id == '') {
			alert('ID错误！');
			return false;
		}
		if (content == '') {
			alert('评论内容不能为空！');
			$('#content').focus();
			return false;
		}
		<!--{if $config.commentcode == '1'}-->
		checkcode = $('#checkcode').val();
		if (checkcode == '') {
			alert('请填写验证码！');
			$('#checkcode').focus();
			return false;
		}
		<!--{/if}-->

		roll_diarycomment(id, content, checkcode);
	});

	update_hits('<!--{$id}-->', 'diary', 'json_hits');
});
</script>