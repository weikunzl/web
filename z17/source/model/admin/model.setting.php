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
class settingAModel extends X
{

    public function getOptions( $option )
    {
        parent::loadlib( "option" );
        return XOption::get( $option );
    }

    public function doSave( $option, $array )
    {
        $data = serialize( $array );
        
        parent::loadlib( "option" );
        XOption::updateoption( $option, $data );
        return TRUE;
    }

    public function doUpdate( $option, $string )
    {
        $array = array(
            "optionvalue" => $string
        );
        $result = parent::$obj->update( DB_PREFIX."options", $array, "optionname='".$option."'" );
        if ( TRUE === $result )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "options" );
            unset( $cache );
            return TRUE;
        }
        return FALSE;
    }

    public function readEmailConfig( )
    {
        $mailinfo = array(
            "flag" => OEMAIL_FLAG,
            "smtp" => OEMAIL_SMTP,
            "port" => OEMAIL_PORT,
            "sender" => OEMAIL_SENDER,
            "email" => OEMAIL_EMAIL,
            "password" => OEMAIL_PASSWORD,
            "type" => OEMAIL_TYPE
        );
        return $mailinfo;
    }

    public function doSaveEmailConfig( $array )
    {
        if ( $array['flag'] == 1 )
        {
            $array['flag'] = "true";
        }
        else
        {
            $array['flag'] = "false";
        }
        $config = "<?php\r\ndefine('OEMAIL_FLAG', ".$array['flag'].");\r\ndefine('OEMAIL_SMTP', '".$array['smtp']."');\r\ndefine('OEMAIL_PORT', ".$array['port'].");\r\ndefine('OEMAIL_SENDER', '".$array['sender']."');\r\ndefine('OEMAIL_EMAIL', '".$array['email']."');\r\ndefine('OEMAIL_PASSWORD', '".$array['password']."');\r\ndefine('OEMAIL_TYPE', ".$array['type'].");\r\n?>";
        $file = "source/conf/mail.inc.php";
        parent::loadutil( "file" );
        XFile::createfile( $file );
        return XFile::writefile( $file, $config );
    }

    public function readSMSConfig( )
    {
        $smsinfo = array(
            "flag" => OESMS_FLAG,
            "account" => OESMS_ACCOUNT,
            "password" => OESMS_PASSWORD,
            "key" => OESMS_KEY,
            "sender" => OESMS_SENDER,
            "testmobile" => OESMS_TESTMOBILE
        );
        return $smsinfo;
    }

    public function doSaveSmsConfig( $args )
    {
        if ( $args['flag'] == 1 )
        {
            $args['flag'] = "true";
        }
        else
        {
            $args['flag'] = "false";
        }
        $config = "<?php\r\ndefine('OESMS_FLAG', ".$args['flag'].");\r\ndefine('OESMS_ACCOUNT', '".$args['account']."');\r\ndefine('OESMS_PASSWORD', '".$args['password']."');\r\ndefine('OESMS_KEY', '".$args['key']."');\r\ndefine('OESMS_SENDER', '".$args['sender']."');\r\ndefine('OESMS_TESTMOBILE', '".$args['testmobile']."');\r\n?>";
        $file = "source/conf/sms.inc.php";
        parent::loadutil( "file" );
        XFile::createfile( $file );
        return XFile::writefile( $file, $config );
    }

    public function doCreateTplPre( $skin = "" )
    {
        $result = TRUE;
        $skin = empty( $skin ) ? parent::$cfg['templet'] : trim( $skin );
        $rnd = XHandle::getrndchar( 6 )."_";
        parent::loadutil( "file" );
        $index_path = BASE_ROOT."./tpl/templets/".$skin."/";
        if ( !( $index_handle = @opendir( $index_path ) ) )
        {
            exit( "OElove templet path error!" );
        }
        $index_files = array( );
        while ( $infile = @readdir( $index_handle ) )
        {
            if ( $infile != "."  && $infile != ".." )
            {
                $arr_infile = explode( ".", $infile );
                if ( end( $arr_infile ) == "tpl" )
                {
                    $index_files[] = array( 
		    	"filename" => $infile, 
			"extension" => end( $arr_infile ), 
			"tplname" => $arr_infile[0] 
		    );
                }
            }
        }
        if ( !empty( $index_files ) )
        {
            $noallow_tpl = array( "imgcropper.cpavatar.tpl", "imgcropper.regavatar.tpl", "imgcropper.tpl", "webim.tpl" );
            foreach ( $index_files as $key => $value )
            {
                if ( !in_array( $value['filename'], $noallow_tpl ) )
                {
                    $old_file = $value['filename'];
                    $new_file = str_ireplace( OESOFT_TPLPRE, "", $old_file );
                    $new_file = $rnd.$new_file;
                    XFile::movefile( "./tpl/templets/".$skin."/".$old_file, "./tpl/templets/".$skin."/".$new_file );
                }
            }
        }
        $cp_path = BASE_ROOT."./tpl/templets/".$skin."/cp/";
        if ( !( $cp_handle = @opendir( $cp_path ) ) )
        {
            exit( "OElove templet path error!" );
        }
        $cp_files = array( );
        while ( $cpfile = @readdir( $cp_handle ) )
        {
            if ( $cpfile != "." && $cpfile != ".." )
            {
                $arr_cpfile = explode( ".", $cpfile );
                if ( end( $arr_cpfile ) == "tpl" )
                {
                    $cp_files[] = array( 
		    	"filename" => $cpfile, 
			"extension" => end( $arr_cpfile ), 
			"tplname" => $arr_cpfile[0] 
		    );
                }
            }
        }
        if ( !empty( $cp_files ) )
        {
            foreach ( $cp_files as $key => $value )
            {
                $old_file = $value['filename'];
                $new_file = $value['filename'];
                $new_file = $rnd.$new_file;
                XFile::movefile( "./tpl/templets/".$skin."/cp/".$old_file, "./tpl/templets/".$skin."/cp/".$new_file );
            }
        }
        $content = "<?php define('OESOFT_TPLPRE','".$rnd."');?>";
        XFile::createfile( "source/conf/tpl.pre.php" );
        return XFile::writefile( "source/conf/tpl.pre.php", $content );
    }

    public function doSaveLockUsers( $str )
    {
        $content = "<?php\r\ndefine('OE_LOCKUSERS', '".$str."');\r\n?>";
        $file = "source/conf/lockusers.php";
        parent::loadutil( "file" );
        XFile::createfile( $file );
        return XFile::writefile( $file, $content );
    }

    public function doSaveForbidArgs( $str )
    {
        $content = "<?php\r\ndefine('OE_FORBIDARGS', '".$str."');\r\n?>";
        $file = "source/conf/forbidargs.php";
        parent::loadutil( "file" );
        XFile::createfile( $file );
        return XFile::writefile( $file, $content );
    }

    public function doUpdateCache( )
    {
        $cache = parent::import( "cache", "lib" );
        $cache->updateCache( );
        unset( $cache );
        $m_count = parent::model( "count", "im" );
        $m_arr = array( "user" => 1, "maleuser" => 1, "femaleuser" => 1, "onlineuser" => 1, "diary" => 1, "ask" => 1, "dating" => 1, "party" => 1, "weibo" => 1, "ceshi" => 1, "story" => 1, "message" => 1 );
        $m_count->updateStatistics( $m_arr );
        unset( $m_count );
        unset( $m_arr );
    }

}

?>
