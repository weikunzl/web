<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
class control extends adminbase
{

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    public function control_run( )
    {
    }

    public function control_add_album( )
    {
        $imglist = "";
        $sort = XRequest::getint( "sort" );
        $orders = $sort + 1;
        $module = XRequest::getargs( "module" );
        if ( empty( $module ) )
        {
            $module = "product";
        }
        $imglist .= "<tr class='imglist'>\n".( "  <td class='hback_1'><a href='javascript:void(0);' onclick='album_countnums();album_del($(this), ".$orders.");'>删除</a> 图片{$orders}</td>\n" )."  <td class='hback'>\n    <table border='0' cellspacing='0' cellpadding='0'>\n\t   <tr>\n\t     <td colspan='2'>\n".( "\t\t\t排序：<input name='imgorders_".$orders."' id='imgorders_{$orders}' type='text' class='input-s' value='{$orders}' />&nbsp;" ).( "\t\t\t图片描述：<input name='imgname_".$orders."' id='imgname_{$orders}' type='text' class='input-150' />&nbsp;" )."\t\t  </td>\n\t   </tr>\n\t   <tr>\n\t     <td>\n".( "\t\t    图片地址：<input name='imgurl_".$orders."' id='imgurl_{$orders}' type='text' class='input-200' /><input type='hidden' name='imgthumb_{$orders}' id='imgthumb_{$orders}' value='' />" )."\t\t </td>\n\t\t <td>\n".( "\t\t\t<iframe id='iframe_t_".$orders."' border='0' frameborder='0' scrolling='no' style='width:260px;height:25px;padding:0px;margin:0px;' src='" ).$this->cpfile."?c=upload&module=".$module.( "&formname=myform&uploadinput=imgurl_".$orders."&thumbinput=imgthumb_{$orders}&multipart=sf_upload_{$orders}&previewid=imgpreview_{$orders}'></iframe>" )."\t\t </td>\n\t   </tr>\n\t </table>\n".( "\t\t<span id='imgpreview_".$orders."'></span>" )."  </td>\n</tr>\n";
        echo json_encode( array( "list" => $imglist ) );
    }

    public function control_add_goods( )
    {
        $itemlist = "";
        $sort = XRequest::getint( "sort" );
        $orders = $sort + 1;
        $itemlist .= "<tr class='itemlist' onMouseOver=\"overColor(this)\" onMouseOut=\"outColor(this)\">\n".( "   <td class='hback' align='center'> 物品".$orders." <input type='hidden' name='item_gid_{$orders}' id='item_gid_{$orders}' /></td>\n" ).( "   <td class='hback' align='center' id='item_id_".$orders."'></td>\n" ).( "   <td class='hback' id='item_name_".$orders."'></td>\n" ).( "   <td class='hback' align='center' id='item_price_".$orders."'></td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_num_".$orders."' id='item_num_{$orders}' class='input-s' /></td>\n" ).( "   <td class='hback' align='center'><a href='javascript:void(0);' onclick=\"tbox_get_goods('查询物品', '".$orders."')\">插入物品</a>&nbsp;&nbsp;<a href='javascript:void(0);' onclick='item_countnums();item_del($(this), {$orders});'>移除</a></td>\n" )."</tr>\n";
        echo json_encode( array( "list" => $itemlist ) );
    }

    public function control_add_ceshi_result( )
    {
        $itemlist = "";
        $sort = XRequest::getint( "sort" );
        $orders = $sort + 1;
        $itemlist .= "<tr class='itemlist' onMouseOver=\"overColor(this)\" onMouseOut=\"outColor(this)\">\n".( "   <td class='hback' align='center'> 结果".$orders." </td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_orders_".$orders."' id='item_orders_{$orders}' class='input-s' /></td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_score_".$orders."' id='item_score_{$orders}' class='input-150' />分</td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_result_".$orders."' id='item_result_{$orders}' class='input-txt' /></td>\n" ).( "   <td class='hback' align='center'><a href='javascript:void(0);' onclick='result_countnums();result_del($(this), ".$orders.");'>移除</a></td>\n" )."</tr>\n";
        echo json_encode( array( "list" => $itemlist ) );
    }

    public function control_add_ceshi_subject( )
    {
        $itemlist = "";
        $sort = XRequest::getint( "sort" );
        $orders = $sort + 1;
        $itemlist .= "<tr class='itemlist' onMouseOver=\"overColor(this)\" onMouseOut=\"outColor(this)\">\n".( "   <td class='hback' align='center'> 选项".$orders." </td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_orders_".$orders."' id='item_orders_{$orders}' class='input-s' /></td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_tips_".$orders."' id='item_tips_{$orders}' class='input-80' /></td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_desc_".$orders."' id='item_desc_{$orders}' class='input-txt' /></td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_score_".$orders."' id='item_score_{$orders}' class='input-s' />分</td>\n" ).( "   <td class='hback' align='center'><a href='javascript:void(0);' onclick='subject_countnums();subject_del($(this), ".$orders.");'>移除</a></td>\n" )."</tr>\n";
        echo json_encode( array( "list" => $itemlist ) );
    }

