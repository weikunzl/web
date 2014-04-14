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
    }

    public function control_group( )
    {
        $this->checkAuth( "mail_send" );
        TPL::display( $this->cptpl."mailsend.tpl" );
    }

    public function control_savegroup( )
    {
        $this->checkAuth( "mail_send" );
        $service = parent::service( "mailsend", "as" );
        $args = $service->validGroup( );
        unset( $service );
        $model = parent::model( "mailsend", "am" );
        list( $id, $result ) = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "会员筛选成功，正在载入发送页面...", $this->cpfile."?c=mailsend&a=sendgroup&id=".$id."", 0 );
        }
        else
        {
            XHandle::halt( "会员筛选失败，请重试。", "", 1 );
        }
    }

    public function control_sendgroup( )
    {
        $this->checkAuth( "mail_send" );
        $service = parent::service( "mailsend", "as" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "mailsend", "am" );
        list( $result, $total, $pagecount, $refresh ) = $model->doSendGroupMail( $id, $this->page );
        unset( $model );
        if ( FALSE === $result )
        {
            XHandle::halt( "对不起，读取邮件内容失败！", "", 1 );
        }
        else if ( $total == 0 )
        {
            XHandle::halt( "对不起，没有要筛选的会员数据", $this->cpfile."?c=mailsend&a=group", 4 );
        }
        else
        {
            $this->log( "mail_send", "", 1 );
            $success = "群发会员邮件任务提交完毕，共发送会员".$total."个";
            $msg = "<div align=center><br ><br />邮件发送中，请耐心等待...<br />共筛选会员 <b>".$total."</b> 个，合计 <b>".$pagecount."</b> 页<br />第 <font color=green>".$this->page."</font> 页发送完毕，准备进入第 <font color=blue>".( $this->page + 1 )."</font> 页...</div>";
            if ( $this->page == $pagecount )
            {
                XHandle::halt( $success, $this->cpfile."?c=mailsend&a=group", 0 );
            }
            else
            {
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".OESOFT_CHARSET."\" />";
                echo $msg;
                echo "<meta http-equiv=\"refresh\" content=\"".$refresh.";url=".$this->cpfile.( "?c=mailsend&a=sendgroup&id=".$id."&page=" ).( $this->page + 1 )."\">";
            }
        }
    }

    public function control_single( )
    {
        $this->checkAuth( "mail_send" );
        TPL::display( $this->cptpl."mailsend.tpl" );
    }

    public function control_sendsingle( )
    {
        $this->checkAuth( "mail_send" );
        $service = parent::service( "mailsend", "as" );
        list( $recemail, $args ) = $service->validSingle( );
        unset( $service );
        $model = parent::model( "mailsend", "am" );
        $result = $model->doSendSingleMail( $recemail, $args );
        unset( $model );
        if ( TRUE === $result )
        {
            $this->log( "mail_send", "", 1 );
            XHandle::halt( "邮件发送任务提交成功", $this->cpfile."?c=mailsend&a=single", 0 );
        }
        else
        {
            $this->log( "mail_send", "", 0 );
            XHandle::halt( "邮件发送任务提交失败", "", 1 );
        }
    }

    public function control_offvip( )
    {
        $this->checkAuth( "mail_send" );
        TPL::display( $this->cptpl."mailsend.tpl" );
    }

    public function control_saveoffvip( )
    {
        $this->checkAuth( "mail_send" );
        $service = parent::service( "mailsend", "as" );
        $args = $service->validOffVip( );
        unset( $service );
        $model = parent::model( "mailsend", "am" );
        list( $id, $result ) = $model->doAdd( $args );
        unset( $model );
        if ( TRUE === $result )
        {
            XHandle::halt( "会员筛选成功，正在载入发送页面...", $this->cpfile."?c=mailsend&a=sendoffvip&id=".$id."", 0 );
        }
        else
        {
            XHandle::halt( "会员筛选失败，请重试。", "", 1 );
        }
    }

    public function control_sendoffvip( )
    {
        $this->checkAuth( "mail_send" );
        $service = parent::service( "mailsend", "as" );
        $id = $service->validID( );
        unset( $service );
        $model = parent::model( "mailsend", "am" );
        list( $result, $total, $pagecount, $refresh ) = $model->doSendOffVipMail( $id, $this->page );
        unset( $model );
        if ( FALSE === $result )
        {
            XHandle::halt( "对不起，读取邮件内容失败！", "", 1 );
        }
        else if ( $total == 0 )
        {
            XHandle::halt( "对不起，没有要筛选的会员数据", $this->cpfile."?c=mailsend&a=offvip", 4 );
        }
        else
        {
            $this->log( "mail_send", "", 1 );
            $success = "群发会员邮件任务提交完毕，共发送会员".$total."个";
            $msg = "<div align=center><br ><br />邮件发送中，请耐心等待...<br />共筛选会员 <b>".$total."</b> 个，合计 <b>".$pagecount."</b> 页<br />第 <font color=green>".$this->page."</font> 页发送完毕，准备进入第 <font color=blue>".( $this->page + 1 )."</font> 页...</div>";
            if ( $this->page == $pagecount )
            {
                XHandle::halt( $success, $this->cpfile."?c=mailsend&a=offvip", 0 );
            }
            else
            {
                echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=".OESOFT_CHARSET."\" />";
                echo $msg;
                echo "<meta http-equiv=\"refresh\" content=\"".$refresh.";url=".$this->cpfile.( "?c=mailsend&a=sendoffvip&id=".$id."&page=" ).( $this->page + 1 )."\">";
            }
        }
    }

}

?>
