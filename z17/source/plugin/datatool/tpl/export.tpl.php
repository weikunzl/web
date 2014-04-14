<?php
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
?>
<h3 class="title"><a href="<?php echo __ADMIN_FILE__;?>?c=plugin&a=setting&plugin_id=datatool&do=import" class="btn-general"><span>数据恢复</span></a>数据备份</h3>
<div class="search-area ">
  <div class="item">
	您可以根据自己的需要选择需要备份的数据库表，导出的数据文件可用“数据恢复”功能；<br />
	为了数据安全，备份文件采用时间戳命名保存，如果备份数据超过设定的大小程序会自动采用分卷备份功能，请耐心等待直到程序提示全部备份完成；<br />
	附件的备份只需手工转移附件目录和文件即可，风格备份也相同；<br />
  </div>
</div>
<form action="<?php echo __ADMIN_FILE__;?>?c=plugin&plugin_id=datatool&a=save&do=export" method="post" name="myform" id="myform" style="margin:0">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
  <thead class="tb-tit-bg">
  <tr>
	<th width="12%"><div class="th-gap">选择</div></th>
	<th width="12%"><div class="th-gap">ID</div></th>
	<th width="20%"><div class="th-gap">表名称</div></th>
	<th width="10%"><div class="th-gap">表类型</div></th>
	<th width="10%"><div class="th-gap">记录总数</div></th>
	<th width="10%"><div class="th-gap">表大小</div></th>
	<th width="10%"><div class="th-gap">表状态</div></th>
	<th><div class="th-gap">表编码</div></th>
  </tr>
  </thead>
  <tfoot class="tb-foot-bg"></tfoot>
  <?php
  foreach ($data as $key=>$value){
  ?>
  <tr onMouseOver="overColor(this)" onMouseOut="outColor(this)">
	<td align="center"><input name="tables[]" type="checkbox" checked value="<?php echo $value['table'];?>" onClick="checkItem(this, 'chkAll')"></td>
	<td align="center"><?php echo $value['i'];?></td>
	<td align="left"><?php echo $value['table'];?></td>
	<td align="left"><?php echo $value['type'];?></td>
	<td align="center"><?php echo $value['dbnum'];?></td>
	<td align="center"><?php echo $value['dbsize'];?></td>
	<td align="center"><?php echo $value['status'];?></td>
	<td><?php echo $value['charset'];?></td>
  </tr>
  <?php
   }
  ?>
  <tr>
	<td align="center"><input name="chkAll" type="checkbox" id="chkAll" onClick="checkAll(this, 'tables[]')" value="checkbox">全选</td>
	<td class="hback" colspan="7">共<b><?php echo $dbnums;?></b>张表，数据库大小为：<?php echo $dbsize;?></td>
  </tr>
  <tr>
	<td align="center"><b>分卷备份-&gt;&gt;</b></td>
	<td class="hback" colspan="7">每个分卷文件大小为：<input type="text" name="sizelimit" value="<?php echo $maxsize;?>" class="input-s" />KB &nbsp;&nbsp;
	<font color="#999999">(您的分卷最大值不能超过 <?php echo $maxsize;?> KB)</font>
	
	<br /><input class="button" name="btn_do" type="button" value="提交备份" onClick="{if(confirm('确定要备份选择的数据表吗？')){$('#myform').submit();return true;}return false;}" class="button"></td>
  </tr>
</table>
</form>
