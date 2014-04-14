<?php /* Smarty version Smarty-3.1.14, created on 2014-04-03 17:52:25
         compiled from "C:\svn\z17\tpl\user\profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102045333d78d908e39-32303908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e0039f0b2d7b3c5362fc4d6220c9d6aa67dca28' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\user\\profile.tpl',
      1 => 1396518739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102045333d78d908e39-32303908',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5333d78dd8d707_06290303',
  'variables' => 
  array (
    'uctplpath' => 0,
    'tplpath' => 0,
    'tplpre' => 0,
    'a' => 0,
    'ucfile' => 0,
    'config' => 0,
    'u' => 0,
    'lang' => 0,
    'ucpath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333d78dd8d707_06290303')) {function content_5333d78dd8d707_06290303($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_headinc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->tpl_vars["menuid"] = new Smarty_variable("profile", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tplpath']->value).((string)$_smarty_tpl->tpl_vars['tplpre']->value)."block_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="user_main">
 

  <div class="main_right">
    <div class="div_">我的资料 &gt;&gt; 编辑资料</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile">基本资料</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='more'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=more">详细资料</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='monolog'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=monolog">内心独白</a></li>
		  <li class="tab_item<?php if ($_smarty_tpl->tpl_vars['a']->value=='contact'){?> current<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=contact">联系资料</a></li>
		  <?php if ($_smarty_tpl->tpl_vars['config']->value['app']['liehun']=='1'){?>
		  <li class="tab_item">猎婚资料</li>
		  <?php }?>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
	<div class="div_smallnav_content_hover basicdata">
	  
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='run'){?> 
	  <!--基本资料 Begin-->
	  <form name="myform" id="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=savebase" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="4" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>基本资料</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 邮箱、名称 -->
		  <tr>
			<td class='lblock' width='15%'>登录邮箱 <span class='f_red'></span></td>
			<td class='rblock' width='35%'><font color="#999999"><?php echo $_smarty_tpl->tpl_vars['u']->value['email'];?>
 </font></td>
			<td class='lblock' width='15%'>用 户 名 <span class='f_red'></span></td>
			<td class='rblock' width='35%'><?php echo $_smarty_tpl->tpl_vars['u']->value['levelimg'];?>
&nbsp;<font color="#999999"><?php echo $_smarty_tpl->tpl_vars['u']->value['username'];?>
</font></td>
		  </tr>
		  <!-- 性别、生日 -->
		  <tr>
			<td class='lblock'>性 别 <span class='f_red'></span></td>
			<td class='rblock'><font color="#999999"><?php if ($_smarty_tpl->tpl_vars['u']->value['gender']==1){?><?php echo $_smarty_tpl->tpl_vars['lang']->value['sex_male'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['lang']->value['sex_female'];?>
<?php }?></font> </td>
			<td class='lblock'>生 日 <span class='f_red'></span></td>
			<td class='rblock'><font color="#999999"><?php echo $_smarty_tpl->tpl_vars['u']->value['birthday'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['u']->value['age'];?>
  岁</font></td>
		  </tr>
		  <!-- 星座、生肖 -->
		  <tr>
			<td class='lblock'>星 座 <span class='f_red'></span></td>
			<td class='rblock'><font color="#999999"><?php echo $_smarty_tpl->tpl_vars['u']->value['astro'];?>
</font> </td>
			<td class='lblock'>生 肖 <span class='f_red'></span></td>
			<td class='rblock'><font color="#999999"><?php echo $_smarty_tpl->tpl_vars['u']->value['lunar'];?>
</font> </td>
		  </tr>
		  <!-- 婚姻、身高 -->
		  <tr>
			<td class='lblock'>婚姻状态 <span class='f_red'></span></td>
			<td class='rblock'><font color='#999999'><?php echo cmd_hook(array('mod'=>'var','type'=>'text','item'=>'marrystatus','value'=>$_smarty_tpl->tpl_vars['u']->value['marrystatus']),$_smarty_tpl);?>
</font> <span class='f_red' id='dmarrystatus'></span></td>
			<td class='lblock'>身 高 <span class='f_red'></span></td>
			<td class='rblock'><font color='#999999'><?php echo $_smarty_tpl->tpl_vars['u']->value['height'];?>
 CM</font> <span class='f_red' id='dheight'></span></td>
		  </tr>
		  <!-- 血型、有无子女 -->
		  <tr>
			<td class='lblock'>血 型 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'blood','name'=>'blood','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['blood']),$_smarty_tpl);?>
 <span id='dblood' class='f_red'></span></td>
			<td class='lblock'>有无子女 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'childrenstatus','name'=>'childrenstatus','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['childrenstatus']),$_smarty_tpl);?>
 <span id='dchildrenstatus' class='f_red'></span></td>
		  </tr>
		  <!-- 国籍，户籍 -->
		  <tr>
			<td class='lblock'>国 籍 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'nationality','name'=>'nationality','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['nationality']),$_smarty_tpl);?>
 <span id='dnationality' class='f_red'></span></td>
			<td class='lblock'>户 籍 <span class='f_red'></span></td>
			<td class='rblock'>
			<?php echo cmd_hometown(array('type'=>'dist1','name'=>'nationprovinceid','value'=>$_smarty_tpl->tpl_vars['u']->value['nationprovinceid'],'cname'=>'nationcityid','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;<span id='dnationprovinceid' class='f_red'></span>
			<span id="json_nationcityid">
			<?php echo cmd_hometown(array('type'=>'dist2','cname'=>'nationcityid','cvalue'=>$_smarty_tpl->tpl_vars['u']->value['nationcityid'],'pvalue'=>$_smarty_tpl->tpl_vars['u']->value['nationprovinceid'],'text'=>'=请选择='),$_smarty_tpl);?>

			</span>&nbsp;<span id='dnationcityid' class='f_red'></span>
			</td>
		  </tr>
		  <!-- 所在地、交友目的 -->
		  <tr>
			<td class='lblock'>所在地区 <span class='f_red'>*</span></td>
			<td class='rblock'>
			<?php echo cmd_area(array('type'=>'dist1','name'=>'provinceid','value'=>$_smarty_tpl->tpl_vars['u']->value['provinceid'],'ajax'=>'1','cname'=>'cityid','cajax'=>'1','dname'=>'distid','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;<span id='provinceid' class='f_red'></span>
			<span id="json_cityid">
			<?php echo cmd_area(array('type'=>'dist2','pvalue'=>$_smarty_tpl->tpl_vars['u']->value['provinceid'],'cname'=>'cityid','cvalue'=>$_smarty_tpl->tpl_vars['u']->value['cityid'],'cajax'=>'1','dname'=>'distid','dvalue'=>$_smarty_tpl->tpl_vars['u']->value['distid'],'text'=>'=请选择='),$_smarty_tpl);?>

			</span>&nbsp; <span id='dcityid' class='f_red'></span>
			<span id="json_distid">
			<?php echo cmd_area(array('type'=>'dist3','cvalue'=>$_smarty_tpl->tpl_vars['u']->value['cityid'],'dname'=>'distid','dvalue'=>$_smarty_tpl->tpl_vars['u']->value['distid'],'text'=>'=请选择='),$_smarty_tpl);?>

			</span>
			</td>
			<td class='lblock'>交友类别 <span class='f_red'>*</span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'lovesort','type'=>'select','name'=>'lovesort','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['lovesort']),$_smarty_tpl);?>
 <span id='dlovesort' class='f_red'></span></td>
		  </tr>
		  <!-- 个性、民族 -->
		  <tr>
			<td class='lblock'>个 性 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'personality','name'=>'personality','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['personality']),$_smarty_tpl);?>
 <span id="dpersonality"></span></td>
			<td class='lblock'>民 族 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'national','name'=>'national','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['national']),$_smarty_tpl);?>
 <span id='dnational' class='f_red'></span></td>
		  </tr>
		  <!-- 行业、月薪 -->
		  <tr>
			<td class='lblock'>职 业 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'jobs','name'=>'jobs','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['jobs']),$_smarty_tpl);?>
 <span id="djobs"></span></td>
			<td class='lblock'>月薪收入 <span class='f_red'>*</span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'salary','name'=>'salary','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['salary']),$_smarty_tpl);?>
 <span id='dsalary' class='f_red'></span></td>
		  </tr>
		  <!-- 住房、购车 -->
		  <tr>
			<td class='lblock'>住房情况 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'housing','name'=>'housing','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['housing']),$_smarty_tpl);?>
 <span id="dhousing"></span></td>
			<td class='lblock'>购车情况 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'caring','name'=>'caring','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['caring']),$_smarty_tpl);?>
 <span id="dcaring"></span></td>
		  </tr>

		  <tr>
			<td colspan="4" style="padding-top:10px;padding-bottom:10px;"><div class="item_title" style="width:100%"><p>外貌体型</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 体重、外貌自评 -->
		  <tr>
			<td class='lblock'>体 重 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'weight','name'=>'weight','value'=>$_smarty_tpl->tpl_vars['u']->value['weight']),$_smarty_tpl);?>
 公斤</td>
			<td class='lblock'>外貌自评 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'profile','name'=>'profile','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['profile']),$_smarty_tpl);?>
 </td>
		  </tr>
		  <!-- 特征、发型 -->
		  <tr>
			<td class='lblock'>魅力部位 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'charmparts','name'=>'charmparts','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['charmparts']),$_smarty_tpl);?>
 </td>
			<td class='lblock'>发 型 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'hairstyle','name'=>'hairstyle','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['hairstyle']),$_smarty_tpl);?>
 </td>
		  </tr>
		  <!-- 发色、面型 -->
		  <tr>
			<td class='lblock'>发 色 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'haircolor','name'=>'haircolor','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['haircolor']),$_smarty_tpl);?>
 </td>
			<td class='lblock'>脸 型 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'facestyle','name'=>'facestyle','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['facestyle']),$_smarty_tpl);?>
 </td>
		  </tr>
		  <!-- 体型 -->
		  <tr>
			<td class='lblock'>体 型 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'bodystyle','name'=>'bodystyle','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['bodystyle']),$_smarty_tpl);?>
 </td>
		  </tr>
		  <!-- 提交按钮 -->
		  <tr>
			<td class='lblock' height="50px"></td>
			<td class='rblock' colspan="3">				
			<input type="button" name="btn_save" value="提交保存" onclick="return checkbase();" class="button-red" />
			</td>
		  </tr>
	  </table>
	  </form>
	  <!--基本资料 End-->
	  <?php }?>
	  
	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='more'){?> 
	  <!--详细资料 Begin-->
	  <form name="myform" id="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=savemore" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="4" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>工作学习</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 公司类型、收入 -->
		  <tr>
			<td class='lblock' width='15%'>公司类型 <span class='f_red'></span></td>
			<td class='rblock' width="35%"><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'companytype','name'=>'companytype','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['companytype']),$_smarty_tpl);?>
 <span id='dcompanytype' class='f_red'></span></td>
			<td class='lblock' width="15%">收入描述 <span class='f_red'></span></td>
			<td class='rblock' width="35%"><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'income','name'=>'income','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['income']),$_smarty_tpl);?>
 <span id="dincome"></span></td>
		  </tr>
		  <!-- 工作、公司 -->
		  <tr>
			<td class='lblock'>工作状况 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'workstatus','name'=>'workstatus','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['workstatus']),$_smarty_tpl);?>
 <span id="dworkstatus"></span></td>
			<td class='lblock'>公司名称 <span class='f_red'></span></td>
			<td class='rblock'><input type="text" name="companyname" id="companyname" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['companyname'];?>
" class="input-150" /> <span id='dcompanyname' class='f_red'></span></td>
		  </tr>
		  <!-- 学历、专业 -->
		  <tr>
			<td class='lblock'>学 历 <span class='f_red'></span></td>
			<td class='rblock'><font color='#999999'><?php echo cmd_hook(array('mod'=>'var','item'=>'education','type'=>'text','value'=>$_smarty_tpl->tpl_vars['u']->value['education']),$_smarty_tpl);?>
</font> <span id="deducation"></span></td>
			<td class='lblock'>专业类型 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'specialty','name'=>'specialty','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['specialty']),$_smarty_tpl);?>
 <span id='dspecialty' class='f_red'></span></td>
		  </tr>
		  <!-- 学校 -->
		  <tr>
			<td class='lblock'>毕业学校 <span class='f_red'></span></td>
			<td class='rblock'><input type='text' name='school' id='school' class='input-150' value="<?php echo $_smarty_tpl->tpl_vars['u']->value['school'];?>
" /> <span id="dschool"></span></td>
			<td class='lblock'>入学年份 <span class='f_red'></span></td>
			<td class='rblock'><input type='text' name='schoolyear' id='schoolyear' class='input-s' value="<?php echo $_smarty_tpl->tpl_vars['u']->value['schoolyear'];?>
" /> <span id='dschoolyear' class='f_red'></span></td>
		  </tr>
		  <!-- 语言能力 -->
		  <tr>
			<td class='lblock'>语言能力 <span class='f_red'></span></td>
			<td class='rblock' colspan="3" id="em_language_edit">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'language','name'=>'language','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['language']),$_smarty_tpl);?>

			 <span id="dlanguage" class="f_red"></span></td>
		  </tr>

		  <tr>
			<td colspan="4" style="padding-top:10px;padding-bottom:10px;"><div class="item_title" style="width:100%"><p>生活描述</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 排行、消费 -->
		  <tr>
			<td class='lblock'>家中排行 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'tophome','name'=>'tophome','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['tophome']),$_smarty_tpl);?>
 <span id='dtophome' class='f_red'></span></td>
			<td class='lblock'>最大消费 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'consume','name'=>'consume','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['consume']),$_smarty_tpl);?>
 <span id="dconsume"></span></td>
		  </tr>
		  <!-- 吸烟、喝酒 -->
		  <tr>
			<td class='lblock'>是否吸烟  <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'smoking','name'=>'smoking','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['smoking']),$_smarty_tpl);?>
 <span id="dsmoking"></span></td>
			<td class='lblock'>是否喝酒 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'drinking','name'=>'drinking','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['drinking']),$_smarty_tpl);?>
 <span id='ddrinking' class='f_red'></span></td>
		  </tr>
		  <!-- 信仰、锻炼 -->
		  <tr>
			<td class='lblock'>宗教信仰 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'faith','name'=>'faith','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['faith']),$_smarty_tpl);?>
 <span id="dfaith"></span></td>
			<td class='lblock'>锻炼习惯 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'workout','name'=>'workout','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['workout']),$_smarty_tpl);?>
 <span id='dworkout' class='f_red'></span></td>
		  </tr>
		  <!-- 习惯、孩子 -->
		  <tr>
			<td class='lblock'>作息习惯 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'rest','name'=>'rest','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['rest']),$_smarty_tpl);?>
 <span id="drest"></span></td>
			<td class='lblock'>是否要孩子 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'havechildren','name'=>'havechildren','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['havechildren']),$_smarty_tpl);?>
 <span id='dhavechildren' class='f_red'></span></td>
		  </tr>
		  <!-- 同住、浪漫 -->
		  <tr>
			<td class='lblock'>与对方父母同住 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'talive','name'=>'talive','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['talive']),$_smarty_tpl);?>
 <span id="dtalive"></span></td>
			<td class='lblock'>喜欢制造浪漫 <span class='f_red'></span></td>
			<td class='rblock'><?php echo cmd_hook(array('mod'=>'var','type'=>'select','item'=>'romantic','name'=>'romantic','text'=>'=请选择=','value'=>$_smarty_tpl->tpl_vars['u']->value['romantic']),$_smarty_tpl);?>
 <span id="dromantic"></span></td>
		  </tr>
		  <!-- 生活技能 -->
		  <tr>
			<td class='lblock'>生活技能 <span class='f_red'></span></td>
			<td class='rblock' colspan="3" id="em_lifeskill_edit">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'lifeskill','name'=>'lifeskill','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['lifeskill']),$_smarty_tpl);?>

			<span id='dlifeskill' class='f_red'></span></td>
		  </tr>
		  <tr>
			<td colspan="4" style="padding-top:10px;padding-bottom:10px;"><div class="item_title" style="width:100%"><p>兴趣爱好</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 喜欢的运动 -->
		  <tr>
			<td class='lblock'>喜欢的运动 <span class='f_red'></span></td>
			<td class='rblock' id="em_sports_edit" colspan="3">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'sports','name'=>'sports','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['sports']),$_smarty_tpl);?>

			 <span id='dsports' class='f_red'></span></td>
		  </tr>
		  <!-- 喜欢的食物 -->
		  <tr>
			<td class='lblock'>喜欢的食物 <span class='f_red'></span></td>
			<td class='rblock' id="em_food_edit" colspan="3">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'food','name'=>'food','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['food']),$_smarty_tpl);?>

			 <span id='dfood' class='f_red'></span></td>
		  </tr>
		  <!-- 喜欢的书籍 -->
		  <tr>
			<td class='lblock'>喜欢的书籍 <span class='f_red'></span></td>
			<td class='rblock' id="em_book_edit" colspan="3">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'book','name'=>'book','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['book']),$_smarty_tpl);?>

			 <span id='dbook' class='f_red'></span></td>
		  </tr>
		  <!-- 喜欢的电影 -->
		  <tr>
			<td class='lblock'>喜欢的电影 <span class='f_red'></span></td>
			<td class='rblock' id="em_film_edit" colspan="3">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'film','name'=>'film','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['film']),$_smarty_tpl);?>

			<span id='dfilm' class='f_red'></span></td>
		  </tr>
		  <!-- 业余爱好 -->
		  <tr>
			<td class='lblock'>业余爱好 <span class='f_red'></span></td>
			<td class='rblock' id="em_interest_edit" colspan="3">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'interest','name'=>'interest','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['interest']),$_smarty_tpl);?>

			 <span id='dinterest' class='f_red'></span></td>
		  </tr>
		  <!-- 喜欢的旅游 -->
		  <tr>
			<td class='lblock'>喜欢的旅游 <span class='f_red'></span></td>
			<td class='rblock' id="em_travel_edit"  colspan="3">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'travel','name'=>'travel','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['travel']),$_smarty_tpl);?>

			<span id='dtravel' class='f_red'></span></td>
		  </tr>
		  <!-- 关注的节目 -->
		  <tr>
			<td class='lblock'>关注的节目 <span class='f_red'></span></td>
			<td class='rblock' id="em_attention_edit" colspan="3">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'attention','name'=>'attention','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['attention']),$_smarty_tpl);?>

			<span id='dattention' class='f_red'></span></td>
		  </tr>
		  <!-- 娱乐休闲 -->
		  <tr>
			<td class='lblock'>娱乐休闲 <span class='f_red'></span></td>
			<td class='rblock' id="em_leisure_edit"  colspan="3">
			<?php echo cmd_hook(array('mod'=>'var','item'=>'leisure','name'=>'leisure','type'=>'checkbox','maxnum'=>$_smarty_tpl->tpl_vars['config']->value['maxnum'],'value'=>$_smarty_tpl->tpl_vars['u']->value['leisure']),$_smarty_tpl);?>

			 <span id='dleisure' class='f_red'></span></td>
		  </tr>
		  <!-- 提交按钮 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock' colspan="3">
			<input type="submit" name="btn_save" value="提交保存" class="button-red" />
			</td>
		  </tr>
	  </table>
	  </form>
	  <!--详细资料 End-->
      <?php }?>

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='monolog'){?>
	  <!--内心独白 Begin-->
	  <form name="myform" id="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=savemonolog" method="post">
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td class="lblock" width="15%">状 态</td>
			<td class="rblock" width="85%">
			<?php if ($_smarty_tpl->tpl_vars['u']->value['molstatus']=='1'){?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/ok.gif" /> <font color="green">审核通过</font>
			<?php }elseif($_smarty_tpl->tpl_vars['u']->value['molstatus']=='-2'){?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['uctplpath']->value;?>
images/icn_time.gif" /> <font color="gray">审核中</font> 
			<?php }elseif($_smarty_tpl->tpl_vars['u']->value['molstatus']=='-1'){?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['uctplpath']->value;?>
images/cuo.gif" /> <font color="red">未通过审核</font> 
			<?php }else{ ?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['ucpath']->value;?>
images/no.gif"> <font color="#999999">锁定</font>
			<?php }?>
			</td>
		  </tr>
		  <!-- 独白 -->
		  <tr>
			<td class='lblock'>内心独白 <span class='f_red'>*</span></td>
			<td class='rblock'>
			<textarea name='content' id='content' style='width:98%;height:200px;display:;overflow:auto;' onkeydown="count_char('content', 'counter');" onkeyup="count_char('content', 'counter');"><?php echo $_smarty_tpl->tpl_vars['u']->value['monolog'];?>
</textarea>
			<br /><span id="dcontent" class="f_red"></span>
			</td>
		  </tr>
		  <!-- 字数统计 -->
		  <tr>
			<td class="lblock"></td>
			<td class="rblock">限<?php echo $_smarty_tpl->tpl_vars['config']->value['molminlen'];?>
 ~ <?php echo $_smarty_tpl->tpl_vars['config']->value['molmaxlen'];?>
个字，目前已输入<strong id="counter"></strong>个。</td>
		  </tr>
		  <tr>
			<td class="lblock"></td>
			<td class="rblock">
			<input type="button" name="btn_save" value="提交保存" onclick="return checkmonolog();" class="button-red" />
			</td>
		  </tr>
		  <!-- 温馨提示 -->
		  <tr>
			<td class="rblock" colspan="2" align="left">
			温馨提示：<br />1、内心独白字数需在<?php echo $_smarty_tpl->tpl_vars['config']->value['molminlen'];?>
 ~ <?php echo $_smarty_tpl->tpl_vars['config']->value['molmaxlen'];?>
个字之内；<br />2、内心独白中请勿出现QQ、微信、电话号码以及网址、广告、色情或其他不健康的内容；<br />3、修改保存后，我们将进行审核，通过了才能显示在个人资料页面。
			</td>
		  </tr>
	  </table>
	  </form>
	  <!--内心独白 End-->
	  <?php }?>

	  <?php if ($_smarty_tpl->tpl_vars['a']->value=='contact'){?> 
	  <!-- 联系资料 Begin-->
	  <form name="myform" id="myform" action="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile" method="post">
	  <input type='hidden' name='a' id='a' value='savecontact' />
	  <table cellpadding='0' cellspacing='0' border='0' width="98%" class="user-table table-margin lh35">
		  <tr>
			<td colspan="2" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>联系方式</p><span class="shadow"></span></div></td>
		  </tr>
		  <!-- 查看权限 -->
		  <tr style="display:;">
			<td class='lblock' width='25%'>查看权限 <span class='f_red'></span></td>
			<td class='rblock' width='75%'><input type="radio" name="privacy" id="privacy" value="1"<?php if ($_smarty_tpl->tpl_vars['u']->value['privacy']==1){?> checked<?php }?> />任何人可见&nbsp;&nbsp;<input type="radio" name="privacy" id="privacy" value="4"<?php if ($_smarty_tpl->tpl_vars['u']->value['privacy']==4){?> checked<?php }?> />保密&nbsp;&nbsp; <span id='dprivacy' class='f_red'></span></td>
		  </tr>
		  <!-- 手机号码 -->
		  <tr>
			<td class='lblock'><font color='red'>*</font>手机号 <span class='f_red'></span></td>
			<td class='rblock' colspan="3">
			<input type='hidden' name='mobilerz' id='mobilerz' value='<?php echo $_smarty_tpl->tpl_vars['u']->value['mobilerz'];?>
' />
			<input type="text" name="mobile" id="mobile" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['mobile'];?>
" maxlength='11' class="input-150"<?php if ($_smarty_tpl->tpl_vars['u']->value['mobilerz']==1&&!empty($_smarty_tpl->tpl_vars['u']->value['mobile'])){?> readonly='only'<?php }else{ ?>  onblur="ajax_usermobile('mobile', 'tips_mobile');"<?php }?> /> 
			
			<?php if ($_smarty_tpl->tpl_vars['u']->value['mobilerz']==1){?>
			<font color='green'>已通过认证，不能更改。</font>
			<?php }?>
			<span id='dmobile' class='f_red'></span>
			<span id="tips_mobile">(手机号码和QQ号码至少填写一项)</span>
			</td>
		  </tr>
		  <!-- QQ -->
		  <tr>
			<td class='lblock'><font color='red'>*</font>QQ号 <span class='f_red'></span></td>
			<td class='rblock' colspan="3">

			<input type="text" name="qq" id="qq" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['qq'];?>
" class="input-150" maxlength='11'<?php if ($_smarty_tpl->tpl_vars['u']->value['qqrz']==1&&!empty($_smarty_tpl->tpl_vars['u']->value['qq'])){?> readonly='only'<?php }else{ ?>   onblur="ajax_userqq('qq', 'tips_qq');"<?php }?> /> 
			<?php if ($_smarty_tpl->tpl_vars['u']->value['qqrz']==1){?>
			<font color='green'>已通过认证，不能更改。</font>
			<?php }?>
			<span id='dqq' class='f_red'></span>  
			<span id="tips_qq">(手机号码和QQ号码至少填写一项)</span>
			
			</td>
		  </tr>
		  <!-- 联系电话 -->
		  <tr>
			<td class='lblock'>电话 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="telephone" id="telephone" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['telephone'];?>
" class="input-100" /> <span id='dtelephone' class='f_red'></span></td>
		  </tr>

		  <!--  MSN -->
		  <tr>
			<td class='lblock'>微信 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="msn" id="msn" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['msn'];?>
" class="input-txt" /> <span id='dmsn' class='f_red'></span></td>
		  </tr>
		  <!-- 个人博客/微博 -->
		  <tr>
			<td class='lblock'>个人博客/微博 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="homepage" id="homepage" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['homepage'];?>
" class="input-txt" /> <span id='dhomepage' class='f_red'></span></td>
		  </tr>
		  <!-- 联系地址 -->
		  <tr>
			<td class='lblock'>联系地址 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="address" id="address" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['address'];?>
" class="input-txt" /> <span id='daddress' class='f_red'></span> </td>
		  </tr>
		  <!-- 邮政编码 -->
		  <tr>
			<td class='lblock'>邮政编码 <span class='f_red'></span></td>
			<td class='rblock' colspan="3"><input type="text" name="zipcode" id="zipcode" value="<?php echo $_smarty_tpl->tpl_vars['u']->value['zipcode'];?>
" class="input-s" /> <span id='dzipcode' class='f_red'></span> </td>
		  </tr>
		  <!-- 提交按钮 -->
		  <tr>
			<td class='lblock'></td>
			<td class='rblock' height="45">
			<input type="button" name="btn_save" value="提交保存" onclick="return checkcontact();" class="button-red" />
			</td>
		  </tr>
	  </table>
	  </form>

		<script language="javascript">
		function checkcontact(){
			var mobile = $('#mobile').val();
			var qq = $('#qq').val();

			if (mobile == '' && qq == '') {
				//alert('手机号码或者QQ至少填写一项');
				$.dialog.tips("手机号码或者QQ至少填写一项", 3);
				return false;
			}
			else {
				if (mobile != '') {
					<?php if ($_smarty_tpl->tpl_vars['config']->value['cancelcheckmobile']=='1'){?>
					<?php }else{ ?>
					if (!isMobile(mobile)) {
						//alert('手机号码不正确！');
						$.dialog.tips("手机号码不正确！", 3);
						return false;
					}
					<?php }?>
				}
				if (qq != '') {
					if (!isQQ(qq)) {
						//alert('QQ号码格式不正确，请填写5-11位数字');
						$.dialog.tips("QQ号码格式不正确，请填写5-11位数字", 3);
						return false;
					}
				}
			}
			$('#myform').submit();
			return true;
		}
		</script>
	  <!-- 联系资料 End-->
	  <?php }?>


	</div>
	<div class="clear"></div>
	<!--//div_smallnav_content_hover End-->
  </div>
  <div class="clear"></div>
  <!--//main_right End-->
  
  <div class="right_kj" id="kj_box">
    <ul>
	  <li id="jbzl"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile">基本资料</a></li>
	  <li id="xxzl"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=more">详细资料</a></li>
	  <li id="nxdb"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=monolog">内心独白</a></li>
	  <li id="lxzl"><a href="<?php echo $_smarty_tpl->tpl_vars['ucfile']->value;?>
?c=profile&a=contact">联系资料</a></li>
    </ul>
  </div>
  <div style="margin: 30px;"></div>
  <!--//right_kj End-->
  
</div>
<!--//user_main End-->

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<script type="text/javascript">
//基本资料
function checkbase() {
	var t = "";
	var v = "";

	//所在地区
	t = "provinceid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所在地区", t);
		return false;
	}
	//所在地区
	t = "cityid";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择所在地区", t);
		return false;
	}

	//交友类型
	t = "lovesort";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择交友类别", t);
		return false;
	}

	//月薪
	t = "salary";
	v = $("#"+t).val();
	if(v=="") {
		dmsg("请选择月薪收入", t);
		return false;
	}
	
	$('#myform').submit();
	return true;
}

//内心独白
function checkmonolog() {
	var t = "";
	var v = "";

	//内心独白
	t = 'content';
	v = $('#'+t).val();
	if (v == '') {
		dmsg("内心独白不能为空", t);
		return false;
	}
	else {
		if (strQuantity(v)<<?php echo $_smarty_tpl->tpl_vars['config']->value['molminlen'];?>
 || strQuantity(v)><?php echo $_smarty_tpl->tpl_vars['config']->value['molmaxlen'];?>
) {
			dmsg("内心独白字数必须在<?php echo $_smarty_tpl->tpl_vars['config']->value['molminlen'];?>
~<?php echo $_smarty_tpl->tpl_vars['config']->value['molmaxlen'];?>
个字之间", t);
			$('#'+t).focus();
			return false;
		}
	}

	$('#myform').submit();
	return true;
}

<?php if ($_smarty_tpl->tpl_vars['a']->value=='monolog'||$_smarty_tpl->tpl_vars['a']->value=='reg'){?> 
$(function(){
	var text = $("#content").val();
	$("#counter").html(strQuantity(text));
});
<?php }?>

</script><?php }} ?>