    public function control_commersetting( )
    {
        $itemlist = "";
        $sort = XRequest::getint( "sort" );
        $orders = $sort + 1;
        $itemlist .= "<tr class='itemlist' onMouseOver=\"overColor(this)\" onMouseOut=\"outColor(this)\">\n".( "   <td class='hback' align='center'> 收费".$orders." </td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_orders_".$orders."' id='item_orders_{$orders}' class='input-s' /></td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_days_".$orders."' id='item_days_{$orders}' class='input-s' /> 天</td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_money_".$orders."' id='item_money_{$orders}' class='input-s' /> 元</td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_points_".$orders."' id='item_points_{$orders}' class='input-s' /> 分</td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_mbsms_".$orders."' id='item_mbsms_{$orders}' class='input-s' /> 条</td>\n" ).( "   <td class='hback' align='center'><a href='javascript:void(0);' onclick='commersetting_countnums();commersetting_del($(this), ".$orders.");'>移除</a></td>\n" )."</tr>\n";
        echo json_encode( array( "list" => $itemlist ) );
    }

    public function control_smsfee( )
    {
        $itemlist = "";
        $sort = XRequest::getint( "sort" );
        $orders = $sort + 1;
        $itemlist .= "<tr class='itemlist' onMouseOver=\"overColor(this)\" onMouseOut=\"outColor(this)\">\n".( "   <td class='hback' align='center'> 类别".$orders." </td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_orders_".$orders."' id='item_orders_{$orders}' class='input-s' /></td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_nums_".$orders."' id='item_nums_{$orders}' class='input-s' /> 条</td>\n" ).( "   <td class='hback' align='center'><input type='text' name='item_money_".$orders."' id='item_money_{$orders}' class='input-s' /> 元</td>\n" ).( "   <td class='hback' align='center'><a href='javascript:void(0);' onclick='smsfee_countnums();smsfee_del($(this), ".$orders.");'>移除</a></td>\n" )."</tr>\n";
        echo json_encode( array( "list" => $itemlist ) );
    }

    public function control_tj( )
    {
        $model = parent::model( "ajax", "am" );
        $message = $model->doTj( );
        unset( $model );
        echo json_encode( array( "message" => $message ) );
    }

    public function control_getsmsbalance( )
    {
        $model = parent::model( "sms", "am" );
        list( $res, $mess ) = $model->balanceSms( );
        unset( $model );
        echo json_encode( array( "response" => $res, "message" => $mess ) );
    }

    public function control_testsms( )
    {
        $res = FALSE;
        $mess = "";
        $content = "这是一条后台发送的短信验证信息，如能正常接收表示接口设置成功。";
        if ( !defined( "OESMS_TESTMOBILE" ) )
        {
            $res = FALSE;
            $mess = "手机号码不能为空";
        }
        else
        {
            $model = parent::model( "sms", "am" );
            list( $res, $mess ) = $model->sendSms( OESMS_TESTMOBILE, $content );
            unset( $model );
        }
        echo json_encode( array( "response" => $res, "message" => $mess ) );
    }

    public function control_testmail( )
    {
        $res = FALSE;
        $mess = "";
        $model = parent::model( "mail", "am" );
        list( $res, $mess ) = $model->sendTestMail( );
        unset( $model );
        if ( TRUE === $res )
        {
            if ( empty( $mess ) )
            {
                $mess = "邮件发送成功，请注意查收";
            }
        }
        else if ( empty( $mess ) )
        {
            $mess = "邮件发送失败，请检查相关配置";
        }
        echo json_encode( array( "response" => $res, "message" => $mess ) );
    }

    public function control_setavatar( )
    {
        $res = FALSE;
        $mess = "";
        $img = XRequest::getargs( "img" );
        $userid = XRequest::getint( "userid" );
        $args = XRequest::getgpc( array( "x", "y", "w", "h", "pw", "ph" ) );
        $args['x'] = intval( $args['x'] );
        $args['y'] = intval( $args['y'] );
        $args['w'] = intval( $args['w'] );
        $args['h'] = intval( $args['h'] );
        $args['pw'] = intval( $args['pw'] );
        $args['ph'] = intval( $args['ph'] );
        if ( $args['x'] == 0 && $args['y'] == 0 && $args['w'] == 0 && $args['h'] == 0 )
        {
            $mess .= "图片坐标不正确！\n";
        }
        if ( $args['pw'] < parent::$cfg['avatarwidth'] || $args['ph'] < parent::$cfg['avatarheight'] )
        {
            $mess .= "图片大小不符合，至少".parent::$cfg['avatarwidth']."x".parent::$cfg['avatarheight']."像素\n";
        }
        if ( empty( $img ) )
        {
            $mess .= "图片不能为空！\n";
        }
        else if ( substr( $img, 0, 15 ) != "data/attachment" )
        {
            $mess .= "图片地址不正确！\n";
        }
        if ( $userid <= 0 )
        {
            $mess .= " 会员ID错误！\n";
        }
        if ( empty( $mess ) )
        {
            $model_avatar = parent::model( "avatar", "am" );
            if ( TRUE === $model_avatar->doCutAvatar( $userid, $img, $args, "admin" ) )
            {
                $res = TRUE;
                if ( $args['type'] == "user" && intval( parent::$cfg['auditavatar'] ) == 1 )
                {
                    $mess = "设置成功，请等待网站审核";
                }
                else
                {
                    $mess = "设置成功";
                }
            }
            else
            {
                $res = FALSE;
                $mess = "设置失败";
            }
            unset( $model_avatar );
        }
        echo json_encode( array( "response" => $res, "message" => $mess ) );
    }

}

?>
