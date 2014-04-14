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

    private $dir = NULL;
    private $id = NULL;
    private $fromtype = NULL;

    public function __construct( )
    {
        $this->control( );
    }

    private function control( )
    {
        parent::__construct();
        $this->checkLogin( );
    }

    private function _getItems( )
    {
        $this->dir = XRequest::getargs( "dir" );
        $this->id = XRequest::getargs( "id" );
        $this->fromtype = XRequest::getargs( "fromtype" );
    }

    public function control_run( )
    {
        $this->checkAuth( "templet_volist" );
        $this->_getItems( );
        $model = parent::model( "templet", "am" );
        list( $total, $templets, $usingskin ) = $model->getList( $this->dir );
        unset( $model );
        $var_array = array(
            "total" => $total,
            "templets" => $templets,
            "usingskin" => $usingskin,
            "dir" => $this->dir
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."templet.tpl" );
    }

    public function control_select( )
    {
        $this->_getItems( );
        $inputid = XRequest::getargs( "inputid" );
        $model = parent::model( "templet", "am" );
        list( $total, $template, $usingskin ) = $model->getList( "" );
        unset( $model );
        $i = 0;
        $templets = array( );
        if ( !empty( $template ) )
        {
            foreach ( $template as $key => $value )
            {
                if ( $value['extension'] == "tpl"  || $value['type'] == 2 )
                {
                    $filename = str_ireplace( OESOFT_TPLPRE, "", $value['filename'] );
                    $tplname = str_ireplace( OESOFT_TPLPRE, "", $value['tplname'] );
                    $templets[] = array(
                        "i" => $i + 1,
                        "size" => $value['size'],
                        "timeline" => $value['timeline'],
                        "filename" => $filename,
                        "tplname" => $tplname
                    );
                    $i += 1;
                }
            }
        }
        $var_array = array(
            "total" => $total,
            "templets" => $templets,
            "usingskin" => $usingskin,
            "fromtype" => $this->fromtype,
            "inputid" => $inputid
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."templet.tpl" );
    }

    public function control_edit( )
    {
        $this->checkAuth( "templet_edit" );
        $this->_getItems( );
        $this->_validID( );
        $model = parent::model( "templet", "am" );
        list( $content, $usingskin, $dir ) = $model->getData( $this->id );
        unset( $model );
        $var_array = array(
            "content" => $content,
            "usingskin" => $usingskin,
            "dir" => $dir,
            "id" => $this->id
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."templet.tpl" );
    }

    public function control_saveedit( )
    {
        $this->checkAuth( "templet_edit" );
        $this->_getItems( );
        $this->_validID( );
        $content = $this->_validEdit( );
        $model = parent::model( "templet", "am" );
        $result = $model->doEdit( $this->id, $content );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "templet_edit", "id=".$this->id."", 1 );
            if ( !empty( $this->dir ) )
            {
                XHandle::halt( "模板文件修改成功", $this->cpfile."?c=templet&dir=".urlencode( $this->dir )."", 0 );
            }
            else
            {
                XHandle::halt( "模板文件修改成功", $this->cpfile."?c=templet", 0 );
            }
        }
        else
        {
            $this->log( "templet_edit", "id=".$this->id."", 0 );
            XHandle::halt( "对不起，修改模板文件失败，请检查模板目录是否有写入权限。", "", 1 );
        }
    }

    public function control_delfile( )
    {
        $this->checkAuth( "templet_del" );
        $this->_getItems( );
        $this->_validID( );
        $model = parent::model( "templet", "am" );
        list( $result, $dir ) = $model->doDelFile( $this->id );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "templet_del", "id=".$this->id."", 1 );
            XHandle::halt( "模板文件删除成功", $this->cpfile."?c=templet&dir=".urlencode( $dir ), 0 );
        }
        else
        {
            $this->log( "templet_del", "id=".$this->id."", 0 );
            XHandle::halt( "对不起，删除模板文件失败，请检查模板文件是否存在或者有删除的权限。", "", 1 );
        }
    }

    public function control_delfolder( )
    {
        $this->checkAuth( "templet_del" );
        $this->_getItems( );
        $this->_validFolder( );
        $model = parent::model( "templet", "am" );
        $result = $model->doDelFolder( $this->id );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "templet_del", "id=".$this->id."", 1 );
            XHandle::halt( "文件夹删除成功", $this->cpfile."?c=templet", 0 );
        }
        else
        {
            $this->log( "templet_del", "id=".$this->id."", 0 );
            XHandle::halt( "对不起，文件夹删除失败，请检查文件夹是否存在或者有删除的权限。", "", 1 );
        }
    }

    private function _validID( )
    {
        if ( empty( $this->id ) )
        {
            XHandle::halt( "对不起，获取文件信息错误！", "", 1 );
        }
        else
        {
            parent::loadlib( "option" );
            $nonce_templet = XOption::get( "nonce_templet" );
            if ( FALSE === file_exists( BASE_ROOT."tpl/templets/".$nonce_templet.$this->id ) )
            {
                XHandle::halt( "对不起，模板文件不存在！", "", 1 );
            }
        }
    }

    private function _validFolder( )
    {
        if ( empty( $this->id ) )
        {
            XHandle::halt( "对不起，模板文件夹错误。", "", 1 );
        }
        else
        {
            parent::loadlib( "option" );
            $nonce_templet = XOption::get( "nonce_templet" );
            $folder = BASE_ROOT."tpl/templets/".$nonce_templet.$this->id;
            if ( FALSE === is_dir( $folder ) )
            {
                XHandle::halt( "对不起，模板文件夹不存在！", "", 1 );
            }
        }
    }

    private function _validEdit( )
    {
        $content = XRequest::getargs( "content", "", FALSE );
        if ( empty( $content ) )
        {
            XHandle::halt( "对不起，模板内容不能为空。", "", 1 );
        }
        return $content;
    }

}

?>
