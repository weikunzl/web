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
class passportWService extends X
{

    public function validForward( )
    {
        $forward = XRequest::getargs( "forward" );
        if ( empty( $forward ) )
        {
            $forward = $_SERVER['HTTP_REFERER'];
        }
        if ( strpos( $forward, "passport" ) )
        {
            $forward = parent::$urlpath."wap.php";
        }
        return $forward;
    }

    public function validLogin( )
    {
        $loginname = XRequest::getargs( "loginname" );
        $password = XRequest::getargs( "password" );
        if ( empty( $loginname ) )
        {
            XHandle::waphalt( "登录帐号不能为空", "", 1 );
        }
        else if ( FALSE === XValid::isemail( $loginname ) && FALSE === XValid::isuserargs( $loginname ) )
        {
            XHandle::waphalt( "登录帐号格式不正确", "", 1 );
        }
        if ( empty( $password ) )
        {
            XHandle::waphalt( "登录密码不能为空", "", 1 );
        }
        return array(
            $loginname,
            $password
        );
    }

    public function validReg1( )
    {
        $args = XRequest::getgpc( array( "username", "password", "email", "gender", "birthday", "marrystatus", "lovesort", "education", "salary", "height", "weight", "provinceid", "mobile", "qq", "idnumber" ) );
        if ( FALSE === XValid::isuserargs( $args['username'] ) )
        {
            XHandle::waphalt( "用户名格式不正确", "", 1 );
        }
        else
        {
            if ( XHandle::getlength( $args['username'] ) < 3 || 16 < XHandle::getlength( $args['username'] ) )
            {
                XHandle::waphalt( "用户名长度不正确，必须为3-16个字符，1个汉字=2个字符", "", 1 );
            }
            else
            {
                if ( TRUE === XFilter::checkexistsforbidusername( $args['username'] ) )
                {
                    XHandle::waphalt( "对不起，该用户名系统已禁止注册！", "", 1 );
                }
                if ( intval( parent::$cfg['regusernumber'] ) == 1 && TRUE === XValid::contnumber( $args['username'], parent::$cfg['usernumberlen'] ) )
                {
                    XHandle::waphalt( "对不起，用户名不能连续出现".parent::$cfg['usernumberlen']."个数字", "", 1 );
                }
            }
        }
        $m = parent::model( "passport", "im" );
        if ( TRUE === $m->doExistsUserName( $args['username'] ) )
        {
            XHandle::waphalt( "对不起，该用户名已存在！", "", 1 );
        }
        if ( FALSE === XValid::islength( $args['password'], 6, 16 ) )
        {
            XHandle::waphalt( "密码长度不正确", "", 1 );
        }
        if ( FALSE === XValid::isemail( $args['email'] ) )
        {
            XHandle::waphalt( "邮箱格式不能为空", "", 1 );
        }
        if ( TRUE === $m->doExistsEmail( $args['email'] ) )
        {
            XHandle::waphalt( "对不起，该邮箱已存在！", "", 1 );
        }
        unset( $m );
        $args['gender'] = intval( $args['gender'] );
        $args['birthday'] = intval( $args['birthday'] );
        $args['marrystatus'] = intval( $args['marrystatus'] );
        $args['lovesort'] = intval( $args['lovesort'] );
        $args['education'] = intval( $args['education'] );
        $args['salary'] = intval( $args['salary'] );
        $args['height'] = intval( $args['height'] );
        $args['weight'] = intval( $args['weight'] );
        $args['provinceid'] = intval( $args['provinceid'] );
        if ( $args['gender'] < 1 )
        {
            XHandle::waphalt( "请选择性别", "", 1 );
        }
        if ( strlen( $args['birthday'] ) != 8 )
        {
            XHandle::waphalt( "生日格式不正确", "", 1 );
        }
        else
        {
            $args['ageyear'] = substr( $args['birthday'], 0, 4 );
            $args['agemonth'] = substr( $args['birthday'], 4, 2 );
            $args['ageday'] = substr( $args['birthday'], 6, 2 );
        }
        if ( $args['marrystatus'] < 1 )
        {
            XHandle::waphalt( "请选择婚姻状态", "", 1 );
        }
        if ( $args['education'] < 1 )
        {
            XHandle::waphalt( "请选择学历", "", 1 );
        }
        if ( $args['height'] < 1 )
        {
            XHandle::waphalt( "请选择身高", "", 1 );
        }
        if ( $args['provinceid'] < 1 )
        {
            XHandle::waphalt( "请选择地区", "", 1 );
        }
        if ( intval( parent::$cfg['reglovesort'] ) == 1 && intval( parent::$cfg['requestlovesort'] ) == 1 && $args['lovesort'] < 1 )
        {
            XHandle::waphalt( "请选择交友类别", "", 1 );
        }
        if ( intval( parent::$cfg['regsalary'] ) == 1 && intval( parent::$cfg['requestsalary'] ) == 1 && $args['salary'] < 1 )
        {
            XHandle::waphalt( "请选择月薪收入", "", 1 );
        }
        if ( intval( parent::$cfg['regweight'] ) == 1 && intval( parent::$cfg['requestweight'] ) == 1 && $args['weight'] < 1 )
        {
            XHandle::waphalt( "请选择体重", "", 1 );
        }
        if ( intval( parent::$cfg['regmobile'] ) == 1 && intval( parent::$cfg['requestmobile'] ) == 1 && FALSE === XValid::ismobile( $args['mobile'] ) )
        {
            XHandle::waphalt( "手机号码格式不正确", "", 1 );
        }
        if ( intval( parent::$cfg['regqq'] ) == 1 && intval( parent::$cfg['requestqq'] ) == 1 && FALSE === XValid::isqq( $args['qq'] ) )
        {
            XHandle::waphalt( "QQ号码格式不正确", "", 1 );
        }
        if ( intval( parent::$cfg['regidnumber'] ) == 1 && intval( parent::$cfg['requestidnumber'] ) == 1 && !( strlen( $args['idnumber'] ) == 15  ||  strlen( $args['idnumber'] ) == 18 ) )
        {
            XHandle::waphalt( "身份证号格式不正确", "", 1 );
        }
        return $args;
    }

