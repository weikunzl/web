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
class promotionAModel extends X
{

    public function getConfig( )
    {
        $file = BASE_ROOT."./source/conf/promotion.inc.php";
        if ( file_exists( $file ) )
        {
            return require_once( $file );
        }
    }

    public function doSaveConfig( $args )
    {
        if ( $args['promotion'] == 1 )
        {
            $args['promotion_flag'] = "true";
        }
        else
        {
            $args['promotion_flag'] = "false";
        }
        $config = "<?php\r\n/**\r\n * @Brief 推广注册配置文件\r\n**/\r\nreturn array (\r\n    //开启true, 关闭false\r\n\t'promotion'=>".$args['promotion_flag'].",\r\n\t//注册邮箱有效_必选\r\n\t'emailvalid'=>1,\r\n\t//上传头像有效_可选\r\n\t'avatarvalid'=>".$args['avatarvalid'].",\r\n\t//每推广一个有效会员奖励金币个数\r\n\t'onemoney'=>".$args['onemoney'].",\r\n\t//每推广一个有效会员奖励积分个数\r\n\t'onepoints'=>".$args['onepoints'].",\r\n\t//累计推广达到几个有效会员自动结算\r\n\t'settlecounts'=>".$args['settlecounts'].",\r\n\t//推广链接跳转地址,1-注册页，2-首页\r\n\t'jumptype'=>".$args['jumptype'].",\r\n);\r\n?>";
        $file = "source/conf/promotion.inc.php";
        parent::loadutil( "file" );
        XFile::createfile( $file );
        return XFile::writefile( $file, $config );
    }

    public function getList( $items )
    {
        $where = " WHERE 1=1".$items['searchsql'];
        $start = ( $items['page'] - 1 ) * $items['pagesize'];
        $countsql = "SELECT COUNT(*) AS mycount FROM ".DB_PREFIX."promotion AS v".$where;
        $total = parent::$obj->fetch_count( $countsql );
        $sql = "SELECT v.*, ps.rzemail, ps.avatar FROM ".DB_PREFIX."promotion AS v LEFT JOIN ".DB_PREFIX."user_params AS ps ON v.ruserid=ps.userid".$where." ORDER BY v.id DESC LIMIT ".$start.", ".$items['pagesize']."";
        $array = parent::$obj->getall( $sql );
        return array(
            $total,
            $array
        );
    }

}

?>
