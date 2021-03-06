<?php

if (! defined ( 'IN_OESOFT' )) {
	exit ( 'Access Denied' );
}
class XMod extends X {
	public static function checkBox($value, $name, $text = '') {
		$temp = "<input type='checkbox' id='$name' name='$name' value='1'";
		if ($value == "1") {
			$temp .= " checked";
		}
		$temp .= ">$text";
		return $temp;
	}
	public static function selecAuthGroup($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$option = parent::model ( 'authgroup', 'am' );
		$temps .= $option->getCacheOptions ( $value );
		unset ( $option );
		$temps .= "</select>";
		return $temps;
	}
	public static function selecArea($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$option = parent::model ( 'area', 'am' );
		$temps .= $option->getCacheOptions ( $value );
		unset ( $option );
		$temps .= "</select>";
		return $temps;
	}
	public static function selecHomeTown($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$option = parent::model ( 'hometown', 'am' );
		$temps .= $option->getCacheOptions ( $value );
		unset ( $option );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectZone($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$model = parent::model ( 'zone', 'am' );
		$temps .= $model->getZoneOption ( intval ( $value ) );
		unset ( $model );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectModule($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$model = parent::model ( 'module', 'am' );
		$temps .= $model->getModuleOption ( trim ( $value ) );
		unset ( $model );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectListModule($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$model = parent::model ( 'module', 'am' );
		$temps .= $model->getListModuleOption ( trim ( $value ) );
		unset ( $model );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectCategoryOneNode($nodeid, $value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$model = parent::model ( 'category', 'am' );
		$temps .= $model->getOneNodeOption ( intval ( $nodeid ), $value );
		unset ( $model );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectCategoryRoot($module, $value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$model = parent::model ( 'category', 'am' );
		$temps .= $model->getOptionRoot ( trim ( $module ), $value );
		unset ( $model );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectNodeEnableChilds($nodeid, $value, $name, $text = '请选择', $css = 'disoptions') {
		$temps = '';
		$temps .= "<select name='{$name}' id='{$name}' class='{$css}'>";
		$temps .= "<option value=''>$text</option>";
		$model = parent::model ( 'category', 'am' );
		$temps .= $model->getNodeEnableChilds ( intval ( $nodeid ), $value );
		unset ( $model );
		$temps .= "</select>";
		return $temps;
	}
	public static function attrRadioBox($name, $attrvalue, $invalue = '') {
		$temps = '';
		if (! empty ( $attrvalue )) {
			$attrvalue = nl2br ( $attrvalue );
			$array = explode ( '<br />', $attrvalue );
			for($i = 0; $i < count ( $array ); $i ++) {
				$temps .= "<input type='radio' name='{$name}' id='{$name}' value='" . trim ( $array [$i] ) . "'";
				if (trim ( $invalue == trim ( $array [$i] ) )) {
					$temps .= " checked";
				}
				$temps .= " />" . $array [$i] . '&nbsp;&nbsp;';
			}
		}
		return $temps;
	}
	public static function attrCheckBox($name, $attrvalue, $invalue = '') {
		$temps = '';
		if (! empty ( $attrvalue )) {
			$attrvalue = nl2br ( $attrvalue );
			$array = explode ( '<br />', $attrvalue );
			for($i = 0; $i < count ( $array ); $i ++) {
				$temps .= "<input type='checkbox' name='{$name}[]' id='{$name}[]' value='" . trim ( $array [$i] ) . "'";
				if (! empty ( $invalue )) {
					if (true === XHandle::foundInChar ( $invalue, trim ( $array [$i] ), ',' )) {
						$temps .= " checked";
					}
				}
				$temps .= " />" . $array [$i] . '&nbsp;&nbsp;';
			}
		}
		return $temps;
	}
	public static function attrOptions($name, $attrvalue, $invalue = '') {
		$temps = "<select name='{$name}' id='{$name}'>";
		if (! empty ( $attrvalue )) {
			$attrvalue = nl2br ( $attrvalue );
			$array = explode ( '<br />', $attrvalue );
			for($i = 0; $i < count ( $array ); $i ++) {
				$temps .= "<option value='" . trim ( $array [$i] ) . "'";
				if (trim ( $invalue == trim ( $array [$i] ) )) {
					$temps .= " selected";
				}
				$temps .= ">" . $array [$i] . '</option>';
			}
		}
		$temps .= "</select>";
		return $temps;
	}
	public static function selectUserGroup($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'usergroup', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function checkUserGroup($invalue, $name, $extend) {
		$trnum = empty ( $extend ['trnum'] ) ? 5 : $extend ['trnum'];
		$width = empty ( $extend ['width'] ) ? '98%' : $extend ['width'];
		$css = empty ( $extend ['css'] ) ? 'hback' : $extend ['css'];
		$temp = '';
		$loop = '';
		$m = parent::model ( 'usergroup', 'am' );
		$data = $m->getAllList ();
		unset ( $m );
		$i = 0;
		foreach ( $data as $key => $value ) {
			$loop = $loop . " <td class='" . $css . "' width='20%'>";
			$loop = $loop . " <input type='checkbox' name='" . $name . "[]' id='" . $name . "[]' value='" . intval ( $value ['groupid'] ) . "'";
			if (! empty ( $invalue )) {
				if (XHandle::foundInChar ( $invalue, intval ( $value ['groupid'] ), ',' )) {
					$loop .= ' checked';
				}
			}
			$loop .= " /> " . trim ( $value ['groupname'] ) . "";
			$loop .= " </td>";
			if (($i + 1) % ($trnum) == 0) {
				$loop .= "</tr><tr>";
			}
			$i = ($i + 1);
		}
		$temp = "<table width='{$width}' border='0' align='left' cellpadding='0' cellspacing='0'>";
		$temp .= "  <tr>";
		$temp .= $loop;
		$temp .= "  </tr>";
		$temp .= "</table>";
		return $temp;
	}
	public static function selectShipType($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'shiptype', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectAccount($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'account', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectParamter($value, $name, $type = 'in', $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'paramter', 'am' );
		$temps .= $m->getOptions ( intval ( $value ), $type );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectGiftCategory($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'giftcat', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectDiaryCategory($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'diarycat', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectAboutCategory($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'aboutcat', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectInfoCategory($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'infocat', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectBatchId($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'card', 'am' );
		$temps .= $m->getBatchIdOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectBatchName($text = '请选择') {
		$temps = '';
		$m = parent::model ( 'card', 'am' );
		$temps .= $m->getBatchNameOptions ();
		unset ( $m );
		return $temps;
	}
	public static function selectCeshiCategory($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'ceshicat', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectNetPay($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'netpay', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function getLoveParamterID($paramter, $text) {
		$id = 0;
		$m = parent::model ( 'loveparamter', 'am' );
		$paramvalue = $m->getParamterVal ( $paramter );
		unset ( $m );
		$splitarray = explode ( '|', $paramvalue );
		for($i = 0; $i < sizeof ( $splitarray ); $i ++) {
			$itemarray = trim ( $splitarray [$i] );
			$valuearray = explode ( '#', $itemarray );
			if ($text == $valuearray [1]) {
				$id = intval ( $valuearray [0] );
				break;
			}
		}
		return $id;
	}
	public static function selectLoveParamter($paramter, $inval, $name, $type = '', $text = '请选择', $extend = array()) {
		$m = parent::model ( 'loveparamter', 'am' );
		$paramter_value = $m->getParamterVal ( $paramter );
		unset ( $m );
		$type = empty ( $type ) ? 'select' : $type;
		$temp = '';
		if ($type == 'select') {
			$temp .= "<select name='{$name}' id='{$name}'>";
			$temp .= "<option value=''>{$text}</option>";
			$temp = $temp . self::_paramterOptions ( $inval, $paramter_value );
			$temp .= "</select>";
		} elseif ($type == 'multiple') {
			$temp .= "<select name='{$name}[]' id='{$name}[]' multiple='multiple'>";
			$temp .= "<option value=''>{$text}</option>";
			$temp = $temp . self::_paramterMutilpleOptions ( $inval, $paramter_value );
			$temp .= "</select>";
		} elseif ($type == 'checkbox') {
			$temp = self::_paramterCheckBox ( $paramter, $inval, $name, $paramter_value, $extend );
		}
		return $temp;
	}
	private static function _paramterOptions($invalue, $paramvalue) {
		$loop = '';
		$splitarray = explode ( '|', $paramvalue );
		for($i = 0; $i < sizeof ( $splitarray ); $i ++) {
			$itemarray = trim ( $splitarray [$i] );
			$valuearray = explode ( '#', $itemarray );
			$loop .= "<option value='" . intval ( $valuearray [0] ) . "'";
			if (intval ( $invalue ) == intval ( $valuearray [0] )) {
				$loop .= " selected";
			}
			$loop .= ">" . trim ( $valuearray [1] ) . "</option>";
		}
		return $loop;
	}
	private static function _paramterMutilpleOptions($invalue, $paramvalue) {
		$loop = '';
		$splitarray = explode ( '|', $paramvalue );
		for($i = 0; $i < sizeof ( $splitarray ); $i ++) {
			$itemarray = trim ( $splitarray [$i] );
			$valuearray = explode ( '#', $itemarray );
			$loop .= "<option value='" . intval ( $valuearray [0] ) . "'";
			if (! empty ( $invalue )) {
				if (XHandle::foundInChar ( $invalue, intval ( $valuearray [0] ), ',' )) {
					$loop .= ' selected';
				}
			}
			$loop .= ">" . trim ( $valuearray [1] ) . "</option>";
		}
		return $loop;
	}
	private static function _paramterCheckBox($paramter, $invalue, $name, $paramvalue, $extend) {
		$maxnum = empty ( $extend ['maxnum'] ) ? 5 : $extend ['maxnum'];
		$trnum = empty ( $extend ['trnum'] ) ? 5 : $extend ['trnum'];
		$width = empty ( $extend ['width'] ) ? '98%' : $extend ['width'];
		$css = empty ( $extend ['css'] ) ? 'hback' : $extend ['css'];
		$temp = '';
		$loop = '';
		$splitarray = explode ( '|', $paramvalue );
		for($i = 0; $i < sizeof ( $splitarray ); $i ++) {
			$itemarray = trim ( $splitarray [$i] );
			$valuearray = explode ( '#', $itemarray );
			$loop = $loop . " <td class='" . $css . "' width='20%'>";
			if (intval ( $maxnum ) > 0) {
				$loop = $loop . " <input type='checkbox' name='" . $name . "[]' id='" . $name . "[]' onclick=\"check_maxnum('" . $paramter . "', this, " . $maxnum . ")\" value='" . intval ( $valuearray [0] ) . "'";
			} else {
				$loop = $loop . " <input type='checkbox' name='" . $name . "[]' id='" . $name . "[]' value='" . intval ( $valuearray [0] ) . "'";
			}
			if (! empty ( $invalue )) {
				if (XHandle::foundInChar ( $invalue, intval ( $valuearray [0] ), ',' )) {
					$loop .= ' checked';
				}
			}
			$loop .= " /> " . trim ( $valuearray [1] ) . "";
			$loop .= " </td>";
			if (($i + 1) % ($trnum) == 0) {
				$loop .= "</tr><tr>";
			}
		}
		$temp = "<table width='{$width}' border='0' align='left' cellpadding='0' cellspacing='0'>";
		$temp .= "  <tr>";
		$temp .= $loop;
		$temp .= "  </tr>";
		$temp .= "</table>";
		return $temp;
	}
	public static function getLoveParamter($paramter, $inid, $type = '', $text = '未填写') {
		$type = empty ( $type ) ? 'text' : $type;
		$string = '';
		$m = parent::model ( 'loveparamter', 'am' );
		$paramter_value = $m->getParamterVal ( $paramter );
		unset ( $m );
		if (empty ( $inid ) || $inid == 0) {
			$string = $text;
		} else {
			if ($type == 'text') {
				return self::_paramterText ( $inid, $paramter_value );
			} else {
				$array = explode ( ',', $inid );
				for($ii = 0; $ii < sizeof ( $array ); $ii ++) {
					$string .= self::_paramterText ( intval ( $array [$ii] ), $paramter_value ) . "&nbsp;&nbsp;";
				}
			}
		}
		return $string;
	}
	private static function _paramterText($inval, $paramvalue) {
		$text_val = '';
		$splitarray = explode ( '|', $paramvalue );
		for($i = 0; $i < sizeof ( $splitarray ); $i ++) {
			$itemarray = trim ( $splitarray [$i] );
			$valuearray = explode ( '#', $itemarray );
			if (intval ( $inval ) == intval ( $valuearray [0] )) {
				$text_val = trim ( $valuearray [1] );
			}
		}
		return $text_val;
	}
	public static function opLog($logtext, $type = 1) {
		$array = array ();
		if ($type == 1) {
			$array = array (
					'username' => parent::$wrap_admin ['adminname'] 
			);
		} else {
			$array = array (
					'username' => parent::$wrap_user ['username'] 
			);
		}
		$array = array_merge ( $array, array (
				'ip' => XRequest::getip (),
				'content' => $logtext,
				'logtype' => $type,
				'timeline' => time () 
		) );
		$lg = parent::model ( 'log', 'am' );
		$lg->doAdd ( $array );
		unset ( $lg );
	}
	public static function selectAskCategory($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'askcat', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectDatingCategory($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'datingcat', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectStoryCategory($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'storycat', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function selectAge($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$min = empty ( parent::$cfg ['startage'] ) ? 18 : intval ( parent::$cfg ['startage'] );
		$max = empty ( parent::$cfg ['endage'] ) ? 60 : intval ( parent::$cfg ['endage'] );
		$loop = '';
		for($i = $min; $i < ($max + 1); $i ++) {
			$loop .= "<option value='{$i}'";
			if (intval ( $value ) == $i) {
				$loop .= " selected";
			}
			$loop .= ">{$i}</option>";
		}
		$temps = $temps . $loop . "</select>";
		return $temps;
	}
	public static function selectHeight($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$min = empty ( parent::$cfg ['startheight'] ) ? 130 : intval ( parent::$cfg ['startheight'] );
		$max = empty ( parent::$cfg ['endheight'] ) ? 200 : intval ( parent::$cfg ['endheight'] );
		$loop = '';
		for($i = $min; $i < ($max + 1); $i ++) {
			$loop .= "<option value='{$i}'";
			if (intval ( $value ) == $i) {
				$loop .= " selected";
			}
			$loop .= ">{$i}</option>";
		}
		$temps = $temps . $loop . "</select>";
		return $temps;
	}
	public static function selectWeight($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$min = empty ( parent::$cfg ['startweight'] ) ? 30 : intval ( parent::$cfg ['startweight'] );
		$max = empty ( parent::$cfg ['endweight'] ) ? 150 : intval ( parent::$cfg ['endweight'] );
		$loop = '';
		for($i = $min; $i < ($max + 1); $i ++) {
			$loop .= "<option value='{$i}'";
			if (intval ( $value ) == $i) {
				$loop .= " selected";
			}
			$loop .= ">{$i}</option>";
		}
		$temps = $temps . $loop . "</select>";
		return $temps;
	}
	public static function ajaxAreaRootOptions($args) {
		$temps = '';
		$options = '';
		$args ['value'] = empty ( $args ['value'] ) ? 0 : intval ( $args ['value'] );
		$args ['ajax'] = empty ( $args ['ajax'] ) ? 0 : intval ( $args ['ajax'] );
		$args ['cajax'] = empty ( $args ['cajax'] ) ? 0 : intval ( $args ['cajax'] );
		$m = parent::model ( 'area', 'am' );
		$options = $m->getRootOptions ( $args ['value'] );
		unset ( $m );
		if (! empty ( $options ) && $args ['ajax'] == 1) {
			$temps = "<select name='" . $args ['name'] . "' id='" . $args ['name'] . "' onchange=\"fetch_city('" . $args ['name'] . "', '" . $args ['cname'] . "', '" . $args ['cvalue'] . "', '" . $args ['text'] . "', '" . $args ['cajax'] . "', '" . $args ['dname'] . "', '" . $args ['dvalue'] . "');\">";
		} else {
			$temps = "<select name='" . $args ['name'] . "' id='" . $args ['name'] . "'>";
		}
		$temps .= "<option value=''>" . $args ['text'] . "</option>";
		$temps = $temps . $options;
		$temps .= "</select>";
		return $temps;
	}
	public static function ajaxAreaChildOptions($args) {
		$temps = '';
		$options = '';
		$args ['value'] = empty ( $args ['value'] ) ? 0 : intval ( $args ['value'] );
		$args ['ajax'] = empty ( $args ['ajax'] ) ? 0 : intval ( $args ['ajax'] );
		$args ['rootid'] = empty ( $args ['rootid'] ) ? 0 : intval ( $args ['rootid'] );
		$m = parent::model ( 'area', 'am' );
		$options = $m->getChildOptions ( $args ['rootid'], $args ['value'] );
		unset ( $m );
		if (! empty ( $options )) {
			if ($args ['ajax'] == 1 && ! empty ( $args ['dname'] )) {
				$temps = "<select name='" . $args ['name'] . "' id='" . $args ['name'] . "' onchange=\"fetch_dist('" . $args ['name'] . "', '" . $args ['dname'] . "', '" . $args ['dvalue'] . "', '" . $args ['text'] . "');\">";
			} else {
				$temps = "<select name='" . $args ['name'] . "' id='" . $args ['name'] . "'>";
			}
			$temps .= "<option value=''>" . $args ['text'] . "</option>";
			$temps = $temps . $options;
			$temps .= "</select>";
		}
		return $temps;
	}
	public static function getAreaName($id) {
		$m = parent::model ( 'area', 'am' );
		$areaname = $m->getCacheArea ( $id );
		unset ( $m );
		return $areaname;
	}
	public static function ajaxHomeTownRootOptions($args) {
		$temps = '';
		$options = '';
		$args ['value'] = empty ( $args ['value'] ) ? 0 : intval ( $args ['value'] );
		$m = parent::model ( 'hometown', 'am' );
		$options = $m->getRootOptions ( $args ['value'] );
		unset ( $m );
		if (! empty ( $options )) {
			$temps = "<select name='" . $args ['name'] . "' id='" . $args ['name'] . "' onchange=\"fetch_hometown('" . $args ['name'] . "', '" . $args ['cname'] . "', '" . $args ['cvalue'] . "', '" . $args ['text'] . "');\">";
		} else {
			$temps = "<select name='" . $args ['name'] . "' id='" . $args ['name'] . "'>";
		}
		$temps .= "<option value=''>" . $args ['text'] . "</option>";
		$temps = $temps . $options;
		$temps .= "</select>";
		return $temps;
	}
	public static function ajaxHomeTownChildOptions($args) {
		$temps = '';
		$options = '';
		$args ['value'] = empty ( $args ['value'] ) ? 0 : intval ( $args ['value'] );
		$args ['rootid'] = empty ( $args ['rootid'] ) ? 0 : intval ( $args ['rootid'] );
		if ($args ['rootid'] > 0) {
			$m = parent::model ( 'hometown', 'am' );
			$options = $m->getChildOptions ( $args ['rootid'], $args ['value'] );
			unset ( $m );
			if (! empty ( $options )) {
				$temps = "<select name='" . $args ['name'] . "' id='" . $args ['name'] . "'>";
				$temps .= "<option value=''>" . $args ['text'] . "</option>";
				$temps = $temps . $options;
				$temps .= "</select>";
			}
		}
		return $temps;
	}
	public static function getHomeTownName($id) {
		$m = parent::model ( 'hometown', 'am' );
		$areaname = $m->getCacheHomeTown ( $id );
		unset ( $m );
		return $areaname;
	}
	public static function selectLoveSort($value, $name, $text = '请选择') {
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		$m = parent::model ( 'lovesort', 'am' );
		$temps .= $m->getOptions ( intval ( $value ) );
		unset ( $m );
		$temps .= "</select>";
		return $temps;
	}
	public static function getLoveSortName($id) {
		$m = parent::model ( 'lovesort', 'am' );
		return $m->getSortName ( intval ( $id ) );
		unset ( $m );
	}
	public static function multiLoveSort($value) {
		if (! empty ( $value )) {
			$m = parent::model ( 'lovesort', 'am' );
			$arr = explode ( ',', $value );
			$i = 0;
			for($i = 0; $i < count ( $arr ); $i ++) {
				$sortname = $m->getSortName ( intval ( $arr [$i] ) );
				if ($i == 0) {
					$fuhao = '';
				} else {
					$fuhao = ',';
				}
				$str .= $fuhao . $sortname;
			}
			unset ( $m );
		}
		return $str;
	}
	public static function checkLoveSort($invalue, $name, $extend) {
		$trnum = empty ( $extend ['trnum'] ) ? 5 : $extend ['trnum'];
		$width = empty ( $extend ['width'] ) ? '98%' : $extend ['width'];
		$css = empty ( $extend ['css'] ) ? 'hback' : $extend ['css'];
		$temp = '';
		$loop = '';
		$m = parent::model ( 'lovesort', 'am' );
		$data = $m->getAllList ();
		unset ( $m );
		$i = 0;
		foreach ( $data as $key => $value ) {
			$loop = $loop . " <td class='" . $css . "' width='20%'>";
			$loop = $loop . " <input type='checkbox' name='" . $name . "[]' id='" . $name . "[]' value='" . intval ( $value ['sortid'] ) . "'";
			if (! empty ( $invalue )) {
				if (XHandle::foundInChar ( $invalue, intval ( $value ['sortid'] ), ',' )) {
					$loop .= ' checked';
				}
			}
			$loop .= " /> " . trim ( $value ['sortname'] ) . "";
			$loop .= " </td>";
			if (($i + 1) % ($trnum) == 0) {
				$loop .= "</tr><tr>";
			}
			$i = ($i + 1);
		}
		$temp = "<table width='{$width}' border='0' align='left' cellpadding='0' cellspacing='0'>";
		$temp .= "  <tr>";
		$temp .= $loop;
		$temp .= "  </tr>";
		$temp .= "</table>";
		return $temp;
	}
	public static function selectYear($value, $name, $text) {
		$year = date ( 'Y', time () );
		$temps = "<select name='{$name}' id='{$name}'>";
		if (! empty ( $text )) {
			$temps .= "<option value=''>{$text}</option>";
		}
		$startage = intval ( parent::$cfg ['startage'] );
		$endage = intval ( parent::$cfg ['endage'] );
		$nowyear = date ( "Y", time () );
		$maxyear = ($nowyear - $startage);
		$minyear = ($nowyear - $endage);
		for($ii = $maxyear; $ii > ($minyear - 1); $ii --) {
			$temps .= "<option value='" . $ii . "'";
			if (intval ( $value ) == $ii) {
				$temps .= " selected";
			}
			$temps .= ">" . $ii . "</option>";
		}
		$temps .= "</select>";
		return $temps;
	}
	public static function selectMonth($value, $name, $text) {
		$temps = "<select name='{$name}' id='{$name}'>";
		if (! empty ( $text )) {
			$temps .= "<option value=''>{$text}</option>";
		}
		for($ii = 1; $ii < 13; $ii ++) {
			$temps .= "<option value='" . $ii . "'";
			if (intval ( $value ) == $ii) {
				$temps .= " selected";
			}
			$temps .= ">" . $ii . "</option>";
		}
		$temps .= "</select>";
		return $temps;
	}
	public static function selectDay($value, $name, $text) {
		$temps = "<select name='{$name}' id='{$name}'>";
		if (! empty ( $text )) {
			$temps .= "<option value=''>{$text}</option>";
		}
		for($ii = 1; $ii < 32; $ii ++) {
			$temps .= "<option value='" . $ii . "'";
			if (intval ( $value ) == $ii) {
				$temps .= " selected";
			}
			$temps .= ">" . $ii . "</option>";
		}
		$temps .= "</select>";
		return $temps;
	}
	public static function selectStar($value, $name, $text) {
		$temps = "<select name='{$name}' id='{$name}'>";
		if (! empty ( $text )) {
			$temps .= "<option value=''>{$text}</option>";
		}
		for($ii = 1; $ii < 11; $ii ++) {
			$temps .= "<option value='" . $ii . "'";
			if (intval ( $value ) == $ii) {
				$temps .= " selected";
			}
			$temps .= ">" . $ii . "</option>";
		}
		$temps .= "</select>";
		return $temps;
	}
	public static function getAge($d) {
		if (is_numeric ( $d )) {
			if ($d == 0) {
				$d = 0;
			}
			$year = $d;
		} else {
			$year = date ( 'Y', $d );
		}
		$nowyear = date ( 'Y', time () );
		return (intval ( $nowyear ) - intval ( $year ));
	}
	public static function selectCerityType($value, $name, $text = '请选择') {
		$temps = '';
		$array = array (
				'1' => '身份证',
				'2' => '护照',
				'3' => '港澳通行证',
				'4' => '港澳台同胞证',
				'5' => '户口本',
				'6' => '驾驶执照',
				'7' => '毕业证',
				'8' => '学位证',
				'9' => '学生证',
				'10' => '房产证',
				'11' => '工作证',
				'12' => '离异证',
				'13' => '职称证',
				'14' => '收入证明',
				'15' => '残疾人证',
				'16' => '其他证件' 
		);
		$temps .= "<select name='{$name}' id='{$name}'>";
		$temps .= "<option value=''>{$text}</option>";
		foreach ( $array as $key => $val ) {
			$temps .= "<option value='" . $key . "'";
			if (intval ( $value ) == $key) {
				$temps .= " selected";
			}
			$temps .= ">" . $val . "</option>";
		}
		$temps .= "</select>";
		return $temps;
	}
	public static function getCertifyType($value) {
		$array = array (
				'1' => '身份证',
				'2' => '护照',
				'3' => '港澳通行证',
				'4' => '港澳台同胞证',
				'5' => '户口本',
				'6' => '驾驶执照',
				'7' => '毕业证',
				'8' => '学位证',
				'9' => '学生证',
				'10' => '房产证',
				'11' => '工作证',
				'12' => '离异证',
				'13' => '职称证',
				'14' => '收入证明',
				'15' => '残疾人证',
				'16' => '其他证件' 
		);
		$text = '';
		foreach ( $array as $key => $val ) {
			if (intval ( $value ) == $key) {
				$text = $val;
				break;
			}
		}
		return $text;
	}
	public static function selectTimezone($inputvalue, $name, $text = '请选择') {
		$tzlist = array (
				'-12' => '(标准时-12) 日界线西',
				'-11' => '(标准时-11) 中途岛、萨摩亚群岛',
				'-10' => '(标准时-10) 夏威夷',
				'-9' => '(标准时-9) 阿拉斯加',
				'-8' => '(标准时-8) 太平洋时间(美国和加拿大)',
				'-7' => '(标准时-7) 山地时间(美国和加拿大)',
				'-6' => '(标准时-6) 中部时间(美国和加拿大)、墨西哥城',
				'-5' => '(标准时-5) 东部时间(美国和加拿大)、波哥大',
				'-4' => '(标准时-4) 大西洋时间(加拿大)、加拉加斯',
				'-3.5' => '(标准时-3:30) 纽芬兰',
				'-3' => '(标准时-3) 巴西、布宜诺斯艾利斯、乔治敦',
				'-2' => '(标准时-2) 中大西洋',
				'-1' => '(标准时-1) 亚速尔群岛、佛得角群岛',
				'0' => '(标准时) 西欧时间、伦敦、卡萨布兰卡',
				'1' => '(标准时+1) 中欧时间、安哥拉、利比亚',
				'2' => '(标准时+2) 东欧时间、开罗，雅典',
				'3' => '(标准时+3) 巴格达、科威特、莫斯科',
				'3.5' => '(标准时+3:30) 德黑兰',
				'4' => '(标准时+4) 阿布扎比、马斯喀特、巴库',
				'4.5' => '(标准时+4:30) 喀布尔',
				'5' => '(标准时+5) 叶卡捷琳堡、伊斯兰堡、卡拉奇',
				'5.5' => '(标准时+5:30) 孟买、加尔各答、新德里',
				'6' => '(标准时+6) 阿拉木图、 达卡、新亚伯利亚',
				'7' => '(标准时+7) 曼谷、河内、雅加达',
				'8' => '(标准时+8) 北京、重庆、香港、新加坡',
				'9' => '(标准时+9) 东京、汉城、大阪、雅库茨克',
				'9.5' => '(标准时+9:30) 阿德莱德、达尔文',
				'10' => '(标准时+10) 悉尼、关岛',
				'11' => '(标准时+11) 马加丹、索罗门群岛',
				'12' => '(标准时+12) 奥克兰、惠灵顿、堪察加半岛' 
		);
		$options = '';
		$temps = '';
		$temps .= "<select name='$name' id='$name'>";
		$temps .= "<option value=''>$text</option>";
		foreach ( $tzlist as $key => $value ) {
			$options .= "<option value='" . $key . "'";
			if (trim ( $inputvalue ) == trim ( $key )) {
				$options .= ' selected';
			}
			$options .= ">" . $value . "</option>";
		}
		$temps .= $options . "</select>";
		return $temps;
	}
}
?>