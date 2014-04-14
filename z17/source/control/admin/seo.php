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
        $this->checkAuth( "seo" );
        $model = parent::model( "seo", "am" );
        $data = $model->getAllList( );
        $total = count( $data );
        unset( $model );
        $var_array = array(
            "total" => $total,
            "seo" => $data
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."seo.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "seo" );
        $service = parent::service( "seo", "as" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "seo", "am" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据不存在！", "", 1 );
        }
        else
        {
            $var_array = array(
                "seo" => $data,
                "id" => $id
            );
            TPL::assign( $var_array );
            TPL::display( $this->cptpl."seo.tpl" );
        }
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "seo" );
        $service = parent::service( "seo", "as" );
        list( $id, $args ) = $service->validEdit( );
        unset( $service );
        $model = parent::model( "seo", "am" );
        $result = $model->doEdit( $id, $args );
        if ( TRUE === $result )
        {
            $this->log( "seo", "", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=seo", 0 );
        }
        else
        {
            $this->log( "seo", "", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
        unset( $model );
    }

    public function control_saveupdate( )
    {
        $this->checkAuth( "seo" );
        $service = parent::service( "seo", "as" );
        $ids = $service->validArrayID( );
        $model = parent::model( "seo", "am" );
        $ii = 0;
        for ( ; $ii < count( $ids ); ++$ii )
        {
            $id = intval( $ids[$ii] );
            $args = NULL;
            $args = $service->validUpdate( $id );
            $result = $model->doUpdate( $id, $args );
        }
        if ( TRUE === $result )
        {
            $model->createCache( );
        }
        unset( $model );
        unset( $service );
        if ( TRUE === $result )
        {
            $this->log( "seo", "", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=seo", 0 );
        }
        else
        {
            $this->log( "seo", "", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

}

?>
