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
        $searchsql = "";
        $model = parent::model( "diary", "um" );
        list( $datacount, $data ) = $model->getList( array(
            "page" => $this->page,
            "pagesize" => $this->pagesize,
            "searchsql" => $searchsql
        ) );
        $url = XRequest::getphpself( );
        $url .= "?c=diary";
        $var_array = array(
            "page" => $this->page,
            "nextpage" => $this->page + 1,
            "prepage" => $this->page - 1,
            "pagecount" => ceil( $datacount / $this->pagesize ),
            "pagesize" => $this->pagesize,
            "total" => $datacount,
            "showpage" => XPage::user( $datacount, $this->pagesize, $this->page, $url ),
            "diary" => $data,
            "page_title" => $this->getTitle( "diary_run" )
        );
        unset( $model );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."diary.tpl" );
    }

    public function control_add( )
    {
        $model = parent::model( "diary", "um" );
        if ( FALSE === $model->checkPublishStatus( $this->g ) )
        {
            XHandle::halt( "对不起，你所在的会员组没有权限发表日记，请升级。", "", 1 );
        }
        unset( $model );
        $var_array = array(
            "page_title" => $this->getTitle( "diary_add" )
        );
        TPL::assign( $var_array );
        TPL::display( $this->uctpl."diary.tpl" );
    }

    public function control_edit( )
    {
        $service = parent::service( "diary", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "diary", "um" );
        $data = $model->getData( $id );
        unset( $model );
        if ( empty( $data ) )
        {
            XHandle::halt( "对不起，读取数据错误。", "", 1 );
        }
        else
        {
            $var_array = array(
                "page_title" => $this->getTitle( "diary_edit" ),
                "id" => $id,
                "diary" => $data
            );
            TPL::assign( $var_array );
            TPL::display( $this->uctpl."diary.tpl" );
        }
    }

    public function control_saveadd( )
    {
        $service = parent::service( "diary", "us" );
        $args = $service->validAdd( );
        unset( $service );
        $model = parent::model( "diary", "um" );
        $result = $model->doAdd( $args, $this->g );
        unset( $model );
        unset( $args );
        if ( TRUE === $result )
        {
            if ( parent::$cfg['auditdiary'] == 1 )
            {
                XHandle::halt( "发表成功，请等待网站审核。", $this->ucfile."?c=diary", 0 );
            }
            else
            {
                XHandle::halt( "发表成功", $this->ucfile."?c=diary", 0 );
            }
        }
        else
        {
            XHandle::halt( "发表失败", "", 1 );
        }
    }

    public function control_saveedit( )
    {
        $service = parent::service( "diary", "us" );
        list( $id, $args ) = $service->validEdit( );
        unset( $service );
        $model = parent::model( "diary", "um" );
        $result = $model->doEdit( $id, $args );
        unset( $model );
        unset( $args );
        if ( TRUE === $result )
        {
            if ( parent::$cfg['auditdiary'] == 1 )
            {
                XHandle::halt( "编辑成功，请等待网站审核。", $this->ucfile."?c=diary", 0 );
            }
            else
            {
                XHandle::halt( "编辑成功", $this->ucfile."?c=diary", 0 );
            }
        }
        else
        {
            XHandle::halt( "编辑失败", "", 1 );
        }
    }

    public function control_del( )
    {
        $service = parent::service( "diary", "us" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "diary", "um" );
        $result = $model->doDel( $id );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "删除成功", $this->ucfile."?c=diary", 0 );
        }
        else
        {
            XHandle::halt( "删除失败", "", 1 );
        }
    }

}

?>
