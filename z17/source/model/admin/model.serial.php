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
class serialAModel extends X
{

    private function _readCache( )
    {
        $time = 0;
        if ( file_exists( BASE_ROOT."./data/cache/s.cache" ) )
        {
            $cache = parent::import( "cache", "lib" );
            $data = $cache->readDcache( "s" );
            if ( !empty( $data ) )
            {
                $time = intval( $data['time'] );
            }
            unset( $cache );
        }
        return $time;
    }

    private function _writeCache( )
    {
        $time = time( );
        $cache = parent::import( "cache", "lib" );
        $data = array(
            "time" => $time
        );
        $cache->writeDcache( serialize( $data ), "s" );
        unset( $cache );
    }

    private function _validTime( )
    {
        $time = $this->_readCache( );
        if ( time( ) - $time < 60 )
        {
            return TRUE;
        }
        return FALSE;
    }

    public function tjSerial( )
    {
		return;
        $result = "";
        if ( FALSE === $this->_validTime( ) )
        {
            $domain = strtolower( $_SERVER['HTTP_HOST'] );
            $domain = empty( $domain ) ? strtolower( $_SERVER['SERVER_NAME'] ) : $domain;
            $domain = trim( $domain );
            $curl = parent::import( "curl", "util" );
            $url = "http://www.zyiq.cn/version/tj.php?domain=".urlencode( $domain )."&name=OElove&type=".urlencode( OESOFT_TYPE )."&version=".urlencode( OESOFT_VERSION )."&release=".urlencode( OESOFT_RELEASE )."";
            if ( OESOFT_STYPE == 1 )
            {
                $result = $curl->fileGet( $url );
            }
            else
            {
                $result = $curl->get( $url );
            }
            unset( $curl );
            $this->_writeCache( );
        }
        return $result;
    }

}

?>
