<?php /* Smarty version Smarty-3.1.14, created on 2014-03-24 12:18:03
         compiled from "C:\Users\wangkai\Desktop\OElove_Free_v3.2.R40126_For_php5.2\upload\tpl\wap\block_headinc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26266532fb1fb052f57-66033609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a12c7233359762c99271df0880b2daff0e2071e1' => 
    array (
      0 => 'C:\\Users\\wangkai\\Desktop\\OElove_Free_v3.2.R40126_For_php5.2\\upload\\tpl\\wap\\block_headinc.tpl',
      1 => 1352770445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26266532fb1fb052f57-66033609',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'xmlhead' => 0,
    'page_title' => 0,
    'page_keyword' => 0,
    'page_description' => 0,
    'wapskin' => 0,
    'skinid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_532fb1fb0b3d73_46512759',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532fb1fb0b3d73_46512759')) {function content_532fb1fb0b3d73_46512759($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['xmlhead']->value;?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=1.0" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['page_keyword']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['page_description']->value;?>
" />
<link href="<?php echo $_smarty_tpl->tpl_vars['wapskin']->value;?>
style/style<?php echo $_smarty_tpl->tpl_vars['skinid']->value;?>
.css"  rel="stylesheet" type="text/css" />
</head>
<body><?php }} ?>