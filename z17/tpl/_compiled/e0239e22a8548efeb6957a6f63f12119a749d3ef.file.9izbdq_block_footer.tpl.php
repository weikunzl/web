<?php /* Smarty version Smarty-3.1.14, created on 2014-03-27 14:30:29
         compiled from "C:\svn\z17\tpl\templets\default\9izbdq_block_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276355333c585b1d5d4-23418456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0239e22a8548efeb6957a6f63f12119a749d3ef' => 
    array (
      0 => 'C:\\svn\\z17\\tpl\\templets\\default\\9izbdq_block_footer.tpl',
      1 => 1378698142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276355333c585b1d5d4-23418456',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'abouttip' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'config' => 0,
    'copyright_poweredby' => 0,
    'login' => 0,
    'uctplpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5333c585b77433_94731884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333c585b77433_94731884')) {function content_5333c585b77433_94731884($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include 'C:\\svn\\z17\\source\\core\\smarty\\plugins\\modifier.stripslashes.php';
?><div id="footer">
  <div class="copyright">
    <p class="links">
	<?php $_smarty_tpl->tpl_vars['abouttip'] = new Smarty_variable(vo_list("mod={about} where={v.navshow='1'} num={6}"), null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['volist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['volist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['abouttip']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['volist']->key => $_smarty_tpl->tpl_vars['volist']->value){
$_smarty_tpl->tpl_vars['volist']->_loop = true;
?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['volist']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['volist']->value['title'];?>
</a> - 
	<?php } ?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['urlpath']->value;?>
index.php">返回首页</a>
	</p>
    <p class="cr">
	<?php echo $_smarty_tpl->tpl_vars['config']->value['sitefooter'];?>

	<?php if (!empty($_smarty_tpl->tpl_vars['config']->value['icpcode'])){?>
	&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['config']->value['icpcode'];?>

	<?php }?>
	<?php if (!empty($_smarty_tpl->tpl_vars['config']->value['tjcode'])){?>
	&nbsp;&nbsp;<?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['config']->value['tjcode']);?>

	<?php }?>

	<?php echo $_smarty_tpl->tpl_vars['copyright_poweredby']->value;?>

	</p>
	<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('plugin_runtime'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['pluginevent'] = new Smarty_variable(XHook::doAction('event_online'), null, 0);?>
  </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['login']->value['status']=='1'){?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['uctplpath']->value)."block_popwin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<script type='text/javascript'>
//WAP提醒
$(function(){
    var x = 10;  
    var y = 20;
    $("a.waptips").mouseover(function(e){
           this.myTitle = this.title;
        this.title = "";    
        var tooltip = "<div id='waptips'>"+ this.myTitle +"<\/div>"; //创建 div 元素
        $("body").append(tooltip);    //把它追加到文档中
        $("#waptips")
            .css({
                "top": (e.pageY+y) + "px",
                "left": (e.pageX+x)  + "px"
            }).show("fast");      //设置x坐标和y坐标，并且显示
    }).mouseout(function(){        
        this.title = this.myTitle;
        $("#waptips").remove();   //移除 
    }).mousemove(function(e){
        $("#waptips")
            .css({
                "top": (e.pageY+y) + "px",
                "left": (e.pageX+x)  + "px"
            });
    });
})
</script><?php }} ?>