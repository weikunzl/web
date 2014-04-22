<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
function cmd_hook($extract) {
	if (! empty ( $extract )) {
		@extract ( $extract );
		$mod = empty ( $extract ['mod'] ) ? 'var' : trim ( $extract ['mod'] );
		$type = empty ( $extract ['type'] ) ? '' : trim ( $extract ['type'] );
		$item = empty ( $extract ['item'] ) ? '' : XFilter::filterStr ( $extract ['item'] );
		$value = empty ( $extract ['value'] ) ? '' : XFilter::filterStr ( $extract ['value'] );
		$name = empty ( $extract ['name'] ) ? '' : trim ( $extract ['name'] );
		$text = empty ( $extract ['text'] ) ? '' : trim ( $extract ['text'] );
		$maxnum = empty ( $extract ['maxnum'] ) ? 5 : intval ( $extract ['maxnum'] );
		$trnum = empty ( $extract ['trnum'] ) ? 5 : intval ( $extract ['trnum'] );
		$width = empty ( $extract ['width'] ) ? '98%' : trim ( $extract ['width'] );
		$css = empty ( $extract ['css'] ) ? 'hback' : trim ( $extract ['css'] );
		X::loadLib ( 'mod' );
		if ($mod == 'var') {
			if ($type == 'select' || $type == 'checkbox' || $type == 'multiple') {
				return XMod::selectLoveParamter ( $item, $value, $name, $type, $text, array ('maxnum' => $maxnum, 'trnum' => $trnum, 'width' => $width, 'css' => $css ) );
			} elseif ($type == 'text' || $type == 'multi') {
				return XMod::getLoveParamter ( $item, $value, $type, $text );
			}
		} elseif ($mod == 'age') {
			return XMod::selectAge ( $value, $name, $text );
		} elseif ($mod == 'height') {
			return XMod::selectHeight ( $value, $name, $text );
		} elseif ($mod == 'weight') {
			return XMod::selectWeight ( $value, $name, $text );
		} elseif ($mod == 'year') {
			return XMod::selectYear ( $value, $name, $text );
		} elseif ($mod == 'month') {
			return XMod::selectMonth ( $value, $name, $text );
		} elseif ($mod == 'day') {
			return XMod::selectDay ( $value, $name, $text );
		} elseif ($mod == 'star') {
			return XMod::selectStar ( $value, $name, $text );
		} elseif ($mod == 'birthday') {
			return XMod::getAge ( $value );
		} elseif ($mod == 'lovesort' && $type == 'select') {
			return XMod::selectLoveSort ( $value, $name, $text );
		} elseif ($mod == 'lovesort' && $type == 'checkbox') {
			return XMod::checkLoveSort ( $value, $name, array ('trnum' => $trnum, 'width' => $width, 'css' => $css ) );
		} elseif ($mod == 'lovesort' && $type == 'multi') {
			if (! empty ( $value )) {
				return XMod::multiLoveSort ( $value );
			}
		} elseif ($mod == 'lovesort' && $type == 'text') {
			return XMod::getLoveSortName ( $value );
		} elseif ($mod == 'usergroup' && $type == 'select') {
			return XMod::selectUserGroup ( $value, $name, $text );
		} elseif ($mod == 'usergroup' && $type == 'checkbox') {
			return XMod::checkUserGroup ( $value, $name, array ('trnum' => $trnum, 'width' => $width, 'css' => $css ) );
		} elseif ($mod == 'certify' && $type == 'select') {
			return XMod::selectCerityType ( $value, $name, $text );
		} elseif ($mod == 'certify' && $type == 'text') {
			return XMod::getCertifyType ( $value );
		} elseif ($mod == 'diarycategory' && $type == 'select') {
			return XMod::selectDiaryCategory ( $value, $name, $text );
		} elseif ($mod == 'askcategory' && $type == 'select') {
			return XMod::selectAskCategory ( $value, $name, $text );
		} elseif ($mod == 'datingcategory' && $type == 'select') {
			return XMod::selectDatingCategory ( $value, $name, $text );
		} elseif ($mod == 'giftcategory' && $type == 'select') {
			return XMod::selectGiftCategory ( $value, $name, $text );
		} elseif ($mod == 'aboutcategory' && $type == 'select') {
			return XMod::selectAboutCategory ( $value, $name, $text );
		} elseif ($mod == 'infocategory' && $type == 'select') {
			return XMod::selectInfoCategory ( $value, $name, $text );
		} elseif ($mod == 'storycategory' && $type == 'select') {
			return XMod::selectStoryCategory ( $value, $name, $text );
		} elseif ($mod == 'netpay' && $type == 'select') {
			return XMod::selectNetPay ( $value, $name, $text );
		}
	}
}
TPL::regFunction ( 'hook', 'cmd_hook' );
?>