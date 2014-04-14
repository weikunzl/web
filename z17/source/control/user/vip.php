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
class control extends userbase
{

    public function control_run( )
    {
        $model = parent::model( "usergroup", "am" );
        $data = $model->getVolist( );
        unset( $model );
        $var_array = array(
            "page_title" => $this->getTitle( "vip_run" ),
            "group" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."vip.tpl" );
    }

    public function control_view( )
    {
        $service = parent::service( "vip", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "usergroup", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "载入VIP组错误", "", 1 );
        }
        else
        {
            $var_array = array(
                "page_title" => $this->getTitle( "vip_run" ),
                "group" => $data
            );
            TPL::assign( $var_array );
            TPL::display( $this->uctpl."vip.tpl" );
        }
    }

    public function control_savevip( )
    {
        $service = parent::service( "vip", "us" );
        list( $groupid, $type ) = $service->validVip( );
        unset( $service );
        $model_group = parent::model( "usergroup", "am" );
        $group_data = $model_group->getData( $groupid );
        unset( $model_group );
        if ( empty( $group_data ) )
        {
            XHandle::halt( "对不起，获取会员组信息失败！无法完成升级操作。", "", 1 );
        }
        $model = parent::model( "vip", "um" );
        $commer_data = $model->getCommerData( $type, $group_data['commer'] );
        if ( empty( $commer_data ) )
        {
            XHandle::halt( "对不起，获取会员组选项失败！", "", 1 );
        }
        if ( 0 < $commer_data['money'] && $this->u['money'] < $commer_data['money'] )
        {
            XHandle::halt( "对不起，您的可用".XLang::get( "money" )."不足，无法执行本次升级。", "", 1 );
        }
        $result = $model->doSaveVip( array(
            "groupid" => $groupid,
            "groupname" => $group_data['groupname']
        ), $commer_data );
        unset( $model );
        unset( $group_data );
        unset( $commer_data );
        if ( TRUE === $result )
        {
            XHandle::halt( "恭喜你，VIP升级成功", $this->ucfile."?c=vip", 0 );
        }
        else
        {
            XHandle::halt( "对不起，升级失败。", "", 1 );
        }
    }

}

?>
