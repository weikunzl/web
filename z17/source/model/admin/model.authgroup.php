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
class authgroupAModel extends X
{

    private $elements_files = "";
    private $prems = NULL;

    private function _loadElements( )
    {
        require_once( BASE_ROOT."./source/roll/elements.php" );
        $this->prems = roll_elements( );
    }

    public function getList( )
    {
        $cache = parent::import( "cache", "lib" );
        $data = $cache->readCache( "authgroup" );
        unset( $cache );
        if ( !empty( $data ) )
        {
            $total = count( $data );
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

    public function getData( $id )
    {
        $sql = "SELECT * FROM ".DB_PREFIX."authgroup WHERE groupid='".intval( $id )."'";
        return parent::$obj->fetch_first( $sql );
    }

    public function doAdd( $array )
    {
        $groupid = parent::$obj->fetch_newid( "SELECT MAX(groupid) FROM ".DB_PREFIX."authgroup", 1 );
        $array = array_merge( array( "groupid" => $groupid, "timeline" => time( ) ), $array );
        if ( $array['rootid'] == 0 )
        {
            $array = array_merge( $array, array( "depth" => 0 ) );
        }
        else
        {
            $parent_depth = $this->_getDepth( $array['rootid'] );
            $depth = ( $parent_depth ) + 1;
            $array = array_merge( $array, array( "depth" => $depth ) );
        }
        $result = parent::$obj->insert( DB_PREFIX."authgroup", $array );
        if ( TRUE === $result )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "authgroup" );
            unset( $cache );
        }
        return $result;
    }

