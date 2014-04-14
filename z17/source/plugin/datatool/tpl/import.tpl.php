<?php
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
?>

<h3 class="title"><a href="<?php echo __ADMIN_FILE__;?>?c=plugin&a=setting&plugin_id=datatool" class="btn-general"><span>数据备份</span></a>数据恢复</h3>
<div class="search-area ">
  <div class="item">
本功能在恢复备份数据的同时，将覆盖原有数据，请确定是否需要恢复，以免造成数据损失；<br />
数据恢复功能只能恢复由当前版本导出的数据文件，其他软件导出格式可能无法识别；<br />
如果备份文件太大需要一些时间导入，请耐心等待直到程序提示全部导入完成；<br />
<font color="green"><b>背景色相同的文件为同一次备份的文件，导入时只需要点导入任意一个文件，程序会自动导入剩余文件。</b></font><br />
  </div>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" align="center">
  <thead class="tb-tit-bg">
  <tr>
	<th width="12%"><div class="th-gap">ID</div></th>
	<th width="30%"><div class="th-gap">文件名</div></th>
	<th width="15%"><div class="th-gap">文件大小</div></th>
	<th width="20%"><div class="th-gap">备份时间</div></th>
	<th width="10%"><div class="th-gap">卷号</div></th>
	<th><div class="th-gap">操作</div></th>
  </tr>
  </thead>
  <tfoot class="tb-foot-bg"></tfoot>
  <?php
  if (is_array($data)) {
  foreach ($data as $key=>$value){
  ?>
  <tr bgcolor="<?php echo $value['bgcolor'];?>">
	<td align="center"><?php echo ($key+1);?></td>
	<td align="left"><a href="<?php __ADMIN_FILE__;?>?c=plugin&plugin_id=datatool&a=save&do=down&filename=<?php echo $value['filename'];?>"><?php echo $value['filename'];?></a></td>
	<td align="center"><?php echo $value['filesize'];?></td>
	<td align="left"><?php echo $value['maketime'];?></td>
	<td align="center"><?php echo $value['number'];?></td>
	<td align="center">
	<a href="<?php echo __ADMIN_FILE__;?>?c=plugin&plugin_id=datatool&a=save&do=restore&pre=<?php echo $value['pre'];?>">导入</a> | 
	<a href="<?php echo __ADMIN_FILE__;?>?c=plugin&plugin_id=datatool&a=save&do=del&filename=<?php echo $value['filename'];?>" onClick="{if(confirm('确定要删除该备份文件吗？一旦删除不可恢复！')){return true;} return false;}">删除</a> | 
	<a href="<?php echo __ADMIN_FILE__;?>?c=plugin&plugin_id=datatool&a=save&do=down&filename=<?php echo $value['filename'];?>">下载</a>
    </td>
  </tr>
  <?php
   }
   }
  ?>
</table>


<?php 
if(is_array($infos)){
	foreach($infos as $id => $info){
$id++;
?>
  <tr bgcolor="<?=$info['bgcolor']?>"  align="center">
    <td><input type="checkbox" name="filenames[]" value="<?=$info['filename']?>"></td>
    <td><?=$id?></td>
    <td class="px10" align="left">&nbsp;<a href="./data/<?=$info['filename']?>"><?=$info['filename']?></a></td>
    <td class="px10"><?=$info['filesize']?> M</td>
	<td class="px10"><?=$info['maketime']?></td>
    <td class="px10"><?=$info['number']?></td>
    <td>
	<a href="?action=<?=$action?>&pre=<?=$info['pre']?>&dosubmit=1">导入</a> | 
	<a href="?action=delete&filenames=<?=$info['filename']?>">删除</a> | 
	<a href="?action=down&filename=<?=$info['filename']?>">下载</a>
	</td>
</tr>
<?php 
	}
}
?>