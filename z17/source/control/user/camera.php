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

    public function control_savepic( )
    {
    }

    public function control_webcam( )
    {
        $model = parent::model( "camera", "um" );
        $result = $model->doSaveWebcam( );
        unset( $model );
        if ( FALSE === $result )
        {
            echo "save fail";
        }
        else
        {
            echo $result;
        }
    }

}

?>
