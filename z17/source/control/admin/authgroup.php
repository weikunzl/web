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
class control extends adminbase
{

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    public function control_run( )
    {
        $this->checkAuth( "authgroup_volist" );
        $model = parent::model( "authgroup", "am" );
        list( $datacount, $data ) = $model->getList( );
        $url = XRequest::getphpself( );
        $url .= "?c=authgroup";
        foreach ( $data as $key => $value )
        {
            if ( $value['depth'] == 0 )
            {
                $data[$key]['tree_node'] = $value['groupname'];
            }
            else
            {
                $tree = "";
                if ( $value['depth'] == 1 )
                {
                    $tree = "&nbsp;&nbsp;├ ";
                }
                else
                {
                    $ii = 2;
                    for ( ; $ii <= $value['depth']; ++$ii )
                    {
                        $tree .= "&nbsp;&nbsp;│";
                    }
                    $tree .= "&nbsp;&nbsp;├ ";
                }
                $data[$key]['tree_node'] = $tree.$value['groupname'];
            }
        }
        $var_array = array(
            "total" => $datacount,
            "authgroup" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."authgroup.tpl" );
    }

    public function control_add( )
    {
        $this->checkAuth( "authgroup_add" );
        $model = parent::model( "authgroup", "am" );
        $elements = $model->getPremElements( );
        unset( $model );
        parent::loadlib( "mod" );
        $var_array = array(
            "group_root" => XMod::selecauthgroup( "", "rootid", "根节点" ),
            "auth_checkbox" => $elements
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."authgroup.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "authgroup_edit" );
        $id = XRequest::getint( "id" );
        $this->_validID( $id );
        $model = parent::model( "authgroup", "am" );
        $data = $model->getData( $id );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            parent::loadlib( "mod" );
            $var_array = array(
                "authgroup" => $data,
                "id" => $id,
                "group_root" => XMod::selecauthgroup( $data['rootid'], "rootid", "根节点" ),
                "auth_checkbox" => $model->getPremElements( $data['auths'] )
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."authgroup.tpl" );
        }
        unset( $model );
    }

    public function control_saveadd( )
    {
        $this->checkAuth( "authgroup_add" );
        $args = $this->_validAdd( );
        $model = parent::model( "authgroup", "am" );
        $result = $model->doAdd( $args );
        if ( TRUE === $result )
        {
            $this->log( "authgroup_add", "", 1 );
            XHandle::halt( "添加成功", $this->cpfile."?c=authgroup", 0 );
        }
        else
        {
            $this->log( "authgroup_add", "", 0 );
            XHandle::halt( "添加失败", "", 1 );
        }
        unset( $model );
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "authgroup_edit" );
        list( $id, $args ) = $this->_validEdit( );
        $model = parent::model( "authgroup", "am" );
        $result = $model->doEdit( $id, $args );
        if ( $result == 1 )
        {
            XHandle::halt( "编辑失败，移动栏目错误，有子栏目时，不允许移动到同一树状子栏目下面", "", 1 );
        }
        else if ( $result == 2 )
        {
            $this->log( "authgroup_edit", "id=".$id."", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=authgroup", 0 );
        }
        else
        {
            $this->log( "authgroup_edit", "id=".$id."", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
        unset( $model );
    }

    public function control_del( )
    {
        $this->checkAuth( "authgroup_del" );
        $array_id = XRequest::getarray( "id" );
        $this->_validID( $array_id );
        $model = parent::model( "authgroup", "am" );
        $ii = 0;
        for ( ; $ii < count( $array_id ); ++$ii )
        {
            $id = intval( $array_id[$ii] );
            if ( TRUE === $model->checkExistsChild( $id ) )
            {
                XHandle::halt( "对不起，该节点含有子节点，请从子节点删除。", "", 1 );
            }
            else
            {
                $result = $model->doDel( $id );
            }
        }
        if ( TRUE === $result )
        {
            $this->log( "authgroup_del", "id=".$array_id."", 1 );
            XHandle::halt( "删除成功", $this->cpfile."?c=authgroup", 0 );
        }
        else
        {
            $this->log( "authgroup_del", "id=".$array_id."", 0 );
            XHandle::halt( "删除失败", "", 1 );
        }
        unset( $model );
    }

    public function control_update( )
    {
        $this->checkAuth( "authgroup_edit" );
        $args = XRequest::getgpc( array( "id", "type" ) );
        $model = parent::model( "authgroup", "am" );
        $model->doUpdate( intval($args['id']), trim( $args['type'] ) );
        unset( $model );
    }

    private function _validAdd( )
    {
        $args = array(
            "groupname" => XRequest::getargs( "groupname" ),
            "rootid" => XRequest::getint( "rootid" ),
            "orders" => XRequest::getint( "orders" ),
            "flag" => XRequest::getint( "flag" ),
            "intro" => XRequest::getargs( "intro" ),
            "auths" => XRequest::getcomargs( "auths" )
        );
        if ( empty( $args['groupname'] ) )
        {
            XHandle::halt( "请填写组名称", "", 1 );
        }
        $args['rootid'] = intval( $args['rootid'] );
        $args['orders'] = intval( $args['orders'] );
        $args['flag'] = intval( $args['flag'] );
        return $args;
    }

    private function _validEdit( )
    {
        $args = array(
            "groupname" => XRequest::getargs( "groupname" ),
            "rootid" => XRequest::getint( "rootid" ),
            "orders" => XRequest::getint( "orders" ),
            "flag" => XRequest::getint( "flag" ),
            "intro" => XRequest::getargs( "intro" ),
            "auths" => XRequest::getcomargs( "auths" )
        );
        $id = XRequest::getint( "id" );
        if ( $id < 1 )
        {
            XHandle::halt( "ID丢失", "", 1 );
        }
        if ( empty( $args['groupname'] ) )
        {
            XHandle::halt( "请填写组名称", "", 1 );
        }
        $args['rootid'] = intval( $args['rootid'] );
        if ( $id == $args['rootid'] )
        {
            XHandle::halt( "对不起，所属节点不能选择自己。", "", 1 );
        }
        $args['orders'] = intval( $args['orders'] );
        $args['flag'] = intval( $args['flag'] );
        return array( $id, $args );
    }

    private function _validID( $id )
    {
        if ( empty( $id ) )
        {
            XHandle::halt( "ID丢失，请选择要操作的ID", "", 1 );
        }
    }

}

?>