    public function validRegPost( )
    {
        $main_args = XRequest::getgpc( array( "username", "password", "email", "gender" ) );
        $main_args['gender'] = intval( $main_args['gender'] );
        $profile_args = XRequest::getgpc( array( "ageyear", "agemonth", "ageday", "marrystatus", "lovesort", "education", "salary", "height", "weight", "provinceid", "cityid", "distid" ) );
        $contact_args = XRequest::getgpc( array( "mobile", "qq", "idnumber" ) );
        if ( FALSE === XValid::isuserargs( $main_args['username'] ) )
        {
            XHandle::waphalt( "用户名格式不正确", "", 1 );
        }
        else
        {
            if ( XHandle::getlength( $main_args['username'] ) < 3 || 16 < XHandle::getlength( $main_args['username'] ) )
            {
                XHandle::waphalt( "用户名长度不正确，必须为3-16个字符，1个汉字=2个字符", "", 1 );
            }
            else
            {
                if ( TRUE === XFilter::checkexistsforbidusername( $args['username'] ) )
                {
                    XHandle::waphalt( "对不起，该用户名系统已禁止注册！", "", 1 );
                }
                if ( intval( parent::$cfg['regusernumber'] ) == 1 && TRUE === XValid::contnumber( $args['username'], parent::$cfg['usernumberlen'] ) )
                {
                    XHandle::waphalt( "对不起，用户名不能连续出现".parent::$cfg['usernumberlen']."个数字", "", 1 );
                }
            }
        }
        $m = parent::model( "passport", "im" );
        if ( TRUE === $m->doExistsUserName( $main_args['username'] ) )
        {
            XHandle::waphalt( "对不起，该用户名已存在！", "", 1 );
        }
        if ( FALSE === XValid::islength( $main_args['password'], 6, 16 ) )
        {
            XHandle::waphalt( "密码长度不正确", "", 1 );
        }
        if ( FALSE === XValid::isemail( $main_args['email'] ) )
        {
            XHandle::waphalt( "邮箱格式不能为空", "", 1 );
        }
        if ( TRUE === $m->doExistsEmail( $main_args['email'] ) )
        {
            XHandle::waphalt( "对不起，该邮箱已存在！", "", 1 );
        }
        unset( $m );
        $profile_args['ageyear'] = intval( $profile_args['ageyear'] );
        $profile_args['agemonth'] = intval( $profile_args['agemonth'] );
        $profile_args['ageday'] = intval( $profile_args['ageday'] );
        $profile_args['marrystatus'] = intval( $profile_args['marrystatus'] );
        $profile_args['lovesort'] = intval( $profile_args['lovesort'] );
        $profile_args['education'] = intval( $profile_args['education'] );
        $profile_args['salary'] = intval( $profile_args['salary'] );
        $profile_args['height'] = intval( $profile_args['height'] );
        $profile_args['weight'] = intval( $profile_args['weight'] );
        $profile_args['provinceid'] = intval( $profile_args['provinceid'] );
        $profile_args['cityid'] = intval( $profile_args['cityid'] );
        $profile_args['distid'] = intval( $profile_args['distid'] );
        if ( $profile_args['ageyear'] < 1 )
        {
            XHandle::waphalt( "请选择生日年份", "", 1 );
        }
        if ( $profile_args['agemonth'] < 1 || 12 < $profile_args['agemonth'] )
        {
            XHandle::waphalt( "请选择生日月份", "", 1 );
        }
        if ( $profile_args['ageday'] < 1 || 31 < $profile_args['ageday'] )
        {
            XHandle::waphalt( "请选择生日日期", "", 1 );
        }
        if ( strlen( $profile_args['agemonth'] ) == 1 )
        {
            $profile_args['agemonth'] = "0".$profile_args['agemonth'];
        }
        if ( strlen( $profile_args['ageday'] ) == 1 )
        {
            $profile_args['ageday'] = "0".$profile_args['ageday'];
        }
        $profile_args['birthday'] = $profile_args['ageyear']."-".$profile_args['agemonth']."-".$profile_args['ageday'];
        if ( $profile_args['marrystatus'] == 0 )
        {
            XHandle::waphalt( "请选择婚姻状态", "", 1 );
        }
        if ( empty( $profile_args['education'] ) )
        {
            XHandle::waphalt( "请选择学历", "", 1 );
        }
        if ( $profile_args['height'] == 0 )
        {
            XHandle::waphalt( "请选择身高", "", 1 );
        }
        if ( $profile_args['provinceid'] == 0 )
        {
            XHandle::waphalt( "请选择所在一级地区", "", 1 );
        }
        if ( $profile_args['cityid'] == 0 )
        {
            XHandle::waphalt( "请选择所在二级地区", "", 1 );
        }
        if ( intval( parent::$cfg['reglovesort'] ) == 1 && intval( parent::$cfg['requestlovesort'] ) == 1 && $profile_args['lovesort'] == 0 )
        {
            XHandle::waphalt( "请选择交友类型", "", 1 );
        }
        if ( intval( parent::$cfg['regsalary'] ) == 1 && intval( parent::$cfg['requestsalary'] ) == 1 && $profile_args['salary'] == 0 )
        {
            XHandle::waphalt( "请选择月薪收入", "", 1 );
        }
        if ( intval( parent::$cfg['regweight'] ) == 1 && intval( parent::$cfg['requestweight'] ) == 1 && $profile_args['weight'] == 0 )
        {
            XHandle::waphalt( "请选择体重", "", 1 );
        }
        if ( intval( parent::$cfg['regmobile'] ) == 1 && intval( parent::$cfg['requestmobile'] ) == 1 && FALSE === XValid::ismobile( $contact_args['mobile'] ) )
        {
            XHandle::waphalt( "手机号码格式不正确", "", 1 );
        }
        if ( intval( parent::$cfg['regqq'] ) == 1 && intval( parent::$cfg['requestqq'] ) == 1 && FALSE === XValid::isqq( $contact_args['qq'] ) )
        {
            XHandle::waphalt( "QQ号码格式不正确", "", 1 );
        }
        if ( intval( parent::$cfg['regidnumber'] ) == 1 && intval( parent::$cfg['requestidnumber'] ) == 1 && !( strlen( $contact_args['idnumber'] ) == 15 || strlen( $contact_args['idnumber'] ) == 18 ) )
        {
            XHandle::waphalt( "身份证号格式不正确", "", 1 );
        }
        $lunar = parent::import( "lunar", "util" );
        $profile_args['astro'] = $lunar->getAstro( $profile_args['birthday'] );
        $profile_args['lunar'] = $lunar->getLunar( $profile_args['birthday'] );
        $lungarID = $lunar->getLunarID( $profile_args['lunar'] );
        $astroID = $lunar->getAstroID( $profile_args['astro'] );
        unset( $lunar );
        $params_args = array(
            "gender" => $main_args['gender'],
            "ageyear" => $profile_args['ageyear'],
            "provinceid" => $profile_args['provinceid'],
            "cityid" => $profile_args['cityid'],
            "distid" => $profile_args['distid'],
            "height" => $profile_args['height'],
            "weight" => $profile_args['weight'],
            "salary" => $profile_args['salary'],
            "education" => $profile_args['education'],
            "marry" => $profile_args['marrystatus'],
            "lovesort" => $profile_args['lovesort'],
            "lunar" => $lungarID,
            "astro" => $astroID
        );
        return array(
            $main_args,
            $profile_args,
            $contact_args,
            $params_args
        );
    }

    public function validMonolog( )
    {
        $content = XRequest::getargs( "content" );
        if ( XHandle::getwordlength( $content ) < 20 || 1500 < XHandle::getwordlength( $content ) )
        {
            XHandle::waphalt( "内心独白必须在20~1500个字。", "", 1 );
        }
        return $content;
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

}

?>
