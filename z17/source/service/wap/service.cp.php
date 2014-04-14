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
class cpWService extends X
{

    public function validPassword( )
    {
        $args = XRequest::getgpc( array( "oldpassword", "newpassword", "confirmpassword" ) );
        if ( empty( $args['oldpassword'] ) )
        {
            XHandle::waphalt( "旧密码不能为空", "", 1 );
        }
        if ( empty( $args['newpassword'] ) )
        {
            XHandle::waphalt( "新密码不能为空", "", 1 );
        }
        else if ( FALSE === XValid::islength( $args['newpassword'], 4, 16 ) )
        {
            XHandle::waphalt( "新密码长度必须6-16个字符", "", 1 );
        }
        if ( $args['confirmpassword'] != $args['newpassword'] )
        {
            XHandle::waphalt( "确认新密码不正确", "", 1 );
        }
        unset( $args['confirmpassword'] );
        return $args;
    }

    public function validMonolog( )
    {
        $content = XRequest::getargs( "content" );
        if ( !empty( $content ) )
        {
            if ( TRUE === XFilter::checkexistsforbidchar( $content ) )
            {
                XHandle::waphalt( "对不起，输入的内心独白，含有系统禁止的字符！", "", 1 );
            }
        }
        $content = XFilter::filterforbidchar( $content );
        if ( XHandle::getwordlength( $content ) < 20 || 1500 < XHandle::getwordlength( $content ) )
        {
            XHandle::waphalt( "对不起，内心独白字数必须在20~1500个之间。", "", 1 );
        }
        if ( intval( parent::$cfg['filternumber'] ) == 1 && 0 < intval( parent::$cfg['filterlennumber'] ) )
        {
            if ( TRUE === XValid::contnumber( $content, parent::$cfg['filterlennumber'] ) )
            {
                XHandle::waphalt( "对不起，内心独白不能连续出现".parent::$cfg['filterlennumber']."个数字", "", 1 );
            }
        }
        return $content;
    }

    public function validContact( )
    {
        $args = XRequest::getgpc( array( "privacy", "telephone", "mobilerz", "mobile", "qq", "msn", "address", "zipcode", "skype", "homepage", "facebook" ) );
        $args['privacy'] = intval( $args['privacy'] );
        $args['mobilerz'] = intval( $args['mobilerz'] );
        if ( empty( $args['mobile'] ) && empty( $args['qq'] ) )
        {
            XHandle::waphalt( "手机号码和QQ号码至少填写一项", "", 1 );
        }
        else
        {
            if ( $args['mobilerz'] == 0 )
            {
                if ( !empty( $args['mobile'] ) )
                {
                    if ( FALSE === XValid::ismobile( $args['mobile'] ) )
                    {
                        XHandle::waphalt( "对不起，手机号码格式不正确，请填写11位有效手机号。", "", 1 );
                    }
                }
            }
            if ( !empty( $args['qq'] ) )
            {
                if ( FALSE === XValid::isqq( $args['qq'] ) )
                {
                    XHandle::waphalt( "对不起，QQ号码格式不正确，请填写5-11位数字", "", 1 );
                }
            }
        }
        unset( $args['mobilerz'] );
        return $args;
    }

    public function validBase( )
    {
        $args = XRequest::getgpc( array( "blood", "childrenstatus", "nationality", "beforeregion", "lovesort", "personality", "national", "jobs", "salary", "housing", "caring", "weight", "profile", "charmparts", "hairstyle", "haircolor", "facestyle", "bodystyle" ) );
        $args['blood'] = intval( $args['blood'] );
        $args['childrenstatus'] = intval( $args['childrenstatus'] );
        $args['nationality'] = intval( $args['nationality'] );
        $args['beforeregion'] = intval( $args['beforeregion'] );
        $args['lovesort'] = intval( $args['lovesort'] );
        $args['personality'] = intval( $args['personality'] );
        $args['national'] = intval( $args['national'] );
        $args['jobs'] = intval( $args['jobs'] );
        $args['salary'] = intval( $args['salary'] );
        $args['housing'] = intval( $args['housing'] );
        $args['caring'] = intval( $args['caring'] );
        $args['weight'] = intval( $args['weight'] );
        $args['profile'] = intval( $args['profile'] );
        $args['charmparts'] = intval( $args['charmparts'] );
        $args['hairstyle'] = intval( $args['hairstyle'] );
        $args['haircolor'] = intval( $args['haircolor'] );
        $args['facestyle'] = intval( $args['facestyle'] );
        $args['bodystyle'] = intval( $args['bodystyle'] );
        return $args;
    }

