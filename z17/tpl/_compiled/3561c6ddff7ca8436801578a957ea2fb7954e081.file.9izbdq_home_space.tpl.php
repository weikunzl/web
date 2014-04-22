<?php /* Smarty version Smarty-3.1.14, created on 2014-04-22 10:50:58
         compiled from "C:\svn\z17z17\web\z17\tpl\templets\default\9izbdq_home_space.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68635355d912e1ed74-21721008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3561c6ddff7ca8436801578a957ea2fb7954e081' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\templets\\default\\9izbdq_home_space.tpl',
      1 => 1398066163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68635355d912e1ed74-21721008',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tplpath' => 0,
    'tplpre' => 0,
    'home' => 0,
    'skinpath' => 0,
    'config' => 0,
    'login' => 0,
    'cond' => 0,
    'volist' => 0,
    'i' => 0,
    'urlpath' => 0,
    'weibo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5355d913557a23_36105395',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5355d913557a23_36105395')) {function content_5355d913557a23_36105395($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_nl2br')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.nl2br.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_filterhtml')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.filterhtml.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php $_smarty_tpl->tpl_vars['menuid'] = new Smarty_variable('', null, 0);?> 
<script type='text/javascript'>
//关注状态
function obj_listen_status(uid, tipsid) {
	if (uid > 0) {
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=listen",
			cache: false,
			data: {a:"getlisten", halttype:"ajax", uid:uid, tipsid:tipsid, r:get_rndnum(8)},
			dataType: "json",
			success: function(data) {
				var json = eval(data);
				var flag = json.flag;
				if (tipsid != '') {
					if (flag == '1') {
						$("#"+tipsid).html("<span class='home_coffbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'cancel', '"+tipsid+"');\">取消关注</a></span>");
					}
					else {
						$("#"+tipsid).html("<span class='home_greenbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a>");
					}
				}
			},
			error: function() {

			}
		});
	} 
}

//操作好友 加关注、拉黑、取消
function obj_action_listen (uid, action, tipsid) {
	if (uid > 0) {
		$.ajax({
			type: "POST",
			url: _ROOT_PATH + "usercp.php?c=listen",
			cache: false,
			data: {a:action, halttype:"ajax", fuid:uid, tipsid:tipsid, r:get_rndnum(8)},
			dataType: "json",
			success: function(data) {
				var json = eval(data);
				var type = json.type;
				var flag = json.flag;
				var error = json.error;
				if (tipsid != '') {
					//加关注
					if (type == 'listen') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<span class='home_coffbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'cancel', '"+tipsid+"');\">取消关注</a></span>");
							}
						}
						else {
							alert(error);
						}
					}
					//取消关注
					if (type == 'cancel') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<span class='home_greenbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a></span>");
							}
						}
						else {
							alert(error);
						}
					}
					//拉黑名单
					if (type == 'black') {
						if (error.length==0) {
							if (flag == '1') {
								$("#"+tipsid).html("<span class='home_greenbtn'><a href=\"###\" onclick=\"obj_action_listen('"+uid+"', 'listen', '"+tipsid+"');\">+加关注</a></span>");
							}
						}
						else {
							alert(error);
						}
					}

				}
			},
			error: function() {

			}
		});
	}
}
</script>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="page-index" class="page">
  <div class="ce member">
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="left">
      <div class="paper-article">
        <div class="articlesec basicsec">
          <div class="pcontent">
            <div class="prwrap">
              <div class="portrait portrait-195"><?php echo $_smarty_tpl->tpl_vars['home']->value['useravatar'];?>
</div>
              <p class="offstr" style="text-align:center;">
			  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/cid<?php if ($_smarty_tpl->tpl_vars['home']->value['idnumberrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['home']->value['idnumberrz']==1){?>已身份证认证<?php }else{ ?>身份证未认证<?php }?>">
			  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/video<?php if ($_smarty_tpl->tpl_vars['home']->value['videorz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['home']->value['videorz']==1){?>已视频认证<?php }else{ ?>视频未认证<?php }?>">
			  <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/email<?php if ($_smarty_tpl->tpl_vars['home']->value['emailrz']==0){?>_h<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['home']->value['emailrz']==1){?>已邮箱认证<?php }else{ ?>邮箱未认证<?php }?>">
			  </p>
			  <?php if ($_smarty_tpl->tpl_vars['config']->value['showhomecontact']=='1'&&$_smarty_tpl->tpl_vars['home']->value['privacy']!='4'){?>
			  <p style="text-align:center;">
			  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']=='0'){?>
			  <a href="###" onclick="artbox_loginbox();">查看联系方式</a>
			  <?php }else{ ?>
			  <a href="###" onclick="artbox_viewcontact('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
');">查看联系方式</a>
			  <?php }?>
			  </p>
			  <?php }?>
              <div class="opwrap">
			  </div>
            </div>
            <div class="infowrap">

              <div class="biwrap">
                <ul class="infolist">
				  <li>交 友 ID：<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
</li>
                  <li>用 户 名：<?php echo $_smarty_tpl->tpl_vars['home']->value['username'];?>
</li>
                  <li>性&#12288;&#12288;别：<span class="certiconph"><?php if ($_smarty_tpl->tpl_vars['home']->value['gender']==1){?>男<?php }else{ ?>女<?php }?></span></li>
                  <li>婚姻状态：<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['marrystatus']),$_smarty_tpl);?>
<span class="certiconph"></span></li>
                  <li>年&#12288;&#12288;龄：<?php echo $_smarty_tpl->tpl_vars['home']->value['age'];?>
 岁<span class="certiconph"></span></li>
                  <li>学&#12288;&#12288;历：<?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['education']),$_smarty_tpl);?>
<span class="certiconph"></span></li>
                  <li>身&#12288;&#12288;高：<?php echo $_smarty_tpl->tpl_vars['home']->value['height'];?>
CM</li>
				  <li>月薪收入：<?php if ($_smarty_tpl->tpl_vars['home']->value['salary']==0){?><font class="empty">未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'salary','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['salary']),$_smarty_tpl);?>
<?php }?></li>
                 
				  <li>星&#12288;&#12288;座：<?php echo $_smarty_tpl->tpl_vars['home']->value['astro'];?>
</li>
                  <li>生&#12288;&#12288;肖：<?php echo $_smarty_tpl->tpl_vars['home']->value['lunar'];?>
</li>
                  <li>所在地区：<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['cityid']),$_smarty_tpl);?>
</li>
                  <li>籍&#12288;&#12288;贯：<?php if ($_smarty_tpl->tpl_vars['home']->value['nationprovinceid']==0){?><font class="empty">未透露</font><?php }else{ ?><?php echo cmd_hometown(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['nationprovinceid']),$_smarty_tpl);?>
 <?php echo cmd_hometown(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['nationcityid']),$_smarty_tpl);?>
<?php }?>
				  </li>
                  <div style="clear:both;"></div>
                </ul>
              </div>
			  <div style="clear:both;"></div>
              <div class="mbtnwrap">
                <div class="center_buttons"> 
				<?php if ($_smarty_tpl->tpl_vars['login']->value['status']==1){?>
				<a href="###" onclick="artbox_hi('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
');"> <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/a2.gif"></a> 
				<a href="###" onclick="artbox_writemsg('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
');"> <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/a1.gif"></a> 
				<a href="###" onclick="artbox_sendgift('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
');"> <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/a4.gif"></a> 
				<?php }else{ ?>
				<a href="###" onclick="artbox_loginbox();"> <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/b2.gif"></a>
				<a href="###" onclick="artbox_loginbox();"> <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/b1.gif"></a>
				<a href="###" onclick="artbox_loginbox();"> <img src="<?php echo $_smarty_tpl->tpl_vars['skinpath']->value;?>
themes/images/b4.gif"></a>
				<?php }?>
				</div>
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
        </div>
		<?php if ($_smarty_tpl->tpl_vars['home']->value['molstatus']==1){?>
        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">内心独白</h1>
          </div>
          <div class="pcontent">
            <ul class="content" style="font-size:12px;">
			<?php echo smarty_modifier_nl2br($_smarty_tpl->tpl_vars['home']->value['monolog']);?>

            </ul>
          </div>
        </div>
		<?php }?>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">择友要求</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width='100%'>
				  <tr>
					<td width='15%'>性&#12288;&#12288;别：</td>
					<td width='35%'><?php if ($_smarty_tpl->tpl_vars['cond']->value['gender']==1){?>男<?php }elseif($_smarty_tpl->tpl_vars['cond']->value['gender']==2){?>女<?php }else{ ?><font class='empty'>不限</font><?php }?> </td>
					<td width='15%'>照片要求：</td>
					<td width='35%'><?php if ($_smarty_tpl->tpl_vars['cond']->value['avatar']==1){?>有照片<?php }else{ ?><font class='empty'>不限</font><?php }?></td>
				  </tr>
				  <tr>
					<td>年龄范围：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['cond']->value['startage']==0){?><font class='empty'>不限</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['cond']->value['startage'];?>
~<?php echo $_smarty_tpl->tpl_vars['cond']->value['endage'];?>
岁<?php }?></td>
					<td>身高范围：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['cond']->value['startheight']==0){?><font class='empty'>不限</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['cond']->value['startheight'];?>
~<?php echo $_smarty_tpl->tpl_vars['cond']->value['endheight'];?>
CM<?php }?></td>
				  </tr>
				  <tr>
					<td>交友类型：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['cond']->value['lovesort'])){?><font class='empty'>不限</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'lovesort','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['cond']->value['lovesort']),$_smarty_tpl);?>
<?php }?></td>
					<td>婚史状况：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['cond']->value['marry'])){?><font class='empty'>不限</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','type'=>'multi','item'=>'marrystatus','value'=>$_smarty_tpl->tpl_vars['cond']->value['marry']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>

				  <tr>
					<td>学历要求：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['cond']->value['startedu']==0){?><font class='empty'>不限</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'education','value'=>$_smarty_tpl->tpl_vars['cond']->value['startedu']),$_smarty_tpl);?>
~<?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'education','value'=>$_smarty_tpl->tpl_vars['cond']->value['endedu']),$_smarty_tpl);?>
<?php }?></td>
					<td>诚信星级：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['cond']->value['star']==0){?><font class='empty'>不限</font><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['cond']->value['starup']==1){?>以上<?php }elseif($_smarty_tpl->tpl_vars['cond']->value['starup']==2){?>以下<?php }?><?php }?></td>
				  </tr>
				  <tr>
					<td>所在地区：</td>
					<td colspan='3'>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(false, null, 0);?>
					<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cond']->value['bulidarea']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['volist']->value['city']>0){?>
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(true, null, 0);?>
					<?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['province']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['volist']->value['city']),$_smarty_tpl);?>
<br />
					<?php }?>
					<?php } ?>
					<?php if (false===$_smarty_tpl->tpl_vars['i']->value){?>
					<font class='empty'>不限</font>
					<?php }?>
					</td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">详细资料</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width='15%'>年&#12288;&#12288;龄：</td>
					<td width='35%'><?php echo $_smarty_tpl->tpl_vars['home']->value['age'];?>
 岁</td>
					<td width='15%'>生&#12288;&#12288;肖：</td>
					<td width='35%'><?php echo $_smarty_tpl->tpl_vars['home']->value['lunar'];?>
</td>
				  </tr>
				  <tr>
					<td>交友类型：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['lovesort']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['home']->value['sortname'];?>
<?php }?></td>
					<td>血&#12288;&#12288;型：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['blood']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'blood','value'=>$_smarty_tpl->tpl_vars['home']->value['blood']),$_smarty_tpl);?>
<?php }?> </td>
				  </tr>
				  <tr>
					<td>民&#12288;&#12288;族：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['national']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'national','value'=>$_smarty_tpl->tpl_vars['home']->value['national']),$_smarty_tpl);?>
<?php }?></td>
					<td>有无子女：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['childrenstatus']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'childrenstatus','value'=>$_smarty_tpl->tpl_vars['home']->value['childrenstatus']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>购车情况：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['caring']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'caring','value'=>$_smarty_tpl->tpl_vars['home']->value['caring']),$_smarty_tpl);?>
<?php }?> </td>
					<td>住房情况：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['housing']==0){?><font class="empty">未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'housing','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['housing']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>所在地区：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['provinceid']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['provinceid']),$_smarty_tpl);?>
 <?php echo cmd_area(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['cityid']),$_smarty_tpl);?>
<?php }?></td>
					<td>户籍地区：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['nationprovinceid']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hometown(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['nationprovinceid']),$_smarty_tpl);?>
 <?php echo cmd_hometown(array('type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['nationcityid']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">性格相貌</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width='15%'>个性描述：</td>
					<td width='35%'><?php if ($_smarty_tpl->tpl_vars['home']->value['personality']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'personality','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['personality']),$_smarty_tpl);?>
<?php }?></td>
					<td width='15%'>相貌自评：</td>
					<td width='35%'><?php if ($_smarty_tpl->tpl_vars['home']->value['profile']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'profile','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['profile']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>体&#12288;&#12288;重：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['weight']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['home']->value['weight'];?>
 (KG)<?php }?> </td>
					<td>体&#12288;&#12288;型：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['bodystyle']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'bodystyle','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['bodystyle']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>魅力部位：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['charmparts']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'charmparts','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['charmparts']),$_smarty_tpl);?>
<?php }?> </td>
					<td>发&nbsp;&nbsp;&nbsp;&nbsp;型：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['hairstyle']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'hairstyle','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['hairstyle']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>发&#12288;&#12288;色：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['haircolor']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'haircolor','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['haircolor']),$_smarty_tpl);?>
<?php }?></td>
					<td>脸&#12288;&#12288;型：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['facestyle']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'facestyle','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['facestyle']),$_smarty_tpl);?>
<?php }?> </td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">工作与学习</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width='15%'>公司类型：</td>
					<td width='35%'><?php if ($_smarty_tpl->tpl_vars['home']->value['companytype']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'companytype','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['companytype']),$_smarty_tpl);?>
<?php }?></td>
					<td width='15%'>收入描述：</td>
					<td width='35%'><?php if ($_smarty_tpl->tpl_vars['home']->value['income']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'income','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['income']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>工作状况：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['workstatus']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'workstatus','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['workstatus']),$_smarty_tpl);?>
<?php }?></td>
					<td>公司名称：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['companyname']==''){?><font class='empty'>未透露</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['home']->value['companyname'];?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>教育程度：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['education']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['education']),$_smarty_tpl);?>
<?php }?></td>
					<td>所学专业：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['specialty']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'specialty','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['specialty']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>职&#12288;&#12288;业：</td>
					<td colspan="3"><?php if ($_smarty_tpl->tpl_vars['home']->value['jobs']=='0'){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'jobs','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['jobs']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>语言能力：</td>
					<td colspan="3"><?php if ($_smarty_tpl->tpl_vars['home']->value['language']==''){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'language','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['language']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">生活描述</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width='15%'>家中排行：</td>
					<td width='35%'><?php if ($_smarty_tpl->tpl_vars['home']->value['tophome']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'tophome','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['tophome']),$_smarty_tpl);?>
<?php }?></td>
					<td width='15%'>最大消费：</td>
					<td width='35%'><?php if ($_smarty_tpl->tpl_vars['home']->value['consume']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'consume','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['consume']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>是否吸烟：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['smoking']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'smoking','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['smoking']),$_smarty_tpl);?>
<?php }?></td>
					<td>是否喝酒：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['drinking']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'drinking','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['drinking']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>宗教信仰：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['faith']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'faith','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['faith']),$_smarty_tpl);?>
<?php }?></td>
					<td>锻炼习惯：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['workout']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'workout','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['workout']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>作息习惯：</td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['rest']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'rest','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['rest']),$_smarty_tpl);?>
<?php }?></td>
					<td>是否要孩子 </td>
					<td><?php if ($_smarty_tpl->tpl_vars['home']->value['havechildren']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'havechildren','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['havechildren']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td colspan='2'>愿意与对方父母同住： <?php if ($_smarty_tpl->tpl_vars['home']->value['talive']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['home']->value['talive_t'];?>
<?php }?></td>
					<td colspan='2'>喜欢制造浪漫： <?php if ($_smarty_tpl->tpl_vars['home']->value['romantic']==0){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'romantic','type'=>'text','value'=>$_smarty_tpl->tpl_vars['home']->value['romantic']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td colspan="4">擅长生活技能： <?php if ($_smarty_tpl->tpl_vars['home']->value['lifeskill']==''){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'lifeskill','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['lifeskill']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>

        <div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">兴趣爱好</h1>
          </div>
          <div class="pcontent">
            <ul class="infolist">
				<table border="0" cellspacing="0" cellpadding="0" class="tb-home" width="100%">
				  <tr>
					<td width="20%">喜欢的运动：</td>
					<td width='80%'><?php if ($_smarty_tpl->tpl_vars['home']->value['sports']==''){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'sports','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['sports']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>喜欢的食物：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['home']->value['food'])){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'food','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['food']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>喜欢的书籍：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['home']->value['book'])){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'book','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['book']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>喜欢的电影：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['home']->value['film'])){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'film','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['film']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>业 余 爱 好：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['home']->value['interest'])){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'interest','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['interest']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>喜欢的旅游去处：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['home']->value['travel'])){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'travel','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['travel']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>关注的节目：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['home']->value['attention'])){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'attention','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['attention']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				  <tr>
					<td>娱 乐 休 闲：</td>
					<td><?php if (empty($_smarty_tpl->tpl_vars['home']->value['leisure'])){?><font class='empty'>未透露</font><?php }else{ ?><?php echo cmd_hook(array('mod'=>'var','item'=>'leisure','type'=>'multi','value'=>$_smarty_tpl->tpl_vars['home']->value['leisure']),$_smarty_tpl);?>
<?php }?></td>
				  </tr>
				</table>
              <div style="clear:both;"></div>
            </ul>
          </div>
        </div>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."home_block_album.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      </div>
    </div>

    <div class="right yue1">
      <h2>会员状态</h2>
      <ul class="center">
        <li>会员级别：<?php echo $_smarty_tpl->tpl_vars['home']->value['levelimg'];?>
</li>
		<li>访问人气：<font id='json_hits'></font></li>
        <li>个人相册：<?php echo cmd_count(array('mod'=>'user','type'=>'album','value'=>$_smarty_tpl->tpl_vars['home']->value['userid']),$_smarty_tpl);?>
 张</li>
        <li>心情日记：<?php echo cmd_count(array('mod'=>'user','type'=>'diary','value'=>$_smarty_tpl->tpl_vars['home']->value['userid']),$_smarty_tpl);?>
 篇</li>
        <li>收到礼物：<?php echo cmd_count(array('mod'=>'user','type'=>'gift','value'=>$_smarty_tpl->tpl_vars['home']->value['userid']),$_smarty_tpl);?>
 个</li>
		<li>微博动态：<?php echo cmd_count(array('mod'=>'user','type'=>'weibo','value'=>$_smarty_tpl->tpl_vars['home']->value['userid']),$_smarty_tpl);?>
 个</li>
		<li>关&#12288;&#12288;注：<?php echo cmd_count(array('mod'=>'user','type'=>'listen','value'=>$_smarty_tpl->tpl_vars['home']->value['userid']),$_smarty_tpl);?>
 个</li>
		<li>粉&#12288;&#12288;丝：<?php echo cmd_count(array('mod'=>'user','type'=>'fans','value'=>$_smarty_tpl->tpl_vars['home']->value['userid']),$_smarty_tpl);?>
 个</li>
        <li>注册时间：
		<?php if ($_smarty_tpl->tpl_vars['login']->value['status']==0){?>
		<a href="###" onclick="artbox_loginbox();">登录可见</a>
		<?php }else{ ?>
		    <?php if ($_smarty_tpl->tpl_vars['login']->value['userid']==$_smarty_tpl->tpl_vars['home']->value['userid']){?>
			    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['home']->value['regtime'],"%Y-%m-%d");?>

			<?php }else{ ?>
				<?php if ($_smarty_tpl->tpl_vars['login']->value['group']['view']['viewlogintime']==1){?>
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['home']->value['regtime'],"%Y-%m-%d");?>

				<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=vip">VIP可见&gt;&gt;</a>
				<?php }?>
			<?php }?>
		<?php }?>
		</li>
        <li>最后登录：
		<?php if ($_smarty_tpl->tpl_vars['login']->value['status']==0){?>
		<a href="###" onclick="artbox_loginbox();">登录可见</a>
		<?php }else{ ?>
		    <?php if ($_smarty_tpl->tpl_vars['login']->value['userid']==$_smarty_tpl->tpl_vars['home']->value['userid']){?>
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['home']->value['logintime'],"%Y-%m-%d");?>

			<?php }else{ ?>
				<?php if ($_smarty_tpl->tpl_vars['login']->value['group']['view']['viewlogintime']==1){?>
				<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['home']->value['logintime'],"%Y-%m-%d");?>

				<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=vip">VIP可见&gt;&gt;</a>
				<?php }?>
			<?php }?>
		<?php }?>
		</li>
        <div style="clear:both;"></div>
      </ul>
      <div class="listen">

	  <?php if ($_smarty_tpl->tpl_vars['login']->value['status']=='0'){?>
	  <span class="home_greenbtn"><a onclick="artbox_loginbox();" href="###">+加关注</a></span>
	  <span class="home_gradbtn"><a onclick="artbox_loginbox();" href="###">加黑名单</a></span>
	  <?php }else{ ?>
		<?php if ($_smarty_tpl->tpl_vars['login']->value['userid']!=$_smarty_tpl->tpl_vars['home']->value['userid']){?>
		<div style="float:left;width:75px;" id="listen-status"><script>obj_listen_status('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
', 'listen-status');</script></div>
		<div style="float:left;width:75px;" id="black-status">
		<span class="home_gradbtn"><a href="###" onclick="obj_action_listen('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
', 'black', 'listen-status');">加黑名单</a></span>
		</div>
		<div style="clear:both;"></div>
		<?php }?>
	  <?php }?>

	  </div>
      <div class="bao"> 
	  若此会员有交友动机不纯、故意中伤、侮辱、提供虚假资料、散步广告等恶劣行为。
	  <a href="###" onclick="artbox_complaint('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
');">请向网站举报</a> </div>
	  
	  <?php $_smarty_tpl->tpl_vars['weibo'] = new Smarty_variable(vo_list("mod={weibo} num={8} where={v.userid='".((string)$_smarty_tpl->tpl_vars['home']->value['userid'])."'}"), null, 0);?>
	  <?php if (!empty($_smarty_tpl->tpl_vars['weibo']->value)){?>
      <h2><?php echo $_smarty_tpl->tpl_vars['home']->value['username'];?>
心情微播</h2>
      <div class="dongtai">
		<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['weibo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
        <div class="dongti"> 
		  <font color='#999999'>更新心情 -- <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['volist']->value['addtime'],"%m-%d");?>
</font>&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
usercp.php?c=weibo&uid=<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
" target="_blank">查看&gt;&gt;</a><br>
          <?php echo smarty_modifier_filterhtml($_smarty_tpl->tpl_vars['volist']->value['content'],45);?>
..
		</div>
		<?php } ?>
      </div>
	  <?php }?>

      <h2>你可能感兴趣的人</h2>
	  <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."user_80x96.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script type='text/javascript'>
$(function(){
	update_hits('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
', 'home', 'json_hits');
	<?php if ($_smarty_tpl->tpl_vars['login']->value['status']=='1'&&$_smarty_tpl->tpl_vars['login']->value['userid']!=$_smarty_tpl->tpl_vars['home']->value['userid']){?>
	ajax_visithome('<?php echo $_smarty_tpl->tpl_vars['home']->value['userid'];?>
');
	<?php }?>
});
</script><?php }} ?>