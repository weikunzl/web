<?php /* Smarty version Smarty-3.1.14, created on 2014-03-27 14:30:28
         compiled from "C:\svn\z17\tpl\templets\default\9izbdq_block_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23495333c584e13e12-77179429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b0d75feb74eb2d0c55bc7b55ce3358ca38b2497' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\templets\\default\\9izbdq_block_search.tpl',
      1 => 1390719840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23495333c584e13e12-77179429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urlpath' => 0,
    's_sex' => 0,
    's_dist1' => 0,
    's_dist2' => 0,
    's_dist3' => 0,
    's_marry' => 0,
    's_avatar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5333c584eed139_66635490',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333c584eed139_66635490')) {function content_5333c584eed139_66635490($_smarty_tpl) {?>    <div class="n_search_top">
      <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=user&a=list" id="search_normal">
        <div class="search_in">
          找:
		  <select name='s_sex' id='s_sex'>
		  <option value='0'>=不限=</option>
		  <option value='2'<?php if ($_smarty_tpl->tpl_vars['s_sex']->value==2){?> selected<?php }?>>女会员</option>
		  <option value='1'<?php if ($_smarty_tpl->tpl_vars['s_sex']->value==1){?> selected<?php }?>>男会员</option>
		  </select>
          &nbsp;年龄:
          <?php echo cmd_hook(array('mod'=>'age','name'=>'s_sage','text'=>'不限'),$_smarty_tpl);?>

          <span>~</span>
          <?php echo cmd_hook(array('mod'=>'age','name'=>'s_eage','text'=>'不限'),$_smarty_tpl);?>

          &nbsp;地区:
          <?php echo cmd_area(array('type'=>'dist1','name'=>'s_dist1','value'=>$_smarty_tpl->tpl_vars['s_dist1']->value,'ajax'=>'1','cname'=>'s_dist2','cajax'=>'1','dname'=>'s_dist3','text'=>'=请选择='),$_smarty_tpl);?>
&nbsp;
		  <span id="json_s_dist2">
			<?php if ($_smarty_tpl->tpl_vars['s_dist1']->value>0){?>
			<?php echo cmd_area(array('type'=>'dist2','pvalue'=>$_smarty_tpl->tpl_vars['s_dist1']->value,'cname'=>'s_dist2','cvalue'=>$_smarty_tpl->tpl_vars['s_dist2']->value,'cajax'=>'1','dname'=>'s_dist3','dvalue'=>$_smarty_tpl->tpl_vars['s_dist3']->value,'text'=>'=不限='),$_smarty_tpl);?>

			<?php }else{ ?>
			  <select name="s_dist2" id="s_dist2"><option value="0">=请选择=</option></select>
			<?php }?>
		  </span>&nbsp;
		  <span id="json_s_dist3">
		  <?php if ($_smarty_tpl->tpl_vars['s_dist2']->value>0){?>
		  <?php echo cmd_area(array('type'=>'dist3','cvalue'=>$_smarty_tpl->tpl_vars['s_dist2']->value,'dname'=>'s_dist3','dvalue'=>$_smarty_tpl->tpl_vars['s_dist3']->value,'text'=>'=不限='),$_smarty_tpl);?>

		  <?php }else{ ?>
		  <select name="s_dist3" id="s_dist3"><option value="0">=请选择=</option></select>
		  <?php }?>
		  </span>&nbsp;
		  婚史:<?php echo cmd_hook(array('mod'=>'var','item'=>'marrystatus','type'=>'select','name'=>'s_marry','text'=>'=不限=','value'=>$_smarty_tpl->tpl_vars['s_marry']->value),$_smarty_tpl);?>
&nbsp;
          <input type="checkbox" value="1" name="s_avatar" id="s_avatar"<?php if ($_smarty_tpl->tpl_vars['s_avatar']->value==1){?> checked<?php }?> />
          <label for="s_p_img">有头像</label>
          &nbsp;&nbsp;
		  <input type="submit" value="" name="btn_search" id="btn_search" class="n_search_btn" />&nbsp;
		  <input type="button" value="" name="btn_advsearch" id="btn_advsearch" class="n_advsearch_btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php?c=user&a=advsearch';" />
		  &nbsp;&nbsp;
		  </div>
      </form>
    </div><?php }} ?>