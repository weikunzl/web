<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class mailClass
{

    public function sendMail( $items, $mailto, $subject, $content, $attachment = "" )
    {
        require_once( BASE_ROOT."./source/core/util/class.smtp.php" );
        require_once( BASE_ROOT."./source/core/util/class.phpmailer.php" );
        $mail = new phpmailerClass( );
        $mail->CharSet = OESOFT_CHARSET;
        $mail->Encoding = "base64";
        $mail->Port = $items['port'];
        if ( intval( $items['sendtype'] ) == 1 )
        {
            $mail->IsSMTP( );
        }
        else
        {
            $mail->IsMail( );
        }
        $mail->Host = $items['smtp'];
        $mail->SMTPAuth = TRUE;
        $mail->Username = $items['sendmail'];
        $mail->Password = $items['sendpassword'];
        $mail->From = $items['sendmail'];
        $mail->FromName = $items['sendname'];
        $mail->AddAddress( $mailto );
        $mail->IsHTML( TRUE );
        $mail->Subject = $subject;
        $mail->Body = $content;
        if ( !empty( $attachment ) && substr( $attachment, 0, 15 ) == "data/attachment" )
        {
            $mail->AddAttachment( BASE_ROOT.$attachment );
        }
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
        if ( $mail->Host == "smtp.gmail.com" )
        {
            $mail->SMTPSecure = "ssl";
        }
        if ( !$mail->Send( ) )
        {
            echo $mail->ErrorInfo;
            return FALSE;
        }
        return TRUE;
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
