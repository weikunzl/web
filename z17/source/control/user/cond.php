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
        $model = parent::model( "cond", "um" );
        $data = $model->getData( parent::$wrap_user['userid'] );
        if ( empty( $data ) )
        {
            $model->writeCond( parent::$wrap_user['userid'] );
        }
        unset( $model );
        $var_array = array(
            "page_title" => $this->getTitle( "cond" ),
            "cond" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."cond.tpl" );
    }

    public function control_savecond( )
    {
        $service = parent::service( "cond", "us" );
        $args = $service->validCond( );
        unset( $service );
        $model = parent::model( "cond", "um" );
        $result = $model->doEdit( parent::$wrap_user['userid'], $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "修改成功", $this->ucfile."?c=cond", 0 );
        }
        else
        {
            XHandle::halt( "修改失败", "", 1 );
        }
    }

}

?>
