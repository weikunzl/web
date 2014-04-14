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
class systemmsgAService extends X
{

    public function validGroup( )
    {
        $conds = XRequest::getgpc( array( "gender", "startage", "endage", "regdiffday", "regdiffdaytype", "logindiffday", "logindiffdaytype", "avatar", "provinceid", "cityid", "distid", "emailrz", "videorz", "idnumberrz", "mobilerz" ) );
        $groupid = XRequest::getcomargs( "groupid" );
        $marry = XRequest::getcomargs( "marry" );
        $lovesort = XRequest::getcomargs( "lovesort" );
        $args = XRequest::getgpc( array( "pagesize", "refresh", "subject" ) );
        $content = XRequest::getargs( "content", "", FALSE );
        $conds['gender'] = intval( $conds['gender'] );
        $conds['startage'] = intval( $conds['startage'] );
        $conds['endage'] = intval( $conds['endage'] );
        $conds['regdiffday'] = intval( $conds['regdiffday'] );
        $conds['regdiffdaytype'] = intval( $conds['regdiffdaytype'] );
        $conds['logindiffday'] = intval( $conds['logindiffday'] );
        $conds['logindiffdaytype'] = intval( $conds['logindiffdaytype'] );
        $conds['avatar'] = intval( $conds['avatar'] );
        $conds['provinceid'] = intval( $conds['provinceid'] );
        $conds['cityid'] = intval( $conds['cityid'] );
        $conds['distid'] = intval( $conds['distid'] );
        $conds['emailrz'] = intval( $conds['emailrz'] );
        $conds['videorz'] = intval( $conds['videorz'] );
        $conds['idnumberrz'] = intval( $conds['idnumberrz'] );
        $conds['mobilerz'] = intval( $conds['mobilerz'] );
        $args['pagesize'] = intval( $args['pagesize'] );
        $args['refresh'] = intval( $args['refresh'] );
        if ( empty( $args['subject'] ) )
        {
            XHandle::halt( "系统消息标题/主题不能为空", "", 1 );
        }
        if ( empty( $content ) )
        {
            XHandle::halt( "内容不能为空", "", 1 );
        }
        $args['content'] = $content;
        $sqltemp = "";
        $sqltemp = " WHERE 1=1";
        if ( $conds['gender'] == 1 )
        {
            $sqltemp .= " AND v.gender='1'";
        }
        else if ( $conds['gender'] == 2 )
        {
            $sqltemp .= " AND v.gender='2'";
        }
        if ( 0 < $conds['startage'] && $conds['endage'] )
        {
            $endyear = date( "Y", time( ) ) - $conds['startage'];
            $startyear = date( "Y", time( ) ) - $conds['endage'];
            $sqltemp .= " AND v.ageyear>=".$startyear." AND v.ageyear<=".$endyear."";
        }
        if ( 0 < $conds['regdiffday'] )
        {
            $rettime = strtotime( date( "Y-m-d", time( ) ) ) - $conds['regdiffday'] * 24 * 60 * 60;
            if ( $conds['regdiffdaytype'] == 1 )
            {
                $sqltemp .= " AND v.addtime>=".$rettime."";
            }
            else
            {
                $sqltemp .= " AND v.addtime<=".$endyear."";
            }
        }
        if ( 0 < $conds['logindiffday'] )
        {
            $logintime = strtotime( date( "Y-m-d", time( ) ) ) - $conds['logindiffday'] * 24 * 60 * 60;
            if ( $conds['logindiffdaytype'] == 1 )
            {
                $sqltemp .= " AND v.ontime>=".$logintime."";
            }
            else
            {
                $sqltemp .= " AND v.ontime<=".$logintime."";
            }
        }
        if ( $conds['avatar'] == 1 )
        {
            $sqltemp .= " AND v.avatar='0'";
        }
        else if ( $conds['avatar'] == 2 )
        {
            $sqltemp .= " AND v.avatar='2'";
        }
        else if ( $conds['avatar'] == 3 )
        {
            $sqltemp .= " AND v.avatar='1'";
        }
        if ( !empty( $lovesort ) )
        {
            $sqltemp .= " AND v.lovesort IN (".$lovesort.")";
        }
        if ( !empty( $marry ) )
        {
            $sqltemp .= " AND v.marry IN (".$marry.")";
        }
        if ( !empty( $groupid ) )
        {
            $sqltemp .= " AND v.groupid IN (".$groupid.")";
        }
        if ( 0 < $conds['provinceid'] )
        {
            $sqltemp .= " AND v.provinceid='".$conds['provinceid']."'";
        }
        if ( 0 < $conds['cityid'] )
        {
            $sqltemp .= " AND v.cityid='".$conds['cityid']."'";
        }
        if ( 0 < $conds['distid'] )
        {
            $sqltemp .= " AND v.distid='".$conds['distid']."'";
        }
        if ( $conds['emailrz'] == 1 )
        {
            $sqltemp .= " AND v.rzemail='0'";
        }
        else if ( $conds['emailrz'] == 2 )
        {
            $sqltemp .= " AND v.rzemail='1'";
        }
        if ( $conds['videorz'] == 1 )
        {
            $sqltemp .= " AND v.rzvideo='0'";
        }
        else if ( $conds['videorz'] == 2 )
        {
            $sqltemp .= " AND v.rzvideo='1'";
        }
        if ( $conds['idnumberrz'] == 1 )
        {
            $sqltemp .= " AND v.rzidnumber='0'";
        }
        else if ( $conds['idnumberrz'] == 2 )
        {
            $sqltemp .= " AND v.rzidnumber='1'";
        }
        if ( $conds['mobilerz'] == 1 )
        {
            $sqltemp .= " AND v.rzmobile='0'";
        }
        else if ( $conds['mobilerz'] == 2 )
        {
            $sqltemp .= " AND v.rzmobile='1'";
        }
        $code = parent::import( "code", "util" );
        $sqltemp = $code->authCode( $sqltemp, "ENCODE", OESOFT_RANDKEY, 0 );
        unset( $code );
        $args['sqltemp'] = $sqltemp;
        return $args;
    }

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "对不起，ID丢失。", "", 1 );
        }
        return $id;
    }

    public function validOffVip( )
    {
        $args = XRequest::getgpc( array( "pagesize", "refresh", "subject" ) );
        $content = XRequest::getargs( "content", "", FALSE );
        $args['content'] = $content;
        $tplid = XRequest::getint( "tplid" );
        $args['pagesize'] = intval( $args['pagesize'] );
        $args['refresh'] = intval( $args['refresh'] );
        if ( empty( $args['subject'] ) )
        {
            XHandle::halt( "系统消息标题/主题不能为空", "", 1 );
        }
        if ( empty( $content ) )
        {
            XHandle::halt( "内容不能为空", "", 1 );
        }
        $args['content'] = $content;
        $sqltemp = "";
        $sqltemp = " WHERE 1=1";
        $dateline = strtotime( date( "Y-m-d", time( ) ) );
        $sqltemp .= " AND v.viplevel>0 AND v.vipenddate<'".$dateline."'";
        $code = parent::import( "code", "util" );
        $sqltemp = $code->authCode( $sqltemp, "ENCODE", OESOFT_RANDKEY, 0 );
        unset( $code );
        $args['sqltemp'] = $sqltemp;
        return $args;
    }

}

?>
