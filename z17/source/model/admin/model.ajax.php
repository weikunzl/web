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
class ajaxAModel extends X
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
        $cache->writeDcache(serialize($data ), "s" );
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

}

?>
