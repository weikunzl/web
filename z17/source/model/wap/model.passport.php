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
class passportWModel extends X
{

    public function doSaveAvatar( $avatarfile )
    {
        $indexs_avatar = 0;
        if ( intval( parent::$cfg['auditavatar'] ) == 1 )
        {
            $array = array(
                "avatar" => $avatarfile,
                "avatarflag" => 2
            );
            $indexs_avatar = 2;
        }
        else
        {
            $array = array(
                "avatar" => $avatarfile,
                "avatarflag" => 1
            );
            $indexs_avatar = 1;
        }
        parent::$obj->update( DB_PREFIX."user", $array, "userid='".parent::$wrap_user['userid']."'" );
        $result = TRUE;
        $m_indexs = parent::model( "indexs", "am" );
        $m_indexs->updateIndexs( parent::$wrap_user['userid'], array(
            "avatar" => $indexs_avatar
        ) );
        unset( $m_indexs );
        return $result;
    }

}

?>