    public function validProfile( )
    {
        $args = XRequest::getgpc( array( "companytype", "income", "workstatus", "companyname", "specialty", "school", "schoolyear", "tophome", "consume", "smoking", "drinking", "faith", "workout", "rest", "havechildren", "talive", "romantic" ) );
        $args['companytype'] = intval( $args['companytype'] );
        $args['income'] = intval( $args['income'] );
        $args['workstatus'] = intval( $args['workstatus'] );
        $args['specialty'] = intval( $args['specialty'] );
        $args['tophome'] = intval( $args['tophome'] );
        $args['consume'] = intval( $args['consume'] );
        $args['smoking'] = intval( $args['smoking'] );
        $args['drinking'] = intval( $args['drinking'] );
        $args['faith'] = intval( $args['faith'] );
        $args['workout'] = intval( $args['workout'] );
        $args['rest'] = intval( $args['rest'] );
        $args['havechildren'] = intval( $args['havechildren'] );
        $args['talive'] = intval( $args['talive'] );
        $args['romantic'] = intval( $args['romantic'] );
        $args['language'] = XRequest::getcomargs( "language" );
        $args['lifeskill'] = XRequest::getcomargs( "lifeskill" );
        $args['sports'] = XRequest::getcomargs( "sports" );
        $args['food'] = XRequest::getcomargs( "food" );
        $args['book'] = XRequest::getcomargs( "book" );
        $args['film'] = XRequest::getcomargs( "film" );
        $args['attention'] = XRequest::getcomargs( "attention" );
        $args['leisure'] = XRequest::getcomargs( "leisure" );
        $args['interest'] = XRequest::getcomargs( "interest" );
        $args['travel'] = XRequest::getcomargs( "travel" );
        return $args;
    }

    public function validID( )
    {
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::waphalt( "对不起，ID错误！", "", 1 );
            exit( );
        }
        return $id;
    }

    public function validDist1( )
    {
        $dist1 = XRequest::getint( "dist1" );
        if ( $dist1 < 1 )
        {
            XHandle::waphalt( "对不起，请选择一级地区", "", 1 );
        }
        return $dist1;
    }

    public function validDist2( )
    {
        $args = XRequest::getgpc( array( "provinceid", "cityid" ) );
        $args['provinceid'] = intval( $args['provinceid'] );
        $args['cityid'] = intval( $args['cityid'] );
        if ( $args['provinceid'] < 1 )
        {
            XHandle::waphalt( "对不起，请选择一级地区", "", 1 );
        }
        if ( $args['cityid'] < 1 )
        {
            XHandle::waphalt( "对不起，请选择二级地区", "", 1 );
        }
        return $args;
    }

    public function validArea( )
    {
        $args = XRequest::getgpc( array( "provinceid", "cityid", "distid" ) );
        $args['provinceid'] = intval( $args['provinceid'] );
        $args['cityid'] = intval( $args['cityid'] );
        $args['distid'] = intval( $args['distid'] );
        if ( $args['provinceid'] < 1 )
        {
            XHandle::waphalt( "对不起，请选择一级地区", "", 1 );
        }
        if ( $args['cityid'] < 1 )
        {
            XHandle::waphalt( "对不起，请选择二级地区", "", 1 );
        }
        return $args;
    }

    public function validHomeTownProvinceID( )
    {
        $nationprovinceid = XRequest::getint( "nationprovinceid" );
        if ( $nationprovinceid < 1 )
        {
            XHandle::waphalt( "对不起，请选择户籍一级地区", "", 1 );
        }
        return $nationprovinceid;
    }

    public function validHomeTownArea( )
    {
        $args = XRequest::getgpc( array( "nationprovinceid", "nationcityid" ) );
        $args['nationprovinceid'] = intval( $args['nationprovinceid'] );
        $args['nationcityid'] = intval( $args['nationcityid'] );
        if ( $args['nationprovinceid'] < 1 )
        {
            XHandle::waphalt( "对不起，请选择户籍一级地区", "", 1 );
        }
        if ( $args['nationcityid'] < 1 )
        {
            XHandle::waphalt( "对不起，请选择户籍二级地区", "", 1 );
        }
        return $args;
    }

    public function validAvatar( )
    {
        $files = XRequest::getargs( "uploadpart", "", FALSE );
        if ( empty( $files ) )
        {
            XHandle::waphalt( "请选择要上传的形象照", "", 1 );
        }
        return $files;
    }

    public function validUpload( )
    {
        $title = XRequest::getargs( "title" );
        $uploadpart = XRequest::getargs( "uploadpart", "", FALSE );
        if ( empty( $uploadpart ) )
        {
            XHandle::waphalt( "请选择要上传照片", "", 1 );
        }
        return array(
            $title,
            $uploadpart
        );
    }

    public function validToUid( )
    {
        $touid = XRequest::getint( "touid" );
        if ( $touid < 1 )
        {
            XHandle::waphalt( "对不起，对方ID错误！", "", 10 );
        }
        if ( parent::$wrap_user['userid'] == $touid )
        {
            XHandle::waphalt( "对不起，您不能给自己写信或者打招呼！", "", 10 );
        }
        return $touid;
    }

    public function validContent( )
    {
        $content = XRequest::getargs( "content" );
        if ( empty( $content ) )
        {
            XHandle::waphalt( "信件内容不能为空", "", 1 );
        }
        else if ( TRUE === XFilter::checkexistsforbidchar( $content ) )
        {
            XHandle::waphalt( "对不起，内容含有系统禁止的字符。", "", 1 );
        }
        return $content;
    }

}

?>
