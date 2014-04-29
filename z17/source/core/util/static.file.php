<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class XFile
{

    public static function createFile( $filename )
    {
        if ( !empty( $filename ) )
        {
            if ( file_exists( $filename ) )
            {
                return FALSE;
            }
            self::createdir( dirname($filename) ) ;
            return file_put_contents( BASE_ROOT.$filename, "" );
        }
        return FALSE;
    }

    public static function writeFile( $filename, $content = "", $type = 1 )
    {
        if ( !empty( $filename ) )
        {
            $full_filename = BASE_ROOT.$filename;
            if ( $type == 1 )
            {
                if ( file_exists( $full_filename ) )
                {
                    self::delfile( $filename );
                }
                self::createfile( $filename );
                return self::writefile( $filename, $content, 2 );
            }
            if ( !is_writable( $full_filename ) )
            {
                return FALSE;
            }
            $handle = @fopen( $full_filename, "a" );
            if ( !$handle )
            {
                return FALSE;
            }
            $result = @fwrite( $handle, $content );
            if ( !$result )
            {
                return FALSE;
            }
            @fclose( $handle );
            return TRUE;
        }
        return FALSE;
    }

    public static function copyFile( $filename, $newfilename )
    {
        if ( !empty( $filename ) && !empty( $newfilename ) )
        {
            $full_filename = BASE_ROOT.$filename;
            if ( !file_exists( $full_filename ) || !is_writable( $full_filename ) )
            {
                return FALSE;
            }
            self::createdir( dirname($newfilename) );
            return @copy( $full_filename, BASE_ROOT.$newfilename );
        }
        return FALSE;
    }

    public static function moveFile( $filename, $newfilename )
    {
        if ( !empty( $filename ) && !empty( $newfilename ) )
        {
            $full_filename = BASE_ROOT.$filename;
            if ( !file_exists( $full_filename ) || !is_writable( $full_filename ) )
            {
                return FALSE;
            }
            self::createdir( dirname($newfilename) );
            return @rename( $full_filename, BASE_ROOT.$newfilename );
        }
        return FALSE;
    }

    public static function delFile( $filename )
    {
        if ( !empty( $filename ) )
        {
            $full_filename = BASE_ROOT.$filename;
            if ( !file_exists( $full_filename ) || !is_writable( $full_filename ) )
            {
                return TRUE;
            }
            return unlink( $full_filename );
        }
        return FALSE;
    }

    public static function getFileInfo( $filename )
    {
        if ( !empty( $filename ) )
        {
            $filename = BASE_ROOT.$filename;
            if ( file_exists( $filename ) )
            {
                return array( 
			"atime" => date( "Y-m-d H:i:s", fileatime( $filename ) ), 
			"ctime" => date( "Y-m-d H:i:s", filectime( $filename ) ), 
			"mtime" => date( "Y-m-d H:i:s", filemtime( $filename ) ), 
			"size" => filesize( $filename ), 
			"type" => filetype( $filename )
		);
            }
            return array( "atime" => "", "ctime" => "", "mtime" => "", "size" => "", "type" => "" );
        }
        return array( "atime" => "", "ctime" => "", "mtime" => "", "size" => "", "type" => "" );
    }

    public static function createFolder( $path )
    {
        if ( !empty( $path ) )
        {
            $path = BASE_ROOT.$path;
            if ( !is_dir( $path ) )
            {
                return FALSE;
            }
            @mkdir( $path );
            @chmod( $path, 511 );
            return TRUE;
        }
        return FALSE;
    }

    public static function createDir( $dir )
    {
        if ( !empty( $dir ) )
        {
            $edir = explode( "/", $dir );
            $i = 0;
            for ( ; $i < count( $edir ); ++$i )
            {
                $edirm = $edir[0];
                $ii = 1;
                for ( ; $ii <= $i; ++$ii )
                {
                    $edirm = $edirm."/".$edir[$ii];
                }
                if ( !file_exists( BASE_ROOT.$edirm ) && !is_dir( BASE_ROOT.$edirm ) )
                {
                    @mkdir( BASE_ROOT.$edirm, 777 );
                }
            }
        }
    }

    public static function delDir( $dir )
    {
        if ( !empty( $dir ) )
        {
            $dh = @opendir( $dir );
            while ( $file = @readdir( $dh ) )
            {
                if ( $file != "."  &&  $file != "..")
                {
                    $fullpath = $dir."/".$file;
                    if ( !is_dir( $fullpath ) )
                    {
                        @unlink( $fullpath );
                    }
                    else
                    {
                        self::deldir( $fullpath );
                    }
                }
            }
            @closedir( $dh );
            if ( @rmdir( $dir ) )
            {
                return TRUE;
            }
            return FALSE;
        }
        return FALSE;
    }

    public static function readContent( $filename )
    {
        $data = NULL;
        $filepath = BASE_ROOT.$filename;
        if ( file_exists( $filepath ) && ( $fp = @fopen( $filepath, "r" ) ) )
        {
            $data = @fread( $fp, filesize( $filepath ) );
            @fclose( $fp );
        }
        return $data;
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
