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
class netpayAModel extends X
{

    public function getPluginList( )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."payment_plugin WHERE `flag`='1' ORDER BY `pluginid` ASC";
        $data = parent::$obj->getall( $sql );
        if ( !empty( $data ) )
        {
            $total = ( $data );
        }
        else
        {
            $total = 0;
        }
        return array(
            $total,
            $data
        );
    }

    public function getList( )
    {
        $sql = "SELECT v.*,p.logo,p.filepath FROM ".DB_PREFIX."payment AS v LEFT JOIN ".DB_PREFIX."payment_plugin AS p ON v.pluginid=p.pluginid ORDER BY v.orders ASC";
        $data = parent::$obj->getall( $sql );
        if ( !empty( $data ) )
        {
            $total = ( $data );
        }
        else
        {
            $total = 0;
        }
        return array(
            $total,
            $data
        );
    }

    public function getPluginData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "payment_plugin WHERE `pluginid`='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX.( "payment WHERE `mentid`='".$id."'" );
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $mentid = parent::$obj->fetch_newid( "SELECT MAX(mentid) FROM ".DB_PREFIX."payment", 1 );
        $array = array_merge( array( "mentid" => $mentid, "menttype" => 1 ), $array );
        $result = parent::$obj->insert( DB_PREFIX."payment", $array );
        return $result;
    }

    public function doEdit( $id, $array )
    {
        $result = parent::$obj->update( DB_PREFIX."payment", $array, "`mentid`='".$id."'" );
        return $result;
    }

    public function doDel( $id )
    {
        $sql = "DELETE FROM ".DB_PREFIX.( "payment WHERE `mentid`='".$id."'" );
        $result = parent::$obj->query( $sql );
        return $result;
    }

    public function getOptions( $inid )
    {
        $temps = "";
        $sql = "SELECT `mentid`, `mentname` FROM ".DB_PREFIX."payment WHERE flag='1' ORDER BY orders ASC";
        $data = parent::$obj->getall( $sql );
        foreach ( $data as $key => $value )
        {
            $temps .= "<option value='".$value['mentid']."'";
            if ( intval( $inid ) == $value['mentid'] )
            {
                $temps .= " selected";
            }
            $temps .= ">".$value['mentname']."</option>";
        }
        return $temps;
    }

}

?>
