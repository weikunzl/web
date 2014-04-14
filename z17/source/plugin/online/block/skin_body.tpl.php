<?php
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
//在线客服列表BODY
/**
 * param:: $online array 配置参数
 * param:: $array() 客服列表
*/
?>
<script type='text/javascript' src='<?php echo PATH_URL;?>source/plugin/online/js/online.js'></script>
<div id='<?php if ($online['type']=='1'){echo "floatDiv";}else {echo "floatDivr";}?>' style='position: absolute;' class='floatonline_1'>

<?php
//风格 1和3
if ($online['skin'] == 1 OR $online['skin'] == 3) {
?>
<div class='scroll_title_1'><span><?php echo $online['title'];?></span><a href='#' title='<?php echo $online['close'];?>' onmousedown='Mouseclose()'>&nbsp;</a></div>
<div class='online_right_1'>
  <div class='online_left_1'>

  <?php
	//客服列表
	if (!empty($array)) {
		foreach ($array as $key=>$value) {
			//SKYPE
			if ($value['type'] == 'skype') {
				echo "<div class='scroll_skype_1'><a href='callto://".$value['number']."'><img src='".PATH_URL."source/plugin/online/images/skype/skype".$online['skypeicon'].".gif' border='0'></a></div>";
			}
			//ALIBABA
			elseif ($value['type'] == 'alibaba') {
				echo "<div class='scroll_alibaba_1'><a target=_blank href=http://amos1.sh1.china.alibaba.com/msg.atc?v=1&uid=".$value['number']."><img border=0 src=http://amos1.sh1.china.alibaba.com/online.atc?v=1&uid=".$value['number']."&s=".$online['aliicon']." alt='".$value['name']."'></a></div>";
			}
			else {
				echo "<div class='scroll_qq_1'>";
				//QQ
				if ($value['type'] == 'qq') {
					if ($value['show'] == 1) {
						echo $value['name'];
					}
					echo "<a href='tencent://message/?uin=".$value['number']."&Site=&Menu=yes'  title='QQ".$value['name']."' style='text-decoration:none;'><img border='0' src='http://wpa.qq.com/pa?p=1:".$value['number'].":".$online['qqicon']."'></a>";
				}
				//MSN
				if ($value['type'] == 'msn') {
					if ($value['show'] == 1) {
						echo $value['name'];
					}
					echo "<a href='msnim:chat?contact=".$value['number']."'><img border='0'  alt='MSN".$value['name']."' src='".PATH_URL."source/plugin/online/images/msn/msn".$online['msnicon'].".gif'/></a>";
				}
				//淘宝旺旺
				if ($value['type'] == 'taobao') {
					if ($value['show'] == 1) {
						echo $value['name'];
					}
					echo "<a target='_blank' href='http://amos.im.alisoft.com/msg.aw?v=".$online['taobaoicon']."&uid=".$value['number']."&site=cntaobao&s=".$online['taobaoicon']."&charset=utf-8' ><img border='0' src='http://amos.im.alisoft.com/online.aw?v=".$online['taobaoicon']."&uid=".$value['number']."&site=cntaobao&s=".$online['taobaoicon']."&charset=utf-8' alt='".$value['name']."' /></a>";
				}
				echo "</div>";

			}
		
		}
	
	}
  ?>
  </div>
</div>
<div class='scroll_foot1_1'></div>
<?php
if (!empty($online['remark'])) {
?>
<div class='scroll_foot2_1'><?php echo $online['remark'];?></div>
<?php
}
?>
<div class='scroll_foot3_1'></div>
<?php
}
?>

<?php
//风格 2和4
if ($online['skin'] == 2 OR $online['skin'] == 4){
?>
<div class='scroll_title_2'><span><?php echo $online['title'];?></span><a href='#' title='<?php echo $online['close'];?>' onmousedown='Mouseclose()'>&nbsp;</a></div>
<div class='scroll_main2'>
  <div class='scroll_text2'>

  <?php
	//客服列表
	if (!empty($array)) {
		foreach ($array as $key=>$value) {

			//SKYPE
			if ($value['type'] == 'skype') {
				echo "<div class='scroll_skype_1'><a href='callto://".$value['number']."'><img src='".PATH_URL."source/plugin/online/images/skype/skype".$online['skypeicon'].".gif' border='0'></a></div>";
			}
			//ALIBABA
			elseif ($value['type'] == 'alibaba') {
				echo "<div class='scroll_alibaba_1'><a target=_blank href=http://amos1.sh1.china.alibaba.com/msg.atc?v=1&uid=".$value['number']."><img border=0 src=http://amos1.sh1.china.alibaba.com/online.atc?v=1&uid=".$value['number']."&s=".$online['aliicon']." alt='".$value['name']."'></a></div>";
			}
			else {
				echo "<div class='scroll_qq_1'>";
				//QQ
				if ($value['type'] == 'qq') {
					if ($value['show'] == 1) {
						echo $value['name'];
					}
					echo "<a href='tencent://message/?uin=".$value['number']."&Site=&Menu=yes'  title='QQ".$value['name']."' style='text-decoration:none;'><img border='0' src='http://wpa.qq.com/pa?p=1:".$value['number'].":".$online['qqicon']."'></a>";
				}
				//MSN
				if ($value['type'] == 'msn') {
					if ($value['show'] == 1) {
						echo $value['name'];
					}
					echo "<a href='msnim:chat?contact=".$value['number']."'><img border='0'  alt='MSN".$value['name']."' src='".PATH_URL."source/plugin/online/images/msn/msn".$online['msnicon'].".gif'/></a>";
				}
				//淘宝旺旺
				if ($value['type'] == 'taobao') {
					if ($value['show'] == 1) {
						echo $value['name'];
					}
					echo "<a target='_blank' href='http://amos.im.alisoft.com/msg.aw?v=".$online['taobaoicon']."&uid=".$value['number']."&site=cntaobao&s=".$online['taobaoicon']."&charset=utf-8' ><img border='0' src='http://amos.im.alisoft.com/online.aw?v=".$online['taobaoicon']."&uid=".$value['number']."&site=cntaobao&s=".$online['taobaoicon']."&charset=utf-8' alt='".$value['name']."' /></a>";
				}
				echo "</div>";

			}

		}
	}
  ?>
  </div>
  <?php
  if (!empty($online['remark'])){
  ?>
  <div class='scroll_foot_2'><?php echo $online['remark'];?></div>
  <?php
  }
  ?>
</div>
<?php
}
?>
</div>