<?php /* Smarty version Smarty-3.1.14, created on 2014-03-25 11:02:00
         compiled from "C:\svn\eolove\tpl\templets\default\9izbdq_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:324085330f1a8ef7866-09083501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cd24668e04911b8eed4c4bc11996492bc92a46a' => 
    array (
      0 => 'C:\\svn\\eolove\\tpl\\templets\\default\\9izbdq_index.tpl',
      1 => 1378713646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '324085330f1a8ef7866-09083501',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'zone' => 0,
    'urlpath' => 0,
    'volist' => 0,
    'login' => 0,
    'forward' => 0,
    'config' => 0,
    'appfile' => 0,
    'lang' => 0,
    'skinpath' => 0,
    'user' => 0,
    'weibo' => 0,
    'news' => 0,
    'ads' => 0,
    'vip_area' => 0,
    'vipuser' => 0,
    'newdiary' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5330f1a93fc416_23697825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5330f1a93fc416_23697825')) {function content_5330f1a93fc416_23697825($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\svn\\eolove\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\eolove\\source\\core\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable('index', null, 0);?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="indexbg">
    <div class="index"> 
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <div class="loginwrap">
		<?php $_smarty_tpl->tpl_vars['zone'] = new Smarty_variable(get_zone('index_slide_banner'), null, 0);?>
		<?php if (!empty($_smarty_tpl->tpl_vars['zone']->value['ads'])){?>
		<script src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
tpl/static/js/jquery.KinSlideshow-1.2.1.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(function(){
			$(".ads").KinSlideshow({
					moveStyle:"right",
					titleBar:{titleBar_height:30,titleBar_bgColor:"#fe91c3",titleBar_alpha:0.5},
					titleFont:{TitleFont_size:14,TitleFont_color:"#FFFFFF",TitleFont_weight:"bold"},
					btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#d83473",btn_fontColor:"#000000",btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",btn_borderHoverColor:"#ffceff",btn_borderWidth:1}
			});
		})
		</script>
		<?php }?>
        <div class="ads">
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['zone']->value['ads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['volist']->value['uploadfiles'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['volist']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['volist']->value['height'];?>
"  alt="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
" /></a>
		<?php } ?>
		</div>

        <div class="huar">
		  
		  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']==0){?>
          <div class="llgo">
              <p class="shuo">马上登录，进行您的觅爱之旅。</p>
              <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=passport&a=loginpost" name="login_form" id="login_form" />
              <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['forward']->value;?>
" name="forward">
              <div class="fitem" style="position: relative;">
                <label>帐&#12288;号：</label>
				<input type="text" name='loginname' id='loginname' value='用户名/邮箱' class="login_input1" onClick="changeDefaultInputValue();" onBlur="changeDefaultInputValue();" />			  </div>

              <p class="fitem">
                <label>密&#12288;码：</label>
				<input type="password" name="password" id="password" class="login_input1" maxlength="16" />
              </p>
			  <?php if ($_smarty_tpl->tpl_vars['config']->value['logincode']=='1'){?>
              <p class="fitem">
              <label>验证码：</label>
              <input type="text" id="checkcode" name="checkcode" class='login_input2' maxlength="6" /> <a href="javascript:refreshCode();"><img id="checkCodeImg" src="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
source/include/imagecode.php?act=verifycode" align="middle" title="点击换一张" /></a>
              </p>
			  <?php }?>

              <p class="fitem-tips" style="margin-left:55px;"><a class="rp" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=forget">忘记密码？点击取回密码</a></p>
              <p class="fitem-btn">
                <button class="button button-major button-login" type="input" onclick="return checklogin();">登录</button>
                <a class="button button-minor button-reg" href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=reg">免费注册</a>
			  </p>
              </form>
            <div class="onlinecount">
              <p><span class="left"><em class="numwcomma"> <?php echo number_format($_smarty_tpl->tpl_vars['config']->value['countusers']);?>
  </em></span>位会员在寻找真爱</p>
            </div>
          </div>
		  <?php }?>
		  
		  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?>
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
                  <div><?php echo $_smarty_tpl->tpl_vars['lang']->value['money'];?>
：<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['money'];?>
</div>
                  <div><?php echo $_smarty_tpl->tpl_vars['lang']->value['points'];?>
：<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['points'];?>
</div>
                  <div>相册：<?php echo cmd_count(array('mod'=>'user','type'=>'album','value'=>$_smarty_tpl->tpl_vars['login']->value['info']['userid']),$_smarty_tpl);?>
 张 <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=album">上传</a></div>
                  <div><a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=passport&a=logout">退出登录</a>&nbsp;|&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=payment">充值</a></div>
                </div>
                <div class="c"></div>
              </div>
              <div class="login_hudong">
			    <span>
				  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/cid<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['idnumberrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['idnumberrz']==1){?>已身份证认证<?php }else{ ?>身份证未认证<?php }?>">
				  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/video<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['videorz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['videorz']==1){?>已视频认证<?php }else{ ?>视频未认证<?php }?>">
				  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/email<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['emailrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['login']->value['info']['emailrz']==1){?>已邮箱认证<?php }else{ ?>邮箱未认证<?php }?>">

				  诚信星级：<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['star'];?>
星，<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=certify">诚信认证</a>
                </span>
                <div><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/y1.gif">信件：(<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=message"><?php echo cmd_count(array('mod'=>'user','type'=>'newmessage','value'=>$_smarty_tpl->tpl_vars['login']->value['info']['userid']),$_smarty_tpl);?>
</a>)</div>
                <div><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/y2.gif">人气：(<a href="<?php echo $_smarty_tpl->tpl_vars['login']->value['info']['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['login']->value['info']['hits'];?>
</a>)</div>
                <div><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/y3.gif">日记：(<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=diary"><?php echo cmd_count(array('mod'=>'user','type'=>'diary','value'=>$_smarty_tpl->tpl_vars['login']->value['info']['userid']),$_smarty_tpl);?>
</a>)</div>
                <div><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/y4.gif">礼物：(<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=gift"><?php echo cmd_count(array('mod'=>'user','type'=>'gift','value'=>$_smarty_tpl->tpl_vars['login']->value['info']['userid']),$_smarty_tpl);?>
</a>)</div>
              </div>
              <div class="login_goge"><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php">进入个人中心</a></div>
            </div>
          </div>
		  <?php }?>

        </div>
      </div>
    </div>
  </div>
  <div class="bigline"></div>
  <div class="index1">
    <div class="left3">
	  
	  <h2 class="hh3">
	    <label><a id="tab_label_tag" href="###" class="nnn" onMouseOver="tab_label('0');">最新会员</a></label>
	    <label><a id="tab_label_tag" href="###" onMouseOver="tab_label('1');">推荐女会员</a></label> 
	    <label><a id="tab_label_tag" href="###" onMouseOver="tab_label('2');">推荐男会员</a></label>
		
	    <a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user" class="more3">查看更多&gt;&gt;</a> 
	  </h2>
      <div class="left3list" style="display:block;" id="tab_label_0">
        <ul>
          <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={user} where={v.avatar='1'} num={12}"), null, 0);?> 
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
			<div class="guangzh"><a href="###" onClick="jbox_hibox(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);">打招呼</a><a href="###" onClick="jbox_writebox(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);">写信件</a></div>
          </li>
          <?php } ?>
        </ul>
      </div>

      <div class="left3list" style="display:none;" id="tab_label_1">
        <ul>
          <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='2'} num={12}"), null, 0);?> 
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
			<div class="guangzh"><a href="###" onClick="jbox_hibox(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);">打招呼</a><a href="###" onClick="jbox_writebox(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);">写信件</a></div>
          </li>
          <?php } ?>
        </ul>
      </div>

      <div class="left3list" style="display:none;" id="tab_label_2">
        <ul>
          <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable(vo_list("mod={listuser} type={elite} where={v.avatar='1' AND v.gender='1'} num={12}"), null, 0);?> 
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
			<div class="guangzh"><a href="###" onClick="jbox_hibox(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);">打招呼</a><a href="###" onClick="jbox_writebox(<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
);">写信件</a></div>
          </li>
          <?php } ?>
        </ul>
      </div>

	<script>
	//显示隐藏
	function tab_label(tabid) {
		var taglength = $("a[id='tab_label_tag']").length;
		for (i=0; i<taglength; i++){
			if (tabid == i) {
				$("a[id='tab_label_tag']").eq(i).addClass('nnn');
				$('#tab_label_'+i).show();
			}
			else {
				$("a[id='tab_label_tag']").eq(i).removeClass('nnn');
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
      </div>


      <div class="paper-aside noticesec">
        <div class="titlebar">
          <div class="title3">最新公告</div>
        </div>
        <div class="noticewrap">
          <div class="noticelistwrap">
            <ul class="noticelist">
              <?php $_smarty_tpl->tpl_vars['news'] = new Smarty_variable(vo_list("mod={info} num={4}"), null, 0);?> 
              <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
              <li class="notice"><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</a><em class="dt"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['addtime'],"%m-%d");?>
</em></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>

    </div>
    <div style="clear:both;"></div>
  </div>
  <div class="bigline"></div>

  <?php $_smarty_tpl->tpl_vars['ads'] = new Smarty_variable(get_ads('index_banner_1'), null, 0);?>
  <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value)){?>
  <div class="inad1"><a <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value['url'])&&$_smarty_tpl->tpl_vars['ads']->value['url']!='#'){?>href="<?php echo $_smarty_tpl->tpl_vars['ads']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['ads']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['uploadfiles'];?>
" width='<?php echo $_smarty_tpl->tpl_vars['ads']->value['width'];?>
' height='<?php echo $_smarty_tpl->tpl_vars['ads']->value['height'];?>
' border='0' title="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
" /></a></div>
  <div class="bigline"></div>
  <?php }?>

  <div class="index6">
    <div class="left4">
      <h2 class="hh3">
	  <em>VIP会员</em>
	    <label><a id="vip_label_tag" href="###" class="nnn" onMouseOver="vip_label(0);">全部</a></label> 
		<?php $_smarty_tpl->tpl_vars["vip_area"] = new Smarty_variable(vo_list("mod={childarea} where={v.tabstatus='1' AND v.depth='1'} num={6}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vip_area']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	    <label><a id="vip_label_tag" href="###" onMouseOver="vip_label(<?php echo $_smarty_tpl->tpl_vars['volist']->value['i'];?>
);"><?php echo $_smarty_tpl->tpl_vars['volist']->value['areaname'];?>
</a></label> 
		<?php } ?>
	    <a class="more3" href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=user">查看更多&gt;&gt;</a> 
	  </h2>
      <ul id="vip_label_0" style="display:block;">
	    <?php $_smarty_tpl->tpl_vars['vipuser'] = new Smarty_variable(vo_list("mod={listuser} type={vip} where={v.avatar='1' AND v.monolog='1'} num={6}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vipuser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <li> <a class="head5" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['useravatar'];?>
</a>
          <div class="headr5"> <span class="headr5_2"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>

            <div class="headr5_1"> <?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
 岁　<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
 <?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'education','value'=>$_smarty_tpl->tpl_vars['volist']->value['education']),$_smarty_tpl);?>
<br>
              <?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['monolog'],40);?>
...<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank">查看资料</a></div>
            <div class="headr5_3"> 
			<span class="d3"><a href="###" onClick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><span class="icon24 icon24-follow"></span>打招呼</a></span> 
			<span class="d4"><a href="###" onClick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><span class="icon24 icon24-follow"></span>写信件</a></span>
			</div>
          </div>
        </li>
		<?php } ?>
        <div style="clear:both"></div>
      </ul>
      
	  <?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vip_area']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
      <ul id="vip_label_1" style="display:none;">
	    <?php $_smarty_tpl->tpl_vars['vipuser'] = new Smarty_variable(vo_list("mod={listuser} type={vip} where={v.avatar='1' AND v.monolog='1' AND v.cityid='".((string)$_smarty_tpl->tpl_vars['volist']->value['areaid'])."'} num={6}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vipuser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <li> <a class="head5" href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['useravatar'];?>
</a>
          <div class="headr5"> <span class="headr5_2"><?php echo $_smarty_tpl->tpl_vars['volist']->value['username'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['volist']->value['levelimg'];?>

            <div class="headr5_1"> <?php echo $_smarty_tpl->tpl_vars['volist']->value['age'];?>
 岁　<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['cityid']),$_smarty_tpl);?>
 <?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'education','value'=>$_smarty_tpl->tpl_vars['volist']->value['education']),$_smarty_tpl);?>
<br>
              <?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['monolog'],40);?>
...<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['homeurl'];?>
" target="_blank">查看资料</a></div>
            <div class="headr5_3"> 
			<span class="d3"><a href="###" onClick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><span class="icon24 icon24-follow"></span>打招呼</a></span> 
			<span class="d4"><a href="###" onClick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['volist']->value['userid'];?>
');"><span class="icon24 icon24-follow"></span>写信件</a></span>
			</div>
          </div>
        </li>
		<?php } ?>
        <div style="clear:both"></div>
      </ul>
	  <?php } ?>

	  <script>
	  //显示隐藏
	  function vip_label(tabid) {
		  var taglength = $("a[id='vip_label_tag']").length;
		  for (i=0; i<taglength; i++){
			  if (tabid == i) {
				  $("a[id='vip_label_tag']").eq(i).addClass('nnn');
				  $('#vip_label_'+i).show();
			  }
			  else {
				  $("a[id='vip_label_tag']").eq(i).removeClass('nnn');
				  $('#vip_label_'+i).hide();
			  }
		  }
	  }
	  </script>

    </div>

    <div class="right4">
      <h2 class="righth4"><span>最新日记</span> <a href="<?php echo $_smarty_tpl->tpl_vars['appfile']->value;?>
?c=ask" target="_blank">更多&gt;&gt;</a></h2>
      <div class="qiulist">
		<?php $_smarty_tpl->tpl_vars['newdiary'] = new Smarty_variable(vo_list("mod={diary} num={5}"), null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newdiary']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <div class="r4list"><a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
"><?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['title'],15);?>
</a></div>
		<?php } ?>
      </div>

	  <?php $_smarty_tpl->tpl_vars['ads'] = new Smarty_variable(get_ads('index_smbanner_1'), null, 0);?>
	  <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value)){?>
	  <div class="qiutu"><a <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value['url'])&&$_smarty_tpl->tpl_vars['ads']->value['url']!='#'){?>href="<?php echo $_smarty_tpl->tpl_vars['ads']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['ads']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['uploadfiles'];?>
" width='<?php echo $_smarty_tpl->tpl_vars['ads']->value['width'];?>
' height='<?php echo $_smarty_tpl->tpl_vars['ads']->value['height'];?>
' border='0' title="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
" /></a></div>
	  <?php }?>

	  <?php $_smarty_tpl->tpl_vars['ads'] = new Smarty_variable(get_ads('index_smbanner_2'), null, 0);?>
	  <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value)){?>
	  <div class="w230"><a <?php if (!empty($_smarty_tpl->tpl_vars['ads']->value['url'])&&$_smarty_tpl->tpl_vars['ads']->value['url']!='#'){?>href="<?php echo $_smarty_tpl->tpl_vars['ads']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['ads']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['ads']->value['uploadfiles'];?>
" width='<?php echo $_smarty_tpl->tpl_vars['ads']->value['width'];?>
' height='<?php echo $_smarty_tpl->tpl_vars['ads']->value['height'];?>
' border='0' title="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
" /></a></div>
	  <?php }?>

	  <div class="index_info_box">	
	    <a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=vip" class="infot"><img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/ads3.jpg"></a>
		<h4><a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=vip">VIP会员</a></h4>
		<p>服务期内，免费查看任何信件，方便！</p>
	  </div>

      <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div class="bigline"></div>



  <div class="bigline"></div>
  <div class="linkss">
    <div class="linktitle">友情链接</div>
    <div class="linkcontent"><?php echo cmd_label(array('name'=>'friendlink'),$_smarty_tpl);?>
</div>
  </div>

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
</script><?php }} ?>