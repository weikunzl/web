<?php /* Smarty version Smarty-3.1.14, created on 2014-04-25 14:32:37
         compiled from "C:\svn\z17z17\web\z17\tpl\templets\default\9izbdq_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166675354cd6ebae772-81073803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c5fdb060bf27bf87f41051e0a72a3187912705d' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\templets\\default\\9izbdq_index.tpl',
      1 => 1398407539,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166675354cd6ebae772-81073803',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354cd6ee580a5_74701141',
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'login' => 0,
    'skinpath' => 0,
    'urlpath' => 0,
    'appfile' => 0,
    'ucpath' => 0,
    'user' => 0,
    'volist' => 0,
    'weibo' => 0,
    'vipuser' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354cd6ee580a5_74701141')) {function content_5354cd6ee580a5_74701141($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable('index', null, 0);?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="indexbg">
    <div class="index"> 
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      
		
        
	<?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?>
	<div class="loginwrap">
		<?php $_smarty_tpl->tpl_vars['zone'] = new Smarty_variable(get_zone('index_slide_banner'), null, 0);?>
	<div class="huar"> 
          <div class="llgo">
            <div class="login_gooo">
              <div class="login_xxxxx"> <a href="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['homeurl'];?>
" class="login_gohead" title="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['login']->value['info']['useravatar'];?>
</a>
                <div class="login_xinxi">
                  <div><?php echo $_smarty_tpl->tpl_vars['login']->value['info']['levelimg'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['login']->value['info']['username'];?>
</a></div>
                  <div>
			
			    <span>
				  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/cid<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['idnumberrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['idnumberrz']==1){?>已身份证认证<?php }else{ ?>身份证未认证<?php }?>">
				  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/video<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['videorz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['videorz']==1){?>已视频认证<?php }else{ ?>视频未认证<?php }?>">
				  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/email<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['emailrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['emailrz']==1){?>已邮箱认证<?php }else{ ?>邮箱未认证<?php }?>"> 
			    </span>
			
		  </div>
		  <div> <?php echo $_smarty_tpl->tpl_vars['login']->value['info']['star'];?>
星&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=certify">诚信认证</a></div>
                  <div><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=avatar">更新形象</a></div>
                  <div><a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=logout">退出登录</a>&nbsp;|&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=payment">充值</a></div>
                </div>
                <div class="c"></div>
              </div>
             
            </div>

	    <div class="login_right">
		<div class="login_right_top">
		<ul>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=message"><div class="newmsgbox div_red"><img src="/tpl/user/images/menu/green/562810.png"><div>新信件(<?php echo cmd_count(array('mod'=>'user','type'=>'newmessage','value'=>$_smarty_tpl->tpl_vars['login']->value['info']['userid']),$_smarty_tpl);?>
)</div></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=visitme"><div class="newmsgbox div_yellow"><img src="/tpl/user/images/menu/green/562779.png"><div>新访客(<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['hits'];?>
)</div></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=fans"><div class="newmsgbox div_purple"><img src="/tpl/user/images/menu/green/562808.png"><div>新粉丝(<?php echo cmd_count(array('mod'=>'user','type'=>'fans','value'=>$_smarty_tpl->tpl_vars['login']->value['info']['userid']),$_smarty_tpl);?>
)</div></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=listen"><div class="newmsgbox div_blue"><img src="/tpl/user/images/menu/green/562709.png"><div>我的关注</div></div></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=gift"><div class="newmsgbox div_green"><img src="/tpl/user/images/menu/green/562785.png"><div>新礼物(<?php echo cmd_count(array('mod'=>'user','type'=>'gift','value'=>$_smarty_tpl->tpl_vars['login']->value['info']['userid']),$_smarty_tpl);?>
)</div></div></a></li>
		</ul>
		</div>
		<div class="login_right_weibo">
		    <div class="fl" style="position:relative;">
			<textarea class="mood-textarea" id="mood_content" name="mood_content" onkeydown="textCounter('mood_content', 'counter', 500);" onkeyup="textCounter('mood_content', 'counter', 500);" onclick="obj_del_wbcontent('mood_content');" onblur="obj_attr_wbcontent('mood_content');">记录每一天的心情...</textarea>
			 <div id="display-eif"></div>
		    </div>
		    <div class="fr">
			  <div class="mood-post-button" onclick="obj_public_mood('mood_content');"><img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/button-mood.gif"></div>
		    </div>
		    <div class="clear"></div>
		</div>
	    </div><!--login_right -->
          </div><!--llgo -->
	  </div>
	</div>
	<?php }?>

        

    </div>
  </div>
  <div class="bigline"></div>
  <div class="index1">
    <div class="left3">
	  
	  <h2 class="hh3">
	    <label><a id="tab_label_tag_0" href="###" class="nnn" onMouseOver="tab_label('0');">最新会员</a></label>
	    <?php if ($_smarty_tpl->tpl_vars['login']->value['info']['gender']==1){?>
	    <label><a id="tab_label_tag_1" href="###" onMouseOver="tab_label('1');">推荐女会员</a></label> 
	    <?php }?>
	    <?php if ($_smarty_tpl->tpl_vars['login']->value['info']['gender']==2){?>
	    <label><a id="tab_label_tag_2" href="###" onMouseOver="tab_label('2');">推荐男会员</a></label>
	    <?php }?>
		
	    <a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user" class="more3">查看更多&gt;&gt;</a> 
	  </h2>
      <div class="left3list" style="display:block;" id="tab_label_0">
        <ul>
          <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={user} where={v.avatar='1'} num={18}"), null, 0);?> 
          <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatarurl'];?>
" width='90px' height='110px' title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
" /></a>
            
            <div class="areaf"> <span><?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
</span> <span><?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁</span> </div>
	    <div><a href="javascript:void(0);" onclick="artbox_hi(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);"><span><img width="45px" src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/d.gif"></span></a><a href="javascript:void(0);" onclick="artbox_writemsg(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);"><span><img width="45px" src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/r.gif"></span></a></div>
          </li>
          <?php } ?>
        </ul>
      </div>

      <div class="left3list" style="display:none;" id="tab_label_1">
        <ul>
          <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='2'} num={18}"), null, 0);?> 
          <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatarurl'];?>
" width='90px' height='110px' title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
" /></a>
            
            <div class="areaf"> <span><?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
</span> <span><?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁</span> </div>
	    <div><a href="javascript:void(0);" onclick="artbox_hi(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);"><span><img width="45px" src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/d.gif"></span></a><a href="javascript:void(0);" onclick="artbox_writemsg(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);"><span><img width="45px" src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/r.gif"></span></a></div>	
	  </li>
          <?php } ?>
        </ul>
      </div>

      <div class="left3list" style="display:none;" id="tab_label_2">
        <ul>
          <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='1'} num={18}"), null, 0);?> 
          <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['avatarurl'];?>
" width='90px' height='110px' title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
" /></a>
            
            <div class="areaf"> <span><?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
</span> <span><?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁</span> </div>
	    <div><a href="javascript:void(0);" onclick="artbox_hi(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);"><span><img width="45px" src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/d.gif"></span></a><a href="javascript:void(0);" onclick="artbox_writemsg(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);"><span><img width="45px" src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/r.gif"></span></a></div>
	  </li>
          <?php } ?>
        </ul>
      </div>

	<script>
	//显示隐藏
	function tab_label(tabid) {
		var taglength = 3;//$("a[id='tab_label_tag']").length;
		for (i=0; i<taglength; i++){
			if (tabid == i) {
				$('#tab_label_tag_'+i).addClass('nnn');
				$('#tab_label_'+i).show();
			}
			else {
				$('#tab_label_tag_'+i).removeClass('nnn');
				$('#tab_label_'+i).hide();
			}
		}
	}
	</script>

    </div>
    <div class="right3">
      <h2 class="righth3">心情微播</h2>
      <div class="right3ser" style="height:130px;">
	      <?php $_smarty_tpl->tpl_vars['weibo'] = new Smarty_variable(vo_list("mod={weibo} num={2}"), null, 0);?>
		  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['weibo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		  <p class="fitem fitem-i">
		  <a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</a>. <?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
岁，<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
<br />
		  <?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['content'],35);?>
...
		  </p>
	      <?php } ?>
	<div style="float:right"><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=weibo" class="more3">查看更多&gt;&gt;</a> </div>
      </div>


      <div class="paper-aside noticesec">
        <div class="titlebar">
          <div class="title3">明星会员</div>
        </div>
        <div class="noticewrap">
			<?php $_smarty_tpl->tpl_vars['vipuser'] = new Smarty_variable(vo_list("mod={listuser} type={vip} where={v.avatar='1' AND v.monolog='1'} num={1}"), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vipuser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
			<div class="head5"><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['useravatar'];?>
</a></div>
			<div class="headr5">
				<span class="headr5_2"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>
<br>
				<?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
 岁　<br>
				<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
 <br>
				<?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'education','value'=>$_smarty_tpl->tpl_vars['volist']->value['education']),$_smarty_tpl);?>

			</div>
			<div class="headr5_1">
				<?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['monolog'],60);?>
...<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank">查看资料</a>
			</div>
			<div class="headr5_3"> 
				<span class="d3"><a href="###" onClick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><span class="icon24 icon24-follow"></span>打招呼</a></span> 
				<span class="d4"><a href="###" onClick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><span class="icon24 icon24-follow"></span>写信件</a></span>
			</div>
			<?php } ?>
			<div style="clear:both"></div>
        </div>
      </div>

    </div>
    <div style="clear:both;"></div>
  </div>
  <div class="bigline"></div>


</div>	

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script language="javascript">
function checklogin(){
    //帐号
    if($("#loginname").val() == "" || $("#loginname").val() == '用户名/邮箱'){
		alert('登录帐号不能为空');
		return false;
	} 

	//密码
	if($("#password").val() == "") {
		alert('登录密码不能为空');
		return false;
	} 

	<?php if ($_smarty_tpl->tpl_vars['config']->value['regcode']=='1'){?>
	if($("#checkcode").val() == "") {
		alert('验证码不能为空');
		return false;
	}
	<?php }?>

	$('#login_form').submit();
	return true;
}
//验证码
function refreshCode() {
	var ccImg = document.getElementById("checkCodeImg");
	if (ccImg) {
		ccImg.src= ccImg.src + '&' +Math.random();
	}
}

function changeDefaultInputValue() {
	var a = $("#loginname").val();
	if(a == "") {
		$("#loginname").val("用户名/邮箱");
	} else {
		if(a == '用户名/邮箱') {
			$("#loginname").val("");
		}
	}
	$('#loginname').attr("placeholder","用户名/邮箱");
}
//发表心情
function obj_public_mood(content_id) {
	var content = $("#"+content_id).val();
	//心情内容
	if (content == '' || content == '记录每一天的心情...') {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '请填写心情内容', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}
	if (strQuantity(content) > 500) {
		$.dialog({
			lock:true,
			title: '错误提示',
			content: '心情内容不能大于500个字', 
			icon: 'error',
			button: [ 
				{
					name: '确定'
				}
			]
		});
		return false;
	}

	//发表心情
	$.ajax({
		type: "POST",
		url: _ROOT_PATH + "usercp.php?c=weibo",
		cache: false,
		data: {a:"saveweibo", content:content, r:get_rndnum(8)},
		dataType: "json",
		success: function(data) {
			var json = eval(data);
			var response = json.response;
			var msg = json.msg;
			if (response == '1') {
				var tips = "";
				if (msg.length > 0) {
					tips = msg;
				}
				else {
					tips = "发表成功";
				}
				$.dialog({
					lock:true,
					title: '成功提示',
					content: tips, 
					icon: 'succeed',
					button: [ 
						{
							name: '确定',
							callback: function () {
								window.top.location.reload();
							}
						}
					]
				});
			}
			else {
				var tips = "";
				if (msg.length > 0) {
					tips = msg;
				}
				else {
					tips = "发表失败";
				}
				$.dialog.tips(tips, 3);
			}
		},
		error: function() {

		}
	});

}
//心情文本框
function obj_del_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content == '记录每一天的心情...') {
		$("#"+content_id).val("");
	}
}
function obj_attr_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content == '') {
		$("#title").val("记录每一天的心情...");
	}
}
function obj_cancel_wbcontent(content_id) {
	var content = $("#"+content_id).val();
	if (content != '记录每一天的心情...') {
		$("#"+content_id).val("记录每一天的心情...");
	}
}
</script><?php }} ?>