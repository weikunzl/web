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
class avatarUModel extends X
{

    public function doDelAvatar( $avatar )
    {
        $result = FALSE;
        if ( !empty( $avatar ) && substr( $avatar, 0, 15 ) == "data/attachment" )
        {
            parent::loadutil( "file" );
            XFile::delfile( $avatar );
        }
        $result = parent::$obj->update( DB_PREFIX."user", array( "avatar" => "", "avatarflag" => 0 ), "userid='".parent::$wrap_user['userid']."'" );
        $m_indexs = parent::model( "indexs", "am" );
        $m_indexs->updateIndexs( parent::$wrap_user['userid'], array( "avatar" => 0 ) );
        unset( $m_indexs );
        return $result;
    }

}

?>
