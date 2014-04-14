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
        $service = parent::service( "complaint", "us" );
        $uid = $service->validUid( );
        unset( $service );
        $model = parent::model( "user", "um" );
        $tauser = $model->getUserSimpleInfo( $uid );
        unset( $model );
        if ( empty( $tauser ) )
        {
            XHandle::halt( "举报对象不存在或已删除！", "", 1 );
        }
        else
        {
            $var_array = array(
                "uid" => $uid,
                "tauser" => $tauser,
                "page_title" => $this->getTitle( "complaint" )
            );
            TPL::assign( $var_array );
            if ( $this->halttype == "jdbox" )
            {
                TPL::display( $this->uctpl."complaint_jdbox.tpl" );
            }
            else
            {
                TPL::display( $this->uctpl."complaint.tpl" );
            }
        }
    }

    public function control_savecomplaint( )
    {
        $service = parent::service( "complaint", "us" );
        $args = $service->validSave( );
        unset( $service );
        $model = parent::model( "complaint", "um" );
        $result = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            if ( $this->halttype == "jdbox" )
            {
                XHandle::jqdialog( "提交成功", 0 );
            }
            else
            {
                XHandle::halt( "提交成功", PATH_URL."index.php", 0 );
            }
        }
    }

}

?>
