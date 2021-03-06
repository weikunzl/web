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
class XUser extends X
{

    public static function getAvatar( $gender, $userimg, $flag, $exts = array( ) )
    {
        $img = "";
        if ( !isset( $exts['width'] ) || $exts['width'] == 0 )
        {
            $exts['width'] = intval( parent::$cfg['avatarwidth'] );
            $exts['height'] = intval( parent::$cfg['avatarheight'] );
        }
        if ( !empty( $userimg ) && $flag == 1 )
        {
            $img = "<img src='".PATH_URL.$userimg."' border='0' width='".$exts['width']."' height='".$exts['height']."' />";
            return $img;
        }
        if ( $gender == 1 )
        {
            $img = "<img src='".PATH_URL."tpl/static/images/male.gif' border='0' width='".$exts['width']."' height='".$exts['height']."' />";
            return $img;
        }
        $img = "<img src='".PATH_URL."tpl/static/images/female.gif' border='0' width='".$exts['width']."' height='".$exts['height']."' />";
        return $img;
    }

    public static function getAvatarUrl( $gender, $userimg, $flag, $private = 0 )
    {
        $img = "";
        if ( !empty( $userimg ) && $flag == 1 )
        {
            $img = PATH_URL.$userimg;
            return $img;
        }
        if ( $private == 0 )
        {
            if ( $gender == 1 )
            {
                $img = PATH_URL."tpl/static/images/male.gif";
                return $img;
            }
            $img = PATH_URL."tpl/static/images/female.gif";
            return $img;
        }
        if ( $gender == 1 )
        {
            $img = PATH_URL."tpl/static/images/male.gif";
            return $img;
        }
        $img = PATH_URL."tpl/static/images/female.gif";
        return $img;
    }

    public static function getIdentify( $gender, $gid, $enddate, $exts = array( ) )
    {
        $img = "";
        $gid = $gid < 1 ? 1 : $gid;
        if ( !isset( $exts['css'] ) )
        {
            $exts['css'] = "";
        }
        if ( !isset( $exts['width'] ) )
        {
            $exts['width'] = 0;
        }
        if ( !isset( $exts['height'] ) )
        {
            $exts['height'] = 0;
        }
        if ( 1 < $gid && intval( $enddate ) < strtotime( date( "Y-m-d", time( ) ) ) )
        {
            $gid = 1;
        }
        if ( $gender == 1 )
        {
            $g_sql = "SELECT maleimg AS img FROM ".DB_PREFIX."user_group";
        }
        else
        {
            $g_sql = "SELECT femaleimg AS img FROM ".DB_PREFIX."user_group";
        }
        $g_sql .= " WHERE groupid = '".$gid."'";
        $g_data = parent::$obj->fetch_first( $g_sql );
        if ( !empty( $g_data ) )
        {
            $img = "<img src='".PATH_URL.$g_data['img']."' border='0'";
            if ( 0 < $exts['width'] && 0 < $exts['height'] )
            {
                $img .= " width='".$exts['width']."' height='".$exts['height']."'";
            }
            $img .= " class='".$exts['css']."' />";
        }
        unset( $g_data );
        return $img;
    }

    public static function getIdentify2( $img, $exts = array( ) )
    {
        $url = "";
        if ( !isset( $exts['css'] ) )
        {
            $exts['css'] = "";
        }
        if ( !isset( $exts['width'] ) )
        {
            $exts['width'] = 0;
        }
        if ( !isset( $exts['height'] ) )
        {
            $exts['height'] = 0;
        }
        $url = "<img src='".PATH_URL.$img."' border='0'";
        if ( 0 < $exts['width'] && 0 < $exts['height'] )
        {
            $url .= " width='".$exts['width']."' height='".$exts['height']."'";
        }
        $url .= " class='".$exts['css']."' />";
        return $url;
    }

    public static function updateStar( $userid )
    {
        $star = 0;
        $sql = "SELECT * FROM ".DB_PREFIX.( "user_status WHERE `userid`='".$userid."'" );
        $rows = parent::$obj->fetch_first( $sql );
        if ( !empty( $rows ) )
        {
            if ( $rows['heightrz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['marryrz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['incomerz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['educationrz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['houserz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['carrz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['emailrz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['mobilerz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['idnumberrz'] == 1 )
            {
                $star += 1;
            }
            if ( $rows['videorz'] == 1 )
            {
                $star += 1;
            }
            parent::$obj->update( DB_PREFIX."user_status", array(
                "star" => $star
            ), "`userid`='".$userid."'" );
            return $star;
        }
        return FALSE;
    }

}

?>
