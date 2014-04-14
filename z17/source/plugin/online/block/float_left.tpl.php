<?php
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
//左边浮动JS
/**
 * param:: $online['left_leftpr'],$online['left_toppr']
*/
?>
<script language="javascript" type="text/javascript">
function Mouseclose(){
	document.getElementById('floatDiv').style.display='none';
}
window.onload = function(){
	var floatObj = document.getElementById('floatDiv');
	Floaters.addItem(floatObj, <?php echo $online['left_leftpr'];?>, <?php echo $online['left_toppr'];?>);
	Floaters.sPlay();
	document.getElementById('floatDiv').style.display='block';
}
</script>