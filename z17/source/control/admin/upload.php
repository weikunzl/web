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

    private $multipart = NULL;
    private $module = NULL;
    private $formname = NULL;
    private $datapath = NULL;
    private $savepath = NULL;
    private $uploadinput = NULL;
    private $thumbinput = NULL;
    private $previewid = NULL;
    private $_urlitem = NULL;

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
        $this->multipart = XRequest::getargs( "multipart", "", FALSE );
        $this->module = XRequest::getargs( "module" );
        $this->formname = XRequest::getargs( "formname" );
        $this->uploadinput = XRequest::getargs( "uploadinput" );
        $this->thumbinput = XRequest::getargs( "thumbinput" );
        $this->previewid = XRequest::getargs( "previewid" );
        if ( empty( $this->multipart ) )
        {
            XHandle::halt( "multipart/form-data 参数不全", "", 1 );
        }
        if ( empty( $this->module ) )
        {
            $this->module = "upload";
        }
        $this->savepath = $this->datapath.date( "Y" ).date( "m" )."/".date( "d" )."/";
        $this->_urlitem = "formname=".$this->formname."&module=".$this->module."&uploadinput=".$this->uploadinput."&thumbinput=".$this->thumbinput."&multipart=".$this->multipart."&previewid=".$this->previewid."";
    }

    public function control_run( )
    {
        $this->checkAuth( "upload" );
        $this->_getItems( );
        $var_array = array(
            "module" => $this->module,
            "formname" => $this->formname,
            "uploadinput" => $this->uploadinput,
            "thumbinput" => $this->thumbinput,
            "multipart" => $this->multipart,
            "previewid" => $this->previewid
        );
        TPL::assign( $var_array );
        TPL::display( $this->cptpl."upload.tpl" );
    }

    public function control_saveupload( )
    {
        $this->checkAuth( "upload" );
        $this->_getItems( );
        $model = parent::model( "upload", "am" );
        $data = $model->doSaveUpload( $this->multipart, $this->module, $this->thumbinput );
        unset( $model );
        if ( is_array( $data ) )
        {
            $this->log( "upload", "", 1 );
            echo "<script type='text/javascript' src='".PATH_URL."tpl/static/js/jquery-1.4.4.min.js'></script>";
            if ( !empty( $this->thumbinput ) && in_array( strtolower( $data['ext'] ), array( "jpg", "jpeg", "png", "gif" ) ) )
            {
                echo "<script language='javascript' type='text/javascript'>";
                echo "window.parent.$('#".$this->uploadinput."').val('".$data['source']."');";
                echo "window.parent.$('#".$this->thumbinput."').val('".$data['thumbfiles']."');";
                if ( !empty( $this->previewid ) )
                {
                    echo "window.parent.$('#".$this->previewid."').html(\"<img src='".PATH_URL.$data['thumbfiles']."' width='60px' height='60px' />\");";
                }
                echo "</script>";
            }
            else
            {
                echo "<script language='javascript' type='text/javascript'>";
                echo "window.parent.$('#".$this->uploadinput."').val('".$data['source']."');";
                if ( !empty( $this->previewid ) )
                {
                    echo "window.parent.$('#".$this->previewid."').html(\"<img src='".PATH_URL.$data['source']."' width='60px' height='60px' />\");";
                }
                echo "</script>";
            }
        }
        else
        {
            $this->log( "upload", "", 0 );
            $this->_noteError( $data );
        }
        echo "<script>window.location.href='".$this->cpfile."?c=upload&".$this->_urlitem."';</script>";
    }

    public function _noteError( $type )
    {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=".OESOFT_CHARTSET."' /><style>body{margin:0px;font-size:12px;}</style>";
        echo "<a href='".$this->cpfile."?c=upload&".$this->_urlitem."'>重新上传</a>&nbsp;&nbsp;";
        if ( $type == "-1" )
        {
            echo "上传失败";
            exit( );
        }
        if ( $type == "-2" )
        {
            echo "不是通过HTTP POST方法上传";
            exit( );
        }
        if ( $type == "-3" )
        {
            echo "图片/附件类型有错";
            exit( );
        }
        if ( $type == "-4" )
        {
            echo "文件超过允许上传的大小";
            exit( );
        }
        if ( $type == "-5" )
        {
            echo "上传文件超过服务器上传限制";
            exit( );
        }
        if ( $type == "-6" )
        {
            echo "上传文件超过表达最大上传限制";
            exit( );
        }
        if ( $type == "-7" )
        {
            echo "图片/附件只上传了一半";
            exit( );
        }
        if ( $type == "-8" )
        {
            echo "图片/附件上传的临时目录出错";
            exit( );
        }
        if ( $type == "-9" )
        {
            echo "图片/附件新的文件名命名不合法";
            exit( );
        }
        echo "上传的内容不合法";
        exit( );
    }

}

?>
