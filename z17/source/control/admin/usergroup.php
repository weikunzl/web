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
        $this->checkAuth( "usergroup_volist" );
        $searchsql = "";
        $model = parent::model( "usergroup", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=usergroup";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "usergroup" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."usergroup.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "usergroup_add" );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."usergroup.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "usergroup_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "usergroup", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "usergroup" => $data,
                "id" => $id,
                "page" => $this->page
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."usergroup.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "usergroup_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "usergroup", "am" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "usergroup_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=usergroup", 0 );
        }
        else
        {
            $this->log( "usergroup_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "usergroup_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "usergroup", "am" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "usergroup_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=usergroup&page=".$this->page."", 0 );
        }
        else
        {
            $this->log( "usergroup_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $this->checkAuth( "usergroup_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "usergroup", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            $result = $model->doDel( $id );
        }
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "usergroup_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=usergroup", 0 );
        }
        else
        {
            $this->log( "usergroup_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
    }

    private function _validAdd( )
    {
        $args = XRequest::getgpc( array( "groupname", "orders", "maleimg", "femaleimg", "regpoints", "regmoney", "loginpoints", "intro" ) );
        $args['orders'] = intval( $args['orders'] );
        $args['regpoints'] = floatval( $args['regpoints'] );
        $args['regmoney'] = floatval( $args['regmoney'] );
        $args['loginpoints'] = floatval( $args['loginpoints'] );
        $msgargs = XRequest::getgpc( array( "txsendlimit", "txsendnum", "txviewlimit", "txviewnum", "yxsendlimit", "yxsendnum", "yxviewlimit", "yxviewnum", "msgistop", "sendsms" ) );
        $msgargs['txsendlimit'] = intval( $msgargs['txsendlimit'] );
        $msgargs['txsendnum'] = intval( $msgargs['txsendnum'] );
        $msgargs['txviewlimit'] = intval( $msgargs['txviewlimit'] );
        $msgargs['txviewnum'] = intval( $msgargs['txviewnum'] );
        $msgargs['yxsendlimit'] = intval( $msgargs['yxsendlimit'] );
        $msgargs['yxsendnum'] = intval( $msgargs['yxsendnum'] );
        $msgargs['yxviewlimit'] = intval( $msgargs['yxviewlimit'] );
        $msgargs['yxviewnum'] = intval( $msgargs['yxviewnum'] );
        $msgargs['msgistop'] = intval( $msgargs['msgistop'] );
        $msgargs['sendsms'] = intval( $msgargs['sendsms'] );
        $msgsetting = serialize( $msgargs );
        $viewargs = XRequest::getgpc( array( "viewcontact", "viewlogintime", "viewphoto", "viewvisitor", "viewmatch", "useadvsearch", "viewonlineuser", "webim", "viewemail", "viewmobile", "viewqq", "viewweibo", "viewmsn" ) );
        $viewargs['viewcontact'] = intval( $viewargs['viewcontact'] );
        $viewargs['viewlogintime'] = intval( $viewargs['viewlogintime'] );
        $viewargs['viewphoto'] = intval( $viewargs['viewphoto'] );
        $viewargs['viewvisitor'] = intval( $viewargs['viewvisitor'] );
        $viewargs['viewmatch'] = intval( $viewargs['viewmatch'] );
        $viewargs['useadvsearch'] = intval( $viewargs['useadvsearch'] );
        $viewargs['viewonlineuser'] = intval( $viewargs['viewonlineuser'] );
        $viewargs['webim'] = intval( $viewargs['webim'] );
        $viewargs['viewemail'] = intval( $viewargs['viewemail'] );
        $viewargs['viewmobile'] = intval( $viewargs['viewmobile'] );
        $viewargs['viewqq'] = intval( $viewargs['viewqq'] );
        $viewargs['viewweibo'] = intval( $viewargs['viewweibo'] );
        $viewargs['viewmsn'] = intval( $viewargs['viewmsn'] );
        $viewsetting = serialize( $viewargs );
        $photoargs = XRequest::getgpc( array( "photolimit", "photonum" ) );
        $photoargs['photolimit'] = intval( $photoargs['photolimit'] );
        $photoargs['photonum'] = intval( $photoargs['photonum'] );
        $photosetting = serialize( $photoargs );
        $friendargs = XRequest::getgpc( array( "friendlimit", "friendnum" ) );
        $friendargs['friendlimit'] = intval( $friendargs['friendlimit'] );
        $friendargs['friendnum'] = intval( $friendargs['friendnum'] );
        $friendsetting = serialize( $friendargs );
        $pubargs = XRequest::getgpc( array( "pubdiary", "diarypoints", "pubask", "askpoints", "pubdating", "datingpoints", "pubcomment" ) );
        $pubargs['pubdiary'] = intval( $pubargs['pubdiary'] );
        $pubargs['diarypoints'] = floatval( $pubargs['diarypoints'] );
        $pubargs['pubask'] = intval( $pubargs['pubask'] );
        $pubargs['askpoints'] = floatval( $pubargs['askpoints'] );
        $pubargs['pubdating'] = intval( $pubargs['pubdating'] );
        $pubargs['datingpoints'] = floatval( $pubargs['datingpoints'] );
        $pubargs['pubcomment'] = intval( $pubargs['pubcomment'] );
        $publishsetting = serialize( $pubargs );
        $feeargs = XRequest::getgpc( array( "contactfee", "emailfee", "mobilefee", "qqfee", "msnfee", "albumfee", "viewmsgfee", "sendmsgfee", "smsfee" ) );
        $feeargs['contactfee'] = floatval( $feeargs['contactfee'] );
        $feeargs['emailfee'] = floatval( $feeargs['emailfee'] );
        $feeargs['mobilefee'] = floatval( $feeargs['mobilefee'] );
        $feeargs['qqfee'] = floatval( $feeargs['qqfee'] );
        $feeargs['msnfee'] = floatval( $feeargs['msnfee'] );
        $feeargs['albumfee'] = floatval( $feeargs['albumfee'] );
        $feeargs['viewmsgfee'] = floatval( $feeargs['viewmsgfee'] );
        $feeargs['sendmsgfee'] = floatval( $feeargs['sendmsgfee'] );
        $feeargs['smsfee'] = floatval( $feeargs['smsfee'] );
        $feesetting = serialize( $feeargs );
        if ( empty( $args['groupname'] ) )
        {
            XHandle::halt( "组名称不能为空", "", 1 );
        }
        if ( $args['orders'] < 0 )
        {
            XHandle::halt( "组排序不能为空", "", 1 );
        }
        if ( empty( $args['maleimg'] ) )
        {
            XHandle::halt( "男会员标识不能为空", "", 1 );
        }
        if ( empty( $args['femaleimg'] ) )
        {
            XHandle::halt( "女会员标识不能为空", "", 1 );
        }
        $args['msgsetting'] = $msgsetting;
        $args['viewsetting'] = $viewsetting;
        $args['photosetting'] = $photosetting;
        $args['friendsetting'] = $friendsetting;
        $args['publishsetting'] = $publishsetting;
        $args['feesetting'] = $feesetting;
        $args['commersetting'] = $this->_getAllItem( );
        return $args;
    }

    private function _validEdit( )
    {
        $id = XRequest::getint( "id" );
        $args = XRequest::getgpc( array( "groupname", "orders", "maleimg", "femaleimg", "regpoints", "regmoney", "loginpoints", "intro" ) );
        $args['orders'] = intval( $args['orders'] );
        $args['regpoints'] = floatval( $args['regpoints'] );
        $args['regmoney'] = floatval( $args['regmoney'] );
        $args['loginpoints'] = floatval( $args['loginpoints'] );
        $msgargs = XRequest::getgpc( array( "txsendlimit", "txsendnum", "txviewlimit", "txviewnum", "yxsendlimit", "yxsendnum", "yxviewlimit", "yxviewnum", "msgistop", "sendsms" ) );
        $msgargs['txsendlimit'] = intval( $msgargs['txsendlimit'] );
        $msgargs['txsendnum'] = intval( $msgargs['txsendnum'] );
        $msgargs['txviewlimit'] = intval( $msgargs['txviewlimit'] );
        $msgargs['txviewnum'] = intval( $msgargs['txviewnum'] );
        $msgargs['yxsendlimit'] = intval( $msgargs['yxsendlimit'] );
        $msgargs['yxsendnum'] = intval( $msgargs['yxsendnum'] );
        $msgargs['yxviewlimit'] = intval( $msgargs['yxviewlimit'] );
        $msgargs['yxviewnum'] = intval( $msgargs['yxviewnum'] );
        $msgargs['msgistop'] = intval( $msgargs['msgistop'] );
        $msgargs['sendsms'] = intval( $msgargs['sendsms'] );
        $msgsetting = serialize( $msgargs );
        $viewargs = XRequest::getgpc( array( "viewcontact", "viewlogintime", "viewphoto", "viewvisitor", "viewmatch", "useadvsearch", "viewonlineuser", "webim", "viewemail", "viewmobile", "viewqq", "viewweibo", "viewmsn" ) );
        $viewargs['viewcontact'] = intval( $viewargs['viewcontact'] );
        $viewargs['viewlogintime'] = intval( $viewargs['viewlogintime'] );
        $viewargs['viewphoto'] = intval( $viewargs['viewphoto'] );
        $viewargs['viewvisitor'] = intval( $viewargs['viewvisitor'] );
        $viewargs['viewmatch'] = intval( $viewargs['viewmatch'] );
        $viewargs['useadvsearch'] = intval( $viewargs['useadvsearch'] );
        $viewargs['viewonlineuser'] = intval( $viewargs['viewonlineuser'] );
        $viewargs['webim'] = intval( $viewargs['webim'] );
        $viewargs['viewemail'] = intval( $viewargs['viewemail'] );
        $viewargs['viewmobile'] = intval( $viewargs['viewmobile'] );
        $viewargs['viewqq'] = intval( $viewargs['viewqq'] );
        $viewargs['viewweibo'] = intval( $viewargs['viewweibo'] );
        $viewargs['viewmsn'] = intval( $viewargs['viewmsn'] );
        $viewsetting = serialize( $viewargs );
        $photoargs = XRequest::getgpc( array( "photolimit", "photonum" ) );
        $photoargs['photolimit'] = intval( $photoargs['photolimit'] );
        $photoargs['photonum'] = intval( $photoargs['photonum'] );
        $photosetting = serialize( $photoargs );
        $friendargs = XRequest::getgpc( array( "friendlimit", "friendnum" ) );
        $friendargs['friendlimit'] = intval( $friendargs['friendlimit'] );
        $friendargs['friendnum'] = intval( $friendargs['friendnum'] );
        $friendsetting = serialize( $friendargs );
        $pubargs = XRequest::getgpc( array( "pubdiary", "diarypoints", "pubask", "askpoints", "pubdating", "datingpoints", "pubcomment" ) );
        $pubargs['pubdiary'] = intval( $pubargs['pubdiary'] );
        $pubargs['diarypoints'] = floatval( $pubargs['diarypoints'] );
        $pubargs['pubask'] = intval( $pubargs['pubask'] );
        $pubargs['askpoints'] = floatval( $pubargs['askpoints'] );
        $pubargs['pubdating'] = intval( $pubargs['pubdating'] );
        $pubargs['datingpoints'] = floatval( $pubargs['datingpoints'] );
        $pubargs['pubcomment'] = intval( $pubargs['pubcomment'] );
        $publishsetting = serialize( $pubargs );
        $feeargs = XRequest::getgpc( array( "contactfee", "emailfee", "mobilefee", "qqfee", "msnfee", "albumfee", "viewmsgfee", "sendmsgfee", "smsfee" ) );
        $feeargs['contactfee'] = floatval( $feeargs['contactfee'] );
        $feeargs['emailfee'] = floatval( $feeargs['emailfee'] );
        $feeargs['mobilefee'] = floatval( $feeargs['mobilefee'] );
        $feeargs['qqfee'] = floatval( $feeargs['qqfee'] );
        $feeargs['msnfee'] = floatval( $feeargs['msnfee'] );
        $feeargs['albumfee'] = floatval( $feeargs['albumfee'] );
        $feeargs['viewmsgfee'] = floatval( $feeargs['viewmsgfee'] );
        $feeargs['sendmsgfee'] = floatval( $feeargs['sendmsgfee'] );
        $feeargs['smsfee'] = floatval( $feeargs['smsfee'] );
        $feesetting = serialize( $feeargs );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['groupname'] ) )
        {
            XHandle::halt( "组名称不能为空", "", 1 );
        }
        if ( $args['orders'] < 0 )
        {
            XHandle::halt( "组排序不能为空", "", 1 );
        }
        if ( empty( $args['maleimg'] ) )
        {
            XHandle::halt( "男会员标识不能为空", "", 1 );
        }
        if ( empty( $args['femaleimg'] ) )
        {
            XHandle::halt( "女会员标识不能为空", "", 1 );
        }
        $args['msgsetting'] = $msgsetting;
        $args['viewsetting'] = $viewsetting;
        $args['photosetting'] = $photosetting;
        $args['friendsetting'] = $friendsetting;
        $args['publishsetting'] = $publishsetting;
        $args['feesetting'] = $feesetting;
        $args['commersetting'] = $this->_getAllItem( );
        return array(
            $id,
            $args
        );
    }

    private function _validID( $id )
    {
        if ( empty( $id ) )
        {
            XHandle::halt( "ID丢失，请选择要操作的ID", "", 1 );
        }
    }

    private function _getAllItem( )
    {
        $itemmaxsort = XRequest::getint( "itemmaxsort" );
        $array = array( );
        if ( 0 < $itemmaxsort )
        {
            $i = 1;
            for ( ; $i < $itemmaxsort + 1; ++$i )
            {
                $orders = intval( XRequest::getint( "item_orders_".$i ) );
                $days = intval( XRequest::getargs( "item_days_".$i ) );
                $money = floatval( XRequest::getargs( "item_money_".$i ) );
                $points = floatval( XRequest::getargs( "item_points_".$i ) );
                $mbsms = intval( XRequest::getint( "item_mbsms_".$i ) );
                if ( 0 < $orders )
                {
                    $array[] = array(
                        "orders" => $orders,
                        "days" => $days,
                        "money" => $money,
                        "points" => $points,
                        "mbsms" => $mbsms
                    );
                }
            }
        }
        if ( !empty( $array ) && is_array( $array ) )
        {
            $array = XHandle::syssortarray( $array, "orders" );
            return serialize( $array );
        }
        return "";
    }

}

?>
