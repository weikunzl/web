<?php
if(!defined('IN_OESOFT')) {
	exit('Access Denied');
}
//右边浮动JS
/**
 * param:: $online['right_rightpr'],$online['right_toppr']
*/
?>
<script language="javascript" type="text/javascript">
function Mouseclose(){
	document.getElementById('floatDivr').style.display='none';
}
window.onload = function(){
	var floatObjr = document.getElementById('floatDivr');
	Floaters.addItem(floatObjr, screen.width-<?php echo $online['right_rightpr'];?>, <?php echo $online['right_toppr'];?>);
	Floaters.sPlay();
	document.getElementById('floatDivr').style.display='block';
}
</script>