    public function doEdit( $id, $array )
    {
        $self_depth = $this->_getDepth( $id );
        $parent_depth = $this->_getDepth( $array['rootid'] );
        if ( 0 < $array['rootid'] && $self_depth < $parent_depth )
        {
            $childs = $this->_getChildIDs( $id );
            if ( TRUE === XHandle::foundinchar( $childs, $array['rootid'] ) )
            {
                return 1;
            }
        }
        if ( $array['rootid'] == 0 )
        {
            $depth = 0;
        }
        else
        {
            $depth = $parent_depth + 1;
        }
        $array = array_merge( $array, array( "depth" => $depth ) );
        $result = parent::$obj->update( DB_PREFIX."authgroup", $array, "groupid=".intval( $id )."" );
        if ( TRUE === $result )
        {
            $this->_updateChildDepth( $id, $depth );
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "authgroup" );
            unset( $cache );
            return 2;
        }
        return 3;
    }

    public function doDel( $id )
    {
        if ( TRUE === $this->checkExistsChild( $id ) )
        {
            return FALSE;
        }
        $sql = "DELETE FROM ".DB_PREFIX."authgroup WHERE groupid='".intval( $id )."'";
        if ( TRUE === parent::$obj->query( $sql ) )
        {
            $cache = parent::import( "cache", "lib" );
            $cache->updateCache( "authgroup" );
            unset( $cache );
            return TRUE;
        }
        return FALSE;
    }

    public function doUpdate( $id, $type )
    {
        if ( $type == "flagopen" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."authgroup SET flag='1' WHERE groupid='".intval( $id )."'" );
        }
        if ( $type == "flagclose" )
        {
            return parent::$obj->query( "UPDATE ".DB_PREFIX."authgroup SET flag='0' WHERE groupid='".intval( $id )."'" );
        }
    }

    public function checkExistsChild( $id )
    {
        $sql = "SELECT COUNT(groupid) FROM ".DB_PREFIX."authgroup WHERE rootid='".intval( $id )."'";
        $count = parent::$obj->fetch_count( $sql );
        if ( 0 < $count )
        {
            return TRUE;
        }
        return FALSE;
    }

    private function _getDepth( $id )
    {
        $sql = "SELECT depth FROM ".DB_PREFIX."authgroup WHERE groupid='".intval( $id )."'";
        $data = parent::$obj->fetch_first( $sql );
        if ( !empty( $data ) )
        {
            return intval( $data['depth'] );
        }
        return 0;
    }

    private function _getChildIDs( $id, $args = "" )
    {
        $args = $args;
        $query = "SELECT groupid,depth FROM ".DB_PREFIX."authgroup WHERE rootid='".intval( $id )."'";
        $data = parent::$obj->getall( $query );
        foreach ( $data as $key => $value )
        {
            $args = $args.$value['groupid'].",";
            $args = $this->_getChildIDs( $value['groupid'], $args );
        }
        return $args;
    }

    private function _updateChildDepth( $id, $depth )
    {
        $query = "SELECT groupid FROM ".DB_PREFIX."authgroup WHERE rootid='".intval( $id )."'";
        $data = parent::$obj->getall( $query );
        foreach ( $data as $key => $value )
        {
            $child_depth = $depth + 1;
            parent::$obj->update( DB_PREFIX."authgroup", array(
                "depth" => $child_depth
            ), "groupid='".$value['groupid']."'" );
            $this->_updateChildDepth( $value['groupid'], $child_depth );
        }
    }

    public function getAllNode( )
    {
        $notes = array( );
        $i = 0;
        $sql = "SELECT * FROM ".DB_PREFIX."authgroup WHERE rootid='0' ORDER BY orders ASC";
        $parent_data = parent::$obj->getall( $sql );
        foreach ( $parent_data as $key => $value )
        {
            $notes = array_merge( $notes, array(
                $i => array(
                    "groupid" => $value['groupid'],
                    "groupname" => $value['groupname'],
                    "auths" => $value['auths'],
                    "rootid" => $value['rootid'],
                    "depth" => $value['depth'],
                    "flag" => $value['flag'],
                    "timeline" => $value['timeline'],
                    "orders" => $value['orders'],
                    "intro" => $value['intro']
                )
            ) );
            $i += 1;
            $notes = array_merge( $notes, $this->_getChildNode( $value['groupid'], $i ) );
        }
        return $notes;
    }

    private function _getChildNode( $rootid, $i, $data = array( ) )
    {
        $nodes = array( );
        $nodes = $data;
        $child_sql = "SELECT * FROM ".DB_PREFIX."authgroup".( " WHERE rootid='".$rootid."' ORDER BY orders ASC" );
        $child_data = parent::$obj->getall( $child_sql );
        foreach ( $child_data as $key => $value )
        {
            $nodes = array_merge( $nodes, array(
                $i => array(
                    "groupid" => $value['groupid'],
                    "groupname" => $value['groupname'],
                    "auths" => $value['auths'],
                    "rootid" => $value['rootid'],
                    "depth" => $value['depth'],
                    "flag" => $value['flag'],
                    "timeline" => $value['timeline'],
                    "orders" => $value['orders'],
                    "intro" => $value['intro']
                )
            ) );
            $i += 1;
            $nodes = $this->_getChildNode( $value['groupid'], $i, $nodes );
        }
        return $nodes;
    }

    public function getCacheOptions( $inputvalue = "" )
    {
        $args = "";
        $cache = parent::import( "cache", "lib" );
        $data = $cache->readCache( "authgroup" );
        unset( $cache );
        foreach ( $data as $key => $value )
        {
            $args .= "<option value='".$value['groupid']."'";
            if ( intval( $value['groupid'] ) == intval( $inputvalue ) )
            {
                $args .= " selected";
            }
            $depth_mark = "";
            if ( !( $value['depth'] == 0 ) )
            {
                if ( $value['depth'] == 1 )
                {
                    $depth_mark = "&nbsp;&nbsp;├ ";
                }
                else
                {
                    $i = 2;
                    for ( ; $i <= $value['depth']; ++$i )
                    {
                        $depth_mark .= "&nbsp;&nbsp;│";
                    }
                    $depth_mark .= "&nbsp;&nbsp;├ ";
                }
            }
            $args .= ">".$depth_mark.$value['groupname']."</option>";
        }
        return $args;
    }

    public function dataOptionTree( $inputvalue = "" )
    {
        $notes = "";
        $parent_sql = "SELECT groupid,groupname FROM ".DB_PREFIX."authgroup WHERE rootid='0' AND flag='1' ORDER BY orders ASC";
        $parent_data = parent::$obj->getall( $parent_sql );
        foreach ( $parent_data as $key => $value )
        {
            $notes .= "<option value='".$value['groupid']."'";
            if ( intval( $value['groupid'] ) == intval( $inputvalue ) )
            {
                $notes .= " selected";
            }
            $notes .= ">".$value['groupname']."</option>";
            $notes .= $this->_dataOptionChild( $value['groupid'], $inputvalue );
        }
        return $notes;
    }

    private function _dataOptionChild( $rootid, $inputvalue, $args = "" )
    {
        $args = $args;
        $child_sql = "SELECT groupid,groupname,depth FROM ".DB_PREFIX."authgroup".( " WHERE rootid='".$rootid."' AND flag='1' ORDER BY orders ASC" );
        $child_data = parent::$obj->getall( $child_sql );
        foreach ( $child_data as $key => $value )
        {
            $args .= "<option value='".$value['groupid']."'";
            if ( intval( $value['groupid'] ) == intval( $inputvalue ) )
            {
                $args .= " selected";
            }
            $depth_mark = "";
            if ( $value['depth'] == 1 )
            {
                $depth_mark = "&nbsp;&nbsp;├ ";
            }
            else
            {
                $i = 2;
                for ( ; $i <= $value['depth']; ++$i )
                {
                    $depth_mark .= "&nbsp;&nbsp;│";
                }
                $depth_mark .= "&nbsp;&nbsp;├ ";
            }
            $args .= ">".$depth_mark.$value['groupname']."</option>";
            $args = $this->_dataOptionChild( $value['groupid'], $inputvalue, $args );
        }
        return $args;
    }

    public function getPremElements( $auths = "" )
    {
        $this->_loadElements( );
        $html_string = "<table cellpadding='2' cellspacing='2' width='100%'>\n";
        $parent_tr = "";
        foreach ( $this->prems as $key => $value )
        {
            $parent_tr .= "  <tr>\n";
            $parent_tr .= "    <td class='hback_c3' width='15%'><b>".$value['name']."</b></td> <td class='hback_c3' width='10%'><input type='checkbox' name='".$value['id']."' id='".$value['id']."' value='1' onclick=\"auths_selectGroupBy('".$value['id']."', '".$value['id']."_child')\" />全选/取消</td>\n";
            $parent_tr .= "    <td class='hback' width='75%'>\n";
            $parent_tr .= "      <table cellpadding='2' cellspacing='2' width='100%'>\n";
            $parent_tr .= "        <tr>\n";
            $child_td = "";
            $child_i = 0;
            foreach ( $value['value'] as $k => $val )
            {
                $child_td .= "<td width='20%'>";
                $string = $val;
                $string = str_ireplace( array( "添加", "修改", "删除", "编辑" ), array( "<font color=green>添加</font>", "<font color=blue>修改</font>", "<font color=red>删除</font>", "<font color=blue>编辑</font>" ), $string );
                $child_td .= "<input type='checkbox' id='".$value['id']."_child' name='auths[]' value='".$k."'";
                if ( !empty( $auths ) && TRUE === XHandle::foundinchar( $auths, $k, "," ) )
                {
                    $child_td .= " checked";
                }
                $child_td .= ">".$string."";
                $child_td .= "</td>\n";
                $child_i += 1;
                if ( $child_i % 5 == 0 )
                {
                    $child_td .= "</tr>\n<tr>\n";
                }
            }
            $parent_tr .= $child_td."        </tr>\n";
            $parent_tr .= "      </table>\n";
            $parent_tr .= "    </td>\n";
            $parent_tr .= "  </tr>\n";
        }
        $html_string .= $parent_tr."</table>\n";
        return $html_string;
    }

}

?>
