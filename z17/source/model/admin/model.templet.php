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
class templetAModel extends X
{

    public function getList( $dir )
    {
        parent::loadlib( "option" );
        $nonce_templet = XOption::get( "nonce_templet" );
        $path = BASE_ROOT."tpl/templets/".$nonce_templet."/";
        if ( !empty( $dir ) )
        {
            $path .= $dir."/";
        }
        if ( FALSE === XValid::isdir( $path ) )
        {
            XHandle::halt( "对不起，读取模板目录失败，请检测目录是否存在！", "", 1 );
        }
        if ( !( $handle = @opendir( $path ) ) )
        {
            exit( "OElove templet path error!" );
        }
        $templets = array( );
        $i = 0;
        $ii = 1;
        while ( $file = @readdir( $handle ) )
        {
            if ( $file != "." && $file != ".." )
            {
                if ( TRUE === XValid::isdir( $path.$file ) )
                {
                    $templets[] = array(
                        "i" => $ii,
                        "type" => 1,
                        "filename" => $file,
                        "size" => filesize( $path.$file ),
                        "timeline" => filemtime( $path.$file ),
                        "dir" => $dir."/".$file,
                        "filepath" => "",
                        "extension" => "",
                        "tplname" => ""
                    );
                }
                else
                {
                    $arr_file = explode( ".", $file );
                    $templets[] = array(
                        "i" => $ii,
                        "type" => 2,
                        "filename" => $file,
                        "size" => filesize( $path.$file ),
                        "timeline" => filemtime( $path.$file ),
                        "dir" => "",
                        "filepath" => $dir."/".$file,
                        "extension" => end( $arr_file ),
                        "tplname" => $arr_file[0]
                    );
                }
                $i += 1;
                $ii += 1;
            }
        }
        closedir( $handle );
        $tplnums = count( $templets );
        $model = parent::model( "skin", "am" );
        $nonce = $model->getCopyRight( );
        unset( $model );
        return array(
            $tplnums,
            $templets,
            $nonce
        );
    }

    public function getData( $file )
    {
        parent::loadlib( "option" );
        $nonce_templet = XOption::get( "nonce_templet" );
        $filepath = BASE_ROOT."tpl/templets/".$nonce_templet.$file;
        $content = "";
        $handle = @fopen( $filepath, "r" );
        while ( !feof( $handle ) )
        {
            $content .= $this->_enCode( fgets($handle ) );
        }
        fclose( $handle );
        $model = parent::model( "skin", "am" );
        $nonce = $model->getCopyRight( );
        unset( $model );
        return array(
            $content,
            $nonce,
            $this->_getDir( $file )
        );
    }

    public function doEdit( $file, $content )
    {
        parent::loadlib( "option" );
        $nonce_templet = XOption::get( "nonce_templet" );
        $filepath = "tpl/templets/".$nonce_templet.$file;
        $content = $this->_deCode( $content );
        parent::loadutil( "file" );
        return XFile::writefile( $filepath, $content );
    }

    public function doDelFile( $file )
    {
        parent::loadlib( "option" );
        $nonce_templet = XOption::get( "nonce_templet" );
        $filepath = "tpl/templets/".$nonce_templet.$file;
        parent::loadutil( "file" );
        $result = XFile::delfile( $filepath );
        return array(
            $result,
            $this->_getDir( $file )
        );
    }

    public function doDelFolder( $folder )
    {
        parent::loadlib( "option" );
        $nonce_templet = XOption::get( "nonce_templet" );
        $folderpath = BASE_ROOT."tpl/templets/".$nonce_templet.$folder;
        parent::loadutil( "file" );
        return XFile::deldir( $folderpath );
    }

    private function _enCode( $str )
    {
        $str = str_replace( "<", "&lt;", $str );
        $str = str_replace( ">", "&gt;", $str );
        return $str;
    }

    private function _deCode( $str )
    {
        $str = str_replace( "&lt;", "<", $str );
        $str = str_replace( "&gt;", ">", $str );
        return $str;
    }

    private function _getDir( $file )
    {
        $string = explode( "/", $file );
        $count = count( $string );
        if ( 2 < $count )
        {
            return str_replace( "/".$string[$count - 1], "", $file );
        }
        return "";
    }

}

?>
