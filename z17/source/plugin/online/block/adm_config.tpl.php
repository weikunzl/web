<?php
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
?>
<h3 class="title"><a href="<?php echo __ADMIN_FILE__;?>?c=plugin&plugin_id=online&a=setting&do=preview" class="btn-general" target="_blank"><span>预览效果</span></a><a href="<?php echo __ADMIN_FILE__;?>?c=plugin&plugin_id=online&a=setting&do=list" class="btn-general"><span>添加客服</span></a>在线客服配置</h3>
<form name="myform" id="myform" method="post" action="<?php __ADMIN_FILE__;?>?c=plugin&a=save&plugin_id=online&do=savesetting" />
<table cellpadding='1' cellspacing='1' class='tab'>
  <tr>
	<td class='hback_1' width="15%">在线客服位置：<span class='f_red'></span></td>
	<td class='hback' width="85%">
	<input type='radio' name="type" value="1"<?php if ($data['type']=='1') echo " checked";?> />页面左侧浮动，
	<input type='radio' name="type" value="2"<?php if ($data['type']=='2') echo " checked";?> />页面右侧浮动，
	<input type='radio' name="type" value="0"<?php if ($data['type']=='0') echo " checked";?> />关闭在线客服
	</td>
  </tr>

  <tr>
	<td class='hback_1'>左侧浮动位置：<span class='f_red'></span></td>
	<td class='hback'>
	距离浏览器左边：<input type="text" name="left_leftpr" class="input-s" value="<?php echo $data['left_leftpr'];?>" />像素，距离浏览器顶部：<input type="text" name="left_toppr" class="input-s" value="<?php echo $data['left_toppr'];?>" />像素
	</td>
  </tr>
  <tr>
	<td class='hback_1'>右侧浮动位置：<span class='f_red'></span></td>
	<td class='hback'>
	距离浏览器右边：<input type="text" name="right_rightpr" class="input-s" value="<?php echo $data['right_rightpr'];?>" />像素，距离浏览器顶部：<input type="text" name="right_toppr" class="input-s" value="<?php echo $data['right_toppr'];?>" />像素
	</td>
  </tr>
  <tr>
	<td class='hback_1'>提示设置：<span class='f_red'></span></td>
	<td class='hback'>标题：<input type="text" name="title" id="title" value="<?php echo $data['title'];?>" class="input-100" />关闭浮动提示：<input type="text" name="close" id="close" value="<?php echo $data['close'];?>" class="input-s" /></td>
  </tr>
  <tr>
	<td class='hback_1'>在线客服风格：<span class='f_red'></span></td>
	<td class='hback'>
	<select name="skin" id="skin">
	<option value="1"<?php if ($data['skin'] == '1') echo ' selected';?>>风格一</option>
	<option value="2"<?php if ($data['skin'] == '2') echo ' selected';?>>风格二</option>
	<option value="3"<?php if ($data['skin'] == '3') echo ' selected';?>>风格三</option>
	<option value="4"<?php if ($data['skin'] == '4') echo ' selected';?>>风格四</option>
	</select>
	<select name="color" id="color">
	<option value="1"<?php if ($data['color'] == '1') echo ' selected';?>>浅蓝</option>
	<option value="2"<?php if ($data['color'] == '2') echo ' selected';?>>淡红</option>
	<option value="3"<?php if ($data['color'] == '3') echo ' selected';?>>紫色</option>
	<option value="4"<?php if ($data['color'] == '4') echo ' selected';?>>绿色</option>
	<option value="5"<?php if ($data['color'] == '5') echo ' selected';?>>灰色</option>
	</select>
	</td>
  </tr>
  <tr>
	<td class='hback_1'>QQ图标：<span class='f_red'></span></td>
	<td class='hback'>
	<select name="qqicon" id="qqicon">
	<option value="1"<?php if ($data['qqicon'] == '1') echo ' selected';?>>图标1</option>
	<option value="2"<?php if ($data['qqicon'] == '2') echo ' selected';?>>图标2</option>
	<option value="3"<?php if ($data['qqicon'] == '3') echo ' selected';?>>图标3</option>
	<option value="4"<?php if ($data['qqicon'] == '4') echo ' selected';?>>图标4</option>
	<option value="5"<?php if ($data['qqicon'] == '5') echo ' selected';?>>图标5</option>
	<option value="6"<?php if ($data['qqicon'] == '6') echo ' selected';?>>图标6</option>
	<option value="7"<?php if ($data['qqicon'] == '7') echo ' selected';?>>图标7</option>
	<option value="8"<?php if ($data['qqicon'] == '8') echo ' selected';?>>图标8</option>
	<option value="9"<?php if ($data['qqicon'] == '9') echo ' selected';?>>图标9</option>
	<option value="10"<?php if ($data['qqicon'] == '10') echo ' selected';?>>图标10</option>
	<option value="11"<?php if ($data['qqicon'] == '11') echo ' selected';?>>图标11</option>
	<option value="12"<?php if ($data['qqicon'] == '12') echo ' selected';?>>图标12</option>
	<option value="13"<?php if ($data['qqicon'] == '13') echo ' selected';?>>图标13</option>
	</select>
	</td>
  </tr>
  <tr>
	<td class='hback_1'>MSN图标：<span class='f_red'></span></td>
	<td class='hback'>
	<select name="msnicon" id="msnicon">
	<option value="1"<?php if ($data['msnicon'] == '1') echo ' selected';?>>图标1</option>
	<option value="2"<?php if ($data['msnicon'] == '2') echo ' selected';?>>图标2</option>
	<option value="3"<?php if ($data['msnicon'] == '3') echo ' selected';?>>图标3</option>
	<option value="4"<?php if ($data['msnicon'] == '4') echo ' selected';?>>图标4</option>
	<option value="5"<?php if ($data['msnicon'] == '5') echo ' selected';?>>图标5</option>
	<option value="6"<?php if ($data['msnicon'] == '6') echo ' selected';?>>图标6</option>
	<option value="7"<?php if ($data['msnicon'] == '7') echo ' selected';?>>图标7</option>
	<option value="8"<?php if ($data['msnicon'] == '8') echo ' selected';?>>图标8</option>
	<option value="9"<?php if ($data['msnicon'] == '9') echo ' selected';?>>图标9</option>
	<option value="10"<?php if ($data['msnicon'] == '10') echo ' selected';?>>图标10</option>
	<option value="11"<?php if ($data['msnicon'] == '11') echo ' selected';?>>图标11</option>
	<option value="12"<?php if ($data['msnicon'] == '12') echo ' selected';?>>图标12</option>
	<option value="13"<?php if ($data['msnicon'] == '13') echo ' selected';?>>图标13</option>
	</select>
	</td>
  </tr>
  <tr>
	<td class='hback_1'>SKYPE图标：<span class='f_red'></span></td>
	<td class='hback'>
	<select name="skypeicon" id="skypeicon">
	<option value="1"<?php if ($data['skypeicon'] == '1') echo ' selected';?>>图标1</option>
	<option value="2"<?php if ($data['skypeicon'] == '2') echo ' selected';?>>图标2</option>
	<option value="3"<?php if ($data['skypeicon'] == '3') echo ' selected';?>>图标3</option>
	<option value="4"<?php if ($data['skypeicon'] == '4') echo ' selected';?>>图标4</option>
	<option value="5"<?php if ($data['skypeicon'] == '5') echo ' selected';?>>图标5</option>
	<option value="6"<?php if ($data['skypeicon'] == '6') echo ' selected';?>>图标6</option>
	<option value="7"<?php if ($data['skypeicon'] == '7') echo ' selected';?>>图标7</option>
	<option value="8"<?php if ($data['skypeicon'] == '8') echo ' selected';?>>图标8</option>
	<option value="9"<?php if ($data['skypeicon'] == '9') echo ' selected';?>>图标9</option>
	<option value="10"<?php if ($data['skypeicon'] == '10') echo ' selected';?>>图标10</option>
	<option value="11"<?php if ($data['skypeicon'] == '11') echo ' selected';?>>图标11</option>
	<option value="12"<?php if ($data['skypeicon'] == '12') echo ' selected';?>>图标12</option>
	<option value="13"<?php if ($data['skypeicon'] == '13') echo ' selected';?>>图标13</option>
	<option value="14"<?php if ($data['skypeicon'] == '14') echo ' selected';?>>图标14</option>
	<option value="15"<?php if ($data['skypeicon'] == '15') echo ' selected';?>>图标15</option>
	<option value="16"<?php if ($data['skypeicon'] == '16') echo ' selected';?>>图标16</option>
	<option value="17"<?php if ($data['skypeicon'] == '17') echo ' selected';?>>图标17</option>
	<option value="18"<?php if ($data['skypeicon'] == '18') echo ' selected';?>>图标18</option>
	<option value="19"<?php if ($data['skypeicon'] == '19') echo ' selected';?>>图标19</option>
	<option value="20"<?php if ($data['skypeicon'] == '20') echo ' selected';?>>图标20</option>
	<option value="21"<?php if ($data['skypeicon'] == '21') echo ' selected';?>>图标21</option>
	<option value="22"<?php if ($data['skypeicon'] == '22') echo ' selected';?>>图标22</option>
	<option value="23"<?php if ($data['skypeicon'] == '23') echo ' selected';?>>图标23</option>
	<option value="24"<?php if ($data['skypeicon'] == '24') echo ' selected';?>>图标24</option>
	</select>
	</td>
  </tr>

  <tr>
	<td class='hback_1'>淘宝旺旺图标：<span class='f_red'></span></td>
	<td class='hback'>
	<select name="taobaoicon" id="taobaoicon">
	<option value="1"<?php if ($data['taobaoicon'] == '1') echo ' selected';?>>图标1</option>
	<option value="2"<?php if ($data['taobaoicon'] == '2') echo ' selected';?>>图标2</option>
	</select>

	与淘宝官方网站对应 <a href="http://www.taobao.com/wangwang/2010_fp/world.php" target="_blank">查看</a>
	</td>
  </tr>


  <tr>
	<td class='hback_1'>阿里旺旺图标：<span class='f_red'></span></td>
	<td class='hback'>
	<select name="aliicon" id="aliicon">
	<option value="1"<?php if ($data['aliicon'] == '1') echo ' selected';?>>图标1</option>
	<option value="2"<?php if ($data['aliicon'] == '2') echo ' selected';?>>图标2</option>
	<option value="3"<?php if ($data['aliicon'] == '3') echo ' selected';?>>图标3</option>
	<option value="4"<?php if ($data['aliicon'] == '4') echo ' selected';?>>图标4</option>
	</select>

	与阿里巴巴官方网站对应 <a href="http://club.china.alibaba.com/club/block/alitalk/alitalkfire.html" target="_blank">查看</a>
	</td>
  </tr>


  <tr>
	<td class='hback_1'>其他文字说明：<span class='f_red'></span></td>
	<td class='hback'><textarea name="remark" id="remark" style="width:40%;height:60px;overflow:auto;"><?php echo stripslashes($data['remark']);?></textarea> （支持HTML语法）</td>
  </tr>

  <tr>
	<td class='hback_none'></td>
	<td class='hback_none'><input type="submit" name="btn_save" class="button" value="保存设置" /></td>
  </tr>
</table>
</form>