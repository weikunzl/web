<?php /* Smarty version Smarty-3.1.14, created on 2014-04-21 16:21:59
         compiled from "C:\svn\z17z17\web\z17\tpl\templets\default\9izbdq_block_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73735354cd70197a16-91822215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdcbf3730add9f7974cff50ee449d5820d133ae3' => 
    array (
      0 => 'C:\\svn\\z17z17\\web\\z17\\tpl\\templets\\default\\9izbdq_block_footer.tpl',
      1 => 1398068515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73735354cd70197a16-91822215',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5354cd702215f7_96963450',
  'variables' => 
  array (
    'abouttip' => 0,
    'volist' => 0,
    'urlpath' => 0,
    'config' => 0,
    'copyright_poweredby' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5354cd702215f7_96963450')) {function content_5354cd702215f7_96963450($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include 'C:\\svn\\z17z17\\web\\z17\\source\\core\\smarty\\plugins\\modifier.stripslashes.php';
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