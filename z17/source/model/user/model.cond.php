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
class condUModel extends X
{

    public function createCondition( $userid, $args )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "user_cond WHERE `userid`='".$userid."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( empty( $rows ) )
        {
            $args = array_merge( array( "userid" => $userid ), $args );
            return parent::$obj->insert( DB_PREFIX."user_cond", $args );
        }
        return parent::$obj->update( DB_PREFIX."user_cond", $args, "userid='".$userid."'" );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."user_cond WHERE userid='".intval( $id )."'";
        $data = parent::$obj->fetch_first( $sql );
        if ( !empty( $data ) )
        {
            if ( !empty( $data['setarea'] ) )
            {
                $data['arealist'] = XHandle::dounserialize( $data['setarea'] );
                return $data;
            }
            $data['arealist'] = NULL;
        }
        return $data;
    }

    public function doEdit( $id, $args )
    {
        $result = parent::$obj->update( DB_PREFIX."user_cond", $args, "userid='".intval( $id )."'" );
        if ( TRUE === $result )
        {
            $uum = parent::model( "match", "um" );
            $uum->updateMatch( intval( $id ) );
            unset( $uum );
        }
        return $result;
    }

    public function writeCond( $userid )
    {
        return parent::$obj->insert( DB_PREFIX."user_cond", array(
            "userid" => $userid
        ) );
    }

}

?>
