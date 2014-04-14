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
class mailsendAModel extends X
{

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "mail_content WHERE contentid='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $contentid = parent::$obj->fetch_newid( "SELECT MAX(contentid) FROM ".DB_PREFIX."mail_content", 1 );
        $array = array_merge( array( "contentid" => $contentid, "createline" => time( ) ), $array );
        return array( 
		$contentid, 
		parent::$obj->insert( DB_PREFIX."mail_content", $array ) );
    }

    public function doSendGroupMail( $contentid, $page )
    {
        $data = $this->getData( intval($contentid ) );
        if ( !empty( $data ) )
        {
            if ( $data['pagesize'] < 1 )
            {
                $data['pagesize'] = 50;
            }
            $pagesize = $data['pagesize'];
            $sqltemp = trim( $data['sqltemp'] );
            $subject = trim( $data['subject'] );
            $content = $data['content'];
            $code = parent::import( "code", "util" );
            $sqltemp = $code->authCode( $sqltemp, "DECODE", OESOFT_RANDKEY, 0 );
            unset( $code );
            $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_params AS v".$sqltemp;
            $total = parent::$obj->fetch_count( $countsql );
            $pagecount = ceil( $total / $pagesize );
            $start = ( $page - 1 ) * $pagesize;
            $sql = "SELECT v.userid, u.username, u.email FROM ".DB_PREFIX."user_params AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$sqltemp.( " ORDER BY v.userid ASC LIMIT ".$start.", {$pagesize}" );
            $user = parent::$obj->getall( $sql );
            $model_mail = parent::model( "mail", "am" );
            foreach ( $user as $key => $value )
            {
                if ( TRUE === XValid::isemail( $value['email'] ) )
                {
                    $mail_subject = $subject;
                    $mail_content = $content;
                    $mail_subject = str_ireplace( array( "{sitename}", "{siteurl}", "{username}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $value['username'] ), $mail_subject );
                    $mail_content = str_ireplace( array( "{sitename}", "{siteurl}", "{userid}", "{username}", "{email}", "{sendtime}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $value['userid'], $value['username'], $value['email'], date( "Y-m-d H:S:M", time( ) ) ), $mail_content );
                    $sendstatus = FALSE;
                    list( $sendstatus, $error ) = $model_mail->sendMail( $value['email'], $mail_subject, $mail_content );
                    if ( TRUE === $sendstatus )
                    {
                        $flag = 1;
                    }
                    else
                    {
                        $flag = 0;
                    }
                    $logid = parent::$obj->fetch_newid( "SELECT MAX(logid) FROM ".DB_PREFIX."mail_log", 1 );
                    $array = array( "logid" => $logid, "contentid" => $contentid, "userid" => $value['userid'], "email" => $value['email'], "sendtime" => time( ), "flag" => $flag );
                    parent::$obj->insert( DB_PREFIX."mail_log", $array );
                }
            }
            unset( $model_mail );
            return array(
                TRUE,
                $total,
                $pagecount,
                $data['refresh']
            );
        }
        return array( FALSE, "", "", "" );
    }

    public function doSendSingleMail( $arrayemail, $args )
    {
        list( $contentid, $result ) = $this->doAdd( $args );
        if ( TRUE === $result && 0 < $contentid )
        {
            $splitemail = explode( ",", $arrayemail );
            $ii = 0;
            for ( ; $ii < sizeof( $splitemail ); ++$ii )
            {
                $recemail = "";
                $recemail = trim( $splitemail[$ii] );
                if ( TRUE === XValid::isemail( $recemail ) )
                {
                    $user_sql = "SELECT `userid`, `username` FROM ".DB_PREFIX.( "user WHERE `email`='".$recemail."'" );
                    $user_data = parent::$obj->fetch_first( $user_sql );
                    if ( !empty( $user_data ) )
                    {
                        $userid = $user_data['userid'];
                        $username = $user_data['username'];
                    }
                    else
                    {
                        $userid = 0;
                        $username = "";
                    }
                    unset( $user_data );
                    $mail_subject = $args['subject'];
                    $mail_content = $args['content'];
                    $mail_subject = str_ireplace( array( "{sitename}", "{siteurl}", "{username}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $username ), $mail_subject );
                    $mail_content = str_ireplace( array( "{sitename}", "{siteurl}", "{userid}", "{username}", "{email}", "{sendtime}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $userid, $username, $recemail, date( "Y-m-d H:S:M", time( ) ) ), $mail_content );
                    $sendstatus = FALSE;
                    $model_mail = parent::model( "mail", "am" );
                    list( $sendstatus, $error ) = $model_mail->sendMail( $recemail, $mail_subject, $mail_content );
                    unset( $model_mail );
                    if ( TRUE === $sendstatus )
                    {
                        $flag = 1;
                    }
                    else
                    {
                        $flag = 0;
                    }
                    $logid = parent::$obj->fetch_newid( "SELECT MAX(logid) FROM ".DB_PREFIX."mail_log", 1 );
                    $array = array( "logid" => $logid, "contentid" => $contentid, "userid" => $userid, "email" => $recemail, "sendtime" => time( ), "flag" => $flag );
                    parent::$obj->insert( DB_PREFIX."mail_log", $array );
                }
            }
        }
        return TRUE;
    }

    public function doSendOffVipMail( $contentid, $page )
    {
        $data = $this->getData( intval( $contentid ) );
        if ( !empty( $data ) )
        {
            if ( $data['pagesize'] < 1 )
            {
                $data['pagesize'] = 50;
            }
            $pagesize = $data['pagesize'];
            $sqltemp = trim( $data['sqltemp'] );
            $subject = trim( $data['subject'] );
            $content = $data['content'];
            $code = parent::import( "code", "util" );
            $sqltemp = $code->authCode( $sqltemp, "DECODE", OESOFT_RANDKEY, 0 );
            unset( $code );
            $countsql = "SELECT COUNT(*) AS my_count FROM ".DB_PREFIX."user_validate AS v".$sqltemp;
            $total = parent::$obj->fetch_count( $countsql );
            $pagecount = ceil( $total / $pagesize );
            $start = ( $page - 1 ) * $pagesize;
            $sql = "SELECT v.userid, u.username, u.email FROM ".DB_PREFIX."user_validate AS v LEFT JOIN ".DB_PREFIX."user AS u ON v.userid=u.userid".$sqltemp.( " ORDER BY v.userid ASC LIMIT ".$start.", {$pagesize}" );
            $user = parent::$obj->getall( $sql );
            $model_mail = parent::model( "mail", "am" );
            foreach ( $user as $key => $value )
            {
                if ( TRUE === XValid::isemail( $value['email'] ) )
                {
                    $mail_subject = $subject;
                    $mail_content = $content;
                    $mail_subject = str_ireplace( array( "{sitename}", "{siteurl}", "{username}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $value['username'] ), $mail_subject );
                    $mail_content = str_ireplace( array( "{sitename}", "{siteurl}", "{userid}", "{username}", "{email}", "{sendtime}" ), array( parent::$cfg['sitename'], parent::$cfg['siteurl'], $value['userid'], $value['username'], $value['email'], date( "Y-m-d H:S:M", time( ) ) ), $mail_content );
                    $sendstatus = FALSE;
                    list( $sendstatus, $error ) = $model_mail->sendMail( $value['email'], $mail_subject, $mail_content );
                    if ( TRUE === $sendstatus )
                    {
                        $flag = 1;
                    }
                    else
                    {
                        $flag = 0;
                    }
                    $logid = parent::$obj->fetch_newid( "SELECT MAX(logid) FROM ".DB_PREFIX."mail_log", 1 );
                    $array = array( "logid" => $logid, "contentid" => $contentid, "userid" => $value['userid'], "email" => $value['email'], "sendtime" => time( ), "flag" => $flag );
                    parent::$obj->insert( DB_PREFIX."mail_log", $array );
                }
            }
            unset( $model_mail );
            return array(
                TRUE,
                $total,
                $pagecount,
                $data['refresh']
            );
        }
        return array( FALSE, "", "", "" );
    }

}

?>
