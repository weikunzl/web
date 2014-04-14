<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class domainClass
{

    private $state_domain = array( "al", "dz", "af", "ar", "ae", "aw", "om", "az", "eg", "et", "ie", "ee", "ad", "ao", "ai", "ag", "at", "au", "mo", "bb", "pg", "bs", "pk", "py", "ps", "bh", "pa", "br", "by", "bm", "bg", "mp", "bj", "be", "is", "pr", "ba", "pl", "bo", "bz", "bw", "bt", "bf", "bi", "bv", "kp", "gq", "dk", "de", "tl", "tp", "tg", "dm", "do", "ru", "ec", "er", "fr", "fo", "pf", "gf", "tf", "va", "ph", "fj", "fi", "cv", "fk", "gm", "cg", "cd", "co", "cr", "gg", "gd", "gl", "ge", "cu", "gp", "gu", "gy", "kz", "ht", "kr", "nl", "an", "hm", "hn", "ki", "dj", "kg", "gn", "gw", "ca", "gh", "ga", "kh", "cz", "zw", "cm", "qa", "ky", "km", "ci", "kw", "cc", "hr", "ke", "ck", "lv", "ls", "la", "lb", "lt", "lr", "ly", "li", "re", "lu", "rw", "ro", "mg", "im", "mv", "mt", "mw", "my", "ml", "mk", "mh", "mq", "yt", "mu", "mr", "us", "um", "as", "vi", "mn", "ms", "bd", "pe", "fm", "mm", "md", "ma", "mc", "mz", "mx", "nr", "np", "ni", "ne", "ng", "nu", "no", "nf", "na", "za", "aq", "gs", "eu", "pw", "pn", "pt", "jp", "se", "ch", "sv", "ws", "yu", "sl", "sn", "cy", "sc", "sa", "cx", "st", "sh", "kn", "lc", "sm", "pm", "vc", "lk", "sk", "si", "sj", "sz", "sd", "sr", "sb", "so", "tj", "tw", "th", "tz", "to", "tc", "tt", "tn", "tv", "tr", "tm", "tk", "wf", "vu", "gt", "ve", "bn", "ug", "ua", "uy", "uz", "es", "eh", "gr", "hk", "sg", "nc", "nz", "hu", "sy", "jm", "am", "ac", "ye", "iq", "ir", "il", "it", "in", "id", "uk", "vg", "io", "jo", "vn", "zm", "je", "td", "gi", "cl", "cf", "cn", "yr" );
    private $top_domain = array( "com", "arpa", "edu", "gov", "int", "mil", "net", "org", "biz", "info", "pro", "name", "museum", "coop", "aero", "xxx", "idv", "me", "mobi" );
    private $hostname;

    public function getDomain( $inhost = "" )
    {
        $domain = NULL;
        $this->_getHostName( $inhost );
        if ( !empty( $this->hostname ) )
        {
            if ( $this->hostname == "locahost" || $this->hostname == "127.0.0.1" )
            {
                $domain = $this->hostname;
                return $domain;
            }
            X::loadutil( "valid" );
            if ( FALSE === XValid::isip( $this->hostname ) )
            {
                $state = $this->_getState( );
                $top = $this->_getTop( $state );
                if ( !empty( $state ) )
                {
                    if ( !empty( $top ) )
                    {
                        $suffix = $top.".".$state;
                    }
                    else
                    {
                        $suffix = $state;
                    }
                }
                else if ( !empty( $top ) )
                {
                    $suffix = $top;
                }
                $domain = $this->_getRootDomain( $suffix );
                return $domain;
            }
            $domain = $this->hostname;
        }
        return $domain;
    }

    private function _getState( )
    {
        $state = "";
        $domainarr = explode( ".", $this->hostname );
        $count = count( $domainarr );
        $last = $domainarr[$count - 1];
        if ( in_array( $last, $this->state_domain ) )
        {
            $state = $last;
        }
        return $state;
    }

    private function _getTop( $state )
    {
        $top = "";
        $domainarr = explode( ".", $this->hostname );
        $count = count( $domainarr );
        if ( !empty( $state ) )
        {
            $last_top = $domainarr[$count - 2];
        }
        else
        {
            $last_top = $domainarr[$count - 1];
        }
        if ( in_array( $last_top, $this->top_domain ) )
        {
            $top = $last_top;
        }
        return $top;
    }

    private function _getRootDomain( $suffix )
    {
        $rootdomain = NULL;
        $domainarr = explode( ".", $this->hostname );
        $count = count( $domainarr );
        if ( 2 < $count )
        {
            if ( strpos( $suffix, "." ) )
            {
                $rootdomain = $domainarr[$count - 3].".".$suffix;
                return $rootdomain;
            }
            $rootdomain = $domainarr[$count - 2].".".$suffix;
            return $rootdomain;
        }
        $rootdomain = $this->hostname;
        return $rootdomain;
    }

    private function _getHostName( $inputdomain = "" )
    {
        if ( !empty( $inputdomain ) )
        {
            $this->hostname = strtolower( $inputdomain );
        }
        else
        {
            $this->hostname = strtolower( $_SERVER['HTTP_HOST'] );
            if ( empty( $this->hostname ) )
            {
                $this->hostname = strtolower( $_SERVER['SERVER_NAME'] );
            }
        }
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
