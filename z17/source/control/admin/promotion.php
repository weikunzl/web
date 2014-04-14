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
        $this->checkAuth( "promotion" );
        $searchsql = "";
        $model = parent::model( "promotion", "am" );
        $data = $model->getConfig( );
        unset( $model );
        $var_array = array(
            "promotion" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."promotion.tpl" );
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "promotion" );
        $args = $this->_validEdit( );
        $model = parent::model( "promotion", "am" );
        $result = $model->doSaveConfig( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "promotion", "", 1 );
            XHandle::halt( "编辑成功", $this->cpfile."?c=promotion", 0 );
        }
        else
        {
            $this->log( "promotion", "", 0 );
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    private function _validEdit( )
    {
        $args = XRequest::getgpc( array( "promotion", "avatarvalid", "onemoney", "onepoints", "settlecounts", "jumptype" ) );
        $args['promotion'] = intval( $args['promotion'] );
        $args['avatarvalid'] = intval( $args['avatarvalid'] );
        $args['onemoney'] = floatval( $args['onemoney'] );
        $args['onepoints'] = floatval( $args['onepoints'] );
        $args['settlecounts'] = intval( $args['settlecounts'] );
        $args['jumptype'] = intval( $args['jumptype'] );
        return $args;
    }

    public function control_list( )
    {
        $this->checkAuth( "promotion" );
        $searchsql = "";
        $model = parent::model( "promotion", "am" );
        list( $total, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        unset( $model );
        $url = XRequest::getphpself( );
        $url .= "?c=promotion&a=list";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $total / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $total,
            "showpage" => XPage::admin( $total, $this->pagesize, $this->page, $url, 10 ),
            "promotion" => $data
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."promotion.tpl" );
    }

}

?>
