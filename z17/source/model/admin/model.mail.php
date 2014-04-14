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
class mailAModel extends X
{

    private $mail_config = array( );
    private $mail_file = "./source/conf/mail.inc.php";

    private function _loadConfig( )
    {
        $mail_path = BASE_ROOT.$this->mail_file;
        if ( !defined( "OEMAIL_FLAG" ) )
        {
            require_once( $mail_path );
        }
        if ( empty( $this->mail_config ) )
        {
            $this->mail_config = array(
                "flag" => OEMAIL_FLAG,
                "smtp" => OEMAIL_SMTP,
                "port" => OEMAIL_PORT,
                "sender" => OEMAIL_SENDER,
                "email" => OEMAIL_EMAIL,
                "password" => OEMAIL_PASSWORD,
                "type" => OEMAIL_TYPE
            );
        }
    }

    public function sendMail( $mailto, $subject, $content, $attachment = "" )
    {
        $this->_loadConfig( );
        $result = FALSE;
        $error = "";
        if ( is_array( $this->mail_config ) && intval( $this->mail_config['flag'] ) == 1 )
        {
            if ( empty( $this->mail_config['smtp'] ) || empty( $this->mail_config['email'] ) || empty( $this->mail_config['password'] ) )
            {
                $error = "对不起，邮件参数设置不全！";
            }
            else if ( $this->mail_config['type'] == 2 && !get_cfg_var( "SMTP" ) )
            {
                $error = "对不起，PHP环境不支持SMTP服务！";
            }
            if ( empty( $error ) )
            {
                $mymail = parent::import( "mail", "util" );
                $mails = array(
                    "smtp" => $this->mail_config['smtp'],
                    "port" => $this->mail_config['port'],
                    "sendname" => $this->mail_config['sender'],
                    "sendmail" => $this->mail_config['email'],
                    "sendpassword" => $this->mail_config['password'],
                    "sendtype" => $this->mail_config['type']
                );
                $result = $mymail->sendMail( $mails, $mailto, $subject, $content, $attachment );
                unset( $mymail );
                unset( $mails );
            }
        }
        else
        {
            $error = "网站已关闭邮件发送功能。";
        }
        return array(
            $result,
            $error
        );
    }

    public function sendTestMail( )
    {
        $result = FALSE;
        $error = "";
        $subject = "这是一封测试邮件";
        $content = "这是一封测试邮件，检测环境是否支持邮件发送功能，如果您收到这封邮件，表明测试成功。";
        list( $result, $error ) = $this->sendMail( OEMAIL_EMAIL, $subject, $content );
        return array(
            $result,
            $error
        );
    }

    public function sendReg( $args )
    {
        $result = FALSE;
        list( $subject, $content ) = $this->_getMailTplInfo( "reg" );
        if ( !empty( $subject ) && !empty( $content ) )
        {
            $subject = str_ireplace( array( "{sitename}", "{siteurl}", "{username}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $args['username'] ), $subject );
            $content = str_ireplace( array( "{sitename}", "{siteurl}", "{userid}", "{username}", "{password}", "{email}", "{sendtime}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $args['userid'], $args['username'], $args['password'], $args['email'], date( "Y-m-d H:i:s", time( ) ) ), $content );
            list( $result, $error ) = $this->sendMail( $args['email'], $subject, $content );
        }
        return $result;
    }

    public function sendValid( $userid )
    {
        $result = FALSE;
        $error = "";
        list( $subject, $content ) = $this->_getMailTplInfo( "valid" );
        if ( !empty( $subject ) && !empty( $content ) )
        {
            $userinfo = $this->_getUserInfo( $userid );
            if ( !empty( $userinfo ) )
            {
                $key = $this->_enCodeKey( $userid, $userinfo['salt'] );
                $subject = str_ireplace( array( "{sitename}", "{siteurl}", "{username}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $userinfo['username'] ), $subject );
                $content = str_ireplace( array( "{sitename}", "{siteurl}", "{userid}", "{username}", "{email}", "{sendtime}", "{key}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $userid, $userinfo['username'], $userinfo['email'], date( "Y-m-d H:i:s", time( ) ), urlencode( $key ) ), $content );
		list( $result, $error ) = $this->sendMail( $userinfo['email'], $subject, $content );
            }
        }
        return $result;
    }

    public function sendForget( $userid )
    {
        $result = FALSE;
        $error = "";
        list( $subject, $content ) = $this->_getMailTplInfo( "forget" );
        if ( !empty( $subject ) && !empty( $content ) )
        {
            $userinfo = $this->_getUserInfo( $userid );
            if ( !empty( $userinfo ) )
            {
                $key = $this->_enCodeKey( $userid, $userinfo['salt'] );
                $subject = str_ireplace( array( "{sitename}", "{siteurl}", "{username}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $userinfo['username'] ), $subject );
                $content = str_ireplace( array( "{sitename}", "{siteurl}", "{userid}", "{username}", "{email}", "{sendtime}", "{key}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $userid, $userinfo['username'], $userinfo['email'], date( "Y-m-d H:S:M", time( ) ), urlencode( $key ) ), $content );
                list( $result, $error ) = $this->sendMail( $userinfo['email'], $subject, $content );
            }
        }
        return $result;
    }

    private function _getMailTplInfo( $val )
    {
        if ( in_array( $val, array( "reg", "valid", "forget" ) ) )
        {
            $sql = "SELECT `subject`, `content` FROM ".DB_PREFIX.( "mail_tpl WHERE `tplsort`='".$val."'" );
        }
        else
        {
            $sql = "SELECT `subject`, `content` FROM ".DB_PREFIX."mail_tpl WHERE `tplid`='".intval( $val )."'";
        }
        $rows = parent::$obj->fetch_first( $sql );
        return array(
            $rows['subject'],
            $rows['content']
        );
    }

    private function _getUserInfo( $userid )
    {
        $userid = intval( $userid );
        $sql = "SELECT `username`, `email` FROM ".DB_PREFIX.( "user WHERE `userid`='".$userid."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            $salt = XHandle::getrndchar( 8 );
            $array = array(
                "salt" => $salt
            );
            parent::$obj->update( DB_PREFIX."user", $array, "userid='".$userid."'" );
            return array(
                "username" => $rows['username'],
                "email" => $rows['email'],
                "salt" => $salt
            );
        }
    }

    private function _enCodeKey( $userid, $salt )
    {
        $code = parent::import( "code", "util" );
        $bulidargs = $userid."-".md5( $userid.$salt )."-".time( );
        $encode = $code->authCode( $bulidargs, "ENCODE", OESOFT_RANDKEY );
        unset( $code );
        unset( $bulidargs );
        return $encode;
    }

}

?>
