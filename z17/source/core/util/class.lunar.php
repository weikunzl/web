<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class Lunar_SX
{

    private $_SMDay = array( 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );
    private $_LStart = 1950;
    private $_LMDay = array( array( 47, 29, 30, 30, 29, 30, 30, 29, 29, 30, 29, 30, 29 ), array( 36, 30, 29, 30, 30, 29, 30, 29, 30, 29, 30, 29, 30 ), array( 6, 29, 30, 29, 30, 59, 29, 30, 30, 29, 30, 29, 30, 29 ), array( 44, 29, 30, 29, 29, 30, 30, 29, 30, 30, 29, 30, 29 ), array( 33, 30, 29, 30, 29, 29, 30, 29, 30, 30, 29, 30, 30 ), array( 23, 29, 30, 59, 29, 29, 30, 29, 30, 29, 30, 30, 30, 29 ), array( 42, 29, 30, 29, 30, 29, 29, 30, 29, 30, 29, 30, 30 ), array( 30, 30, 29, 30, 29, 30, 29, 29, 59, 30, 29, 30, 29, 30 ), array( 48, 30, 30, 30, 29, 30, 29, 29, 30, 29, 30, 29, 30 ), array( 38, 29, 30, 30, 29, 30, 29, 30, 29, 30, 29, 30, 29 ), array( 27, 30, 29, 30, 29, 30, 59, 30, 29, 30, 29, 30, 29, 30 ), array( 45, 30, 29, 30, 29, 30, 29, 30, 30, 29, 30, 29, 30 ), array( 35, 29, 30, 29, 29, 30, 29, 30, 30, 29, 30, 30, 29 ), array( 24, 30, 29, 30, 58, 30, 29, 30, 29, 30, 30, 30, 29, 29 ), array( 43, 30, 29, 30, 29, 29, 30, 29, 30, 29, 30, 30, 30 ), array( 32, 29, 30, 29, 30, 29, 29, 30, 29, 29, 30, 30, 29 ), array( 20, 30, 30, 59, 30, 29, 29, 30, 29, 29, 30, 30, 29, 30 ), array( 39, 30, 30, 29, 30, 30, 29, 29, 30, 29, 30, 29, 30 ), array( 29, 29, 30, 29, 30, 30, 29, 59, 30, 29, 30, 29, 30, 30 ), array( 47, 29, 30, 29, 30, 29, 30, 30, 29, 30, 29, 30, 29 ), array( 36, 30, 29, 29, 30, 29, 30, 30, 29, 30, 30, 29, 30 ), array( 26, 29, 30, 29, 29, 59, 30, 29, 30, 30, 30, 29, 30, 30 ), array( 45, 29, 30, 29, 29, 30, 29, 30, 29, 30, 30, 29, 30 ), array( 33, 30, 29, 30, 29, 29, 30, 29, 29, 30, 30, 29, 30 ), array( 22, 30, 30, 29, 59, 29, 30, 29, 29, 30, 30, 29, 30, 30 ), array( 41, 30, 30, 29, 30, 29, 29, 30, 29, 29, 30, 29, 30 ), array( 30, 30, 30, 29, 30, 29, 30, 29, 59, 29, 30, 29, 30, 30 ), array( 48, 30, 29, 30, 30, 29, 30, 29, 30, 29, 30, 29, 29 ), array( 37, 30, 29, 30, 30, 29, 30, 30, 29, 30, 29, 30, 29 ), array( 27, 30, 29, 29, 30, 29, 60, 29, 30, 30, 29, 30, 29, 30 ), array( 46, 30, 29, 29, 30, 29, 30, 29, 30, 30, 29, 30, 30 ), array( 35, 29, 30, 29, 29, 30, 29, 29, 30, 30, 29, 30, 30 ), array( 24, 30, 29, 30, 58, 30, 29, 29, 30, 29, 30, 30, 30, 29 ), array( 43, 30, 29, 30, 29, 29, 30, 29, 29, 30, 29, 30, 30 ), array( 32, 30, 29, 30, 30, 29, 29, 30, 29, 29, 59, 30, 30, 30 ), array( 50, 29, 30, 30, 29, 30, 29, 30, 29, 29, 30, 29, 30 ), array( 39, 29, 30, 30, 29, 30, 30, 29, 30, 29, 30, 29, 29 ), array( 28, 30, 29, 30, 29, 30, 59, 30, 30, 29, 30, 29, 29, 30 ), array( 47, 30, 29, 30, 29, 30, 29, 30, 30, 29, 30, 30, 29 ), array( 36, 30, 29, 29, 30, 29, 30, 29, 30, 29, 30, 30, 30 ), array( 26, 29, 30, 29, 29, 59, 29, 30, 29, 30, 30, 30, 30, 30 ), array( 45, 29, 30, 29, 29, 30, 29, 29, 30, 29, 30, 30, 30 ), array( 34, 29, 30, 30, 29, 29, 30, 29, 29, 30, 29, 30, 30 ), array( 22, 29, 30, 59, 30, 29, 30, 29, 29, 30, 29, 30, 29, 30 ), array( 40, 30, 30, 30, 29, 30, 29, 30, 29, 29, 30, 29, 30 ), array( 30, 29, 30, 30, 29, 30, 29, 30, 59, 29, 30, 29, 30, 30 ), array( 49, 29, 30, 29, 30, 30, 29, 30, 29, 30, 30, 29, 29 ), array( 37, 30, 29, 30, 29, 30, 29, 30, 30, 29, 30, 30, 29 ), array( 27, 30, 29, 29, 30, 58, 30, 30, 29, 30, 30, 29, 30, 29 ), array( 46, 30, 29, 29, 30, 29, 29, 30, 29, 30, 30, 30, 29 ), array( 35, 30, 30, 29, 29, 30, 29, 29, 30, 29, 30, 30, 29 ), array( 23, 30, 30, 29, 59, 30, 29, 29, 30, 29, 30, 29, 30, 30 ), array( 42, 30, 30, 29, 30, 29, 30, 29, 29, 30, 29, 30, 29 ), array( 31, 30, 30, 29, 30, 30, 29, 30, 29, 29, 30, 29, 30 ), array( 21, 29, 59, 30, 30, 29, 30, 29, 30, 29, 30, 29, 30, 30 ), array( 39, 29, 30, 29, 30, 29, 30, 30, 29, 30, 29, 30, 29 ), array( 28, 30, 29, 30, 29, 30, 29, 59, 30, 30, 29, 30, 30, 30 ), array( 48, 29, 29, 30, 29, 29, 30, 29, 30, 30, 30, 29, 30 ), array( 37, 30, 29, 29, 30, 29, 29, 30, 29, 30, 30, 29, 30 ), array( 25, 30, 30, 29, 29, 59, 29, 30, 29, 30, 29, 30, 30, 30 ), array( 44, 30, 29, 30, 29, 30, 29, 29, 30, 29, 30, 29, 30 ), array( 33, 30, 29, 30, 30, 29, 30, 29, 29, 30, 29, 30, 29 ), array( 22, 30, 29, 30, 59, 30, 29, 30, 29, 30, 29, 30, 29, 30 ), array( 40, 30, 29, 30, 29, 30, 30, 29, 30, 29, 30, 29, 30 ), array( 30, 29, 30, 29, 30, 29, 30, 29, 30, 59, 30, 29, 30, 30 ), array( 
49, 29, 30, 29, 29, 30, 29, 30, 30, 30, 29, 30, 29 ), array( 38, 30, 29, 30, 29, 29, 30, 29, 30, 30, 29, 30, 30 ), array( 27, 29, 30, 29, 30, 29, 59, 29, 30, 29, 30, 30, 30, 29 ), array( 46, 29, 30, 29, 30, 29, 29, 30, 29, 30, 29, 30, 30 ), array( 35, 30, 29, 30, 29, 30, 29, 29, 30, 29, 29, 30, 30 ), array( 24, 29, 30, 30, 59, 30, 29, 29, 30, 29, 30, 29, 30, 30 ), array( 42, 29, 30, 30, 29, 30, 29, 30, 29, 30, 29, 30, 29 ), array( 31, 30, 29, 30, 29, 30, 30, 29, 30, 29, 30, 29, 30 ), array( 21, 29, 59, 29, 30, 30, 29, 30, 30, 29, 30, 29, 30, 30 ), array( 40, 29, 30, 29, 29, 30, 29, 30, 30, 29, 30, 30, 29 ), array( 28, 30, 29, 30, 29, 29, 59, 30, 29, 30, 30, 30, 29, 30 ), array( 47, 30, 29, 30, 29, 29, 30, 29, 29, 30, 30, 30, 29 ), array( 36, 30, 30, 29, 30, 29, 29, 30, 29, 29, 30, 30, 29 ), array( 25, 30, 30, 30, 29, 59, 29, 30, 29, 29, 30, 30, 29, 30 ), array( 43, 30, 30, 29, 30, 29, 30, 29, 30, 29, 29, 30, 30 ), array( 33, 29, 30, 29, 30, 30, 29, 30, 29, 30, 29, 30, 29 ), array( 22, 29, 30, 59, 30, 29, 30, 30, 29, 30, 29, 30, 29, 30 ), array( 41, 30, 29, 29, 30, 29, 30, 30, 29, 30, 30, 29, 30 ), array( 30, 29, 30, 29, 29, 30, 29, 30, 29, 30, 30, 59, 30, 30 ), array( 49, 29, 30, 29, 29, 30, 29, 30, 29, 30, 30, 29, 30 ), array( 38, 30, 29, 30, 29, 29, 30, 29, 29, 30, 30, 29, 30 ), array( 27, 30, 30, 29, 30, 29, 59, 29, 29, 30, 29, 30, 30, 29 ), array( 45, 30, 30, 29, 30, 29, 29, 30, 29, 29, 30, 29, 30 ), array( 34, 30, 30, 29, 30, 29, 30, 29, 30, 29, 29, 30, 29 ), array( 23, 30, 30, 29, 30, 59, 30, 29, 30, 29, 30, 29, 29, 30 ), array( 42, 30, 29, 30, 30, 29, 30, 29, 30, 30, 29, 30, 29 ), array( 31, 29, 30, 29, 30, 29, 30, 30, 29, 30, 30, 29, 30 ), array( 21, 29, 59, 29, 30, 29, 30, 29, 30, 30, 29, 30, 30, 30 ), array( 40, 29, 30, 29, 29, 30, 29, 29, 30, 30, 29, 30, 30 ), array( 29, 30, 29, 30, 29, 29, 30, 58, 30, 29, 30, 30, 30, 29 ), array( 47, 30, 29, 30, 29, 29, 30, 29, 29, 30, 29, 30, 30 ), array( 36, 30, 29, 30, 29, 30, 29, 30, 29, 29, 30, 29, 30 ), array( 25, 30, 29, 30, 30, 59, 29, 30, 29, 29, 30, 29, 30, 29 ), array( 44, 29, 30, 30, 29, 30, 30, 29, 30, 29, 29, 30, 29 ), array( 32, 30, 29, 30, 29, 30, 30, 29, 30, 30, 29, 30, 29 ), array( 22, 29, 30, 59, 29, 30, 29, 30, 30, 29, 30, 30, 29, 29 ) );

    private function IsLeapYear( $AYear )
    {
        return $AYear % 4 == 0 && $AYear % 400 == 0;
    }

    private function GetSMon( $year, $month )
    {
        if ( $this->IsLeapYear( $year ) && $month == 2 )
        {
            return 29;
        }
        return $this->_SMDay[$month];
    }

    private function LYearName( $year )
    {
        $Name = array( "零", "一", "二", "三", "四", "五", "六", "七", "八", "九" );
        $i = 0;
        for ( ; $i < 4; ++$i )
        {
            $k = 0;
            for ( ; $k < 10; ++$k )
            {
                if ( $year[$i] == $k )
                {
                    $tmp .= $Name[$k];
                }
            }
        }
        return $tmp;
    }

    private function LMonName( $month )
    {
        if ( 1 <= $month && $month <= 12 )
        {
            $Name = array( 1 => "正", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二" );
            return $Name[$month];
        }
        return $month;
    }

    private function LDayName( $day )
    {
        if ( 1 <= $day && $day <= 30 )
        {
            $Name = array( 1 => "初一", "初二", "初三", "初四", "初五", "初六", "初七", "初八", "初九", "初十", "十一", "十二", "十三", "十四", "十五", "十六", "十七", "十八", "十九", "二十", "廿一", "廿二", "廿三", "廿四", "廿五", "廿六", "廿七", "廿八", "廿九", "三十" );
            return $Name[$day];
        }
        return $day;
    }

    public function S2L( $date )
    {
        list( $year, $month, $day ) = explode( "-", $date );
        if ( $year <= 1951 || $month <= 0 || $day <= 0 || 2051 <= $year )
        {
            return FALSE;
        }
        $date1 = strtotime( $year."-01-01" );
        $date2 = strtotime( $year."-".$month."-".$day );
        $days = round( ( $date2 - $date1 ) / 3600 / 24 );
        $days += 1;
        $Larray = $this->_LMDay[$year - $this->_LStart];
        if ( $days <= $Larray[0] )
        {
            $Lyear = $year - 1;
            $days = $Larray[0] - $days;
            $Larray = $this->_LMDay[$Lyear - $this->_LStart];
            if ( $days < $Larray[12] )
            {
                $Lmonth = 12;
                $Lday = $Larray[12] - $days;
            }
            else
            {
                $Lmonth = 11;
                $days -= $Larray[12];
                $Lday = $Larray[11] - $days;
            }
        }
        else
        {
            $Lyear = $year;
            $days -= $Larray[0];
            $i = 1;
            for ( ; $i <= 12; ++$i )
            {
                if ( $Larray[$i] < $days )
                {
                    $days -= $Larray[$i];
                }
                else
                {
                    if ( 30 < $days )
                    {
                        $days -= $Larray[13];
                        $Ltype = 1;
                    }
                    $Lmonth = $i;
                    $Lday = $days;
		    break;
                }
            }
        }
        return mktime( 0, 0, 0, $Lmonth, $Lday, $Lyear );
    }

    public function L2S( $date, $type = 0 )
    {
        list( $year, $month, $day ) = split( "-", $date );
        if ( $year <= 1951 || $month <= 0 || $day <= 0 || 2051 <= $year )
        {
            return FALSE;
        }
        $Larray = $this->_LMDay[$year - $this->_LStart];
        if ( $type == 1 && count( $Larray ) <= 12 )
        {
            return FALSE;
        }
        if ( 30 < $Larray[intval( $month )] && $type == 1 && 13 <= count( $Larray ) )
        {
            $day = $Larray[13] + $day;
        }
        $days = $day;
        $i = 0;
        for ( ; $i <= $month - 1; ++$i )
        {
            $days += $Larray[$i];
        }
        if ( 366 < $days || $this->GetSMon( $month, 2 ) != 29 && 365 < $days )
        {
            $Syear = $year + 1;
            if ( $this->GetSMon( $month, 2 ) != 29 )
            {
                $days -= 366;
            }
            else
            {
                $days -= 365;
            }
            if ( $this->_SMDay[1] < $days )
            {
                $Smonth = 2;
                $Sday = $days - $this->_SMDay[1];
            }
            else
            {
                $Smonth = 1;
                $Sday = $days;
            }
        }
        else
        {
            $Syear = $year;
            $i = 1;
            for ( ; $i <= 12; ++$i )
            {
                if ( $this->GetSMon( $Syear, $i ) < $days )
                {
                    $days -= $this->GetSMon( $Syear, $i );
                }
                else
                {
                    $Smonth = $i;
                    $Sday = $days;
		    break;
                }
            }
        }
        return mktime( 0, 0, 0, $Smonth, $Sday, $Syear );
    }

}

class lunarClass
{

    private $lunar_numbers = array( "鼠", "牛", "虎", "兔", "龙", "蛇", "马", "羊", "猴", "鸡", "狗", "猪" );
    private $astro_numbers = array( "白羊座", "金牛座", "双子座", "巨蟹座", "狮子座", "处女座", "天秤座", "天蝎座", "射手座", "摩羯座", "水瓶座", "双鱼座" );
    public $LMDay = array( );
    public $InterMonth = 0;
    public $InterMonthDays = 0;
    public $SLRangeDay = 0;
    public $SMDay = array( 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 );
    public $LongLife = array( "132637048", "133365036", "053365225", "132900044", "131386034", "022778122", "132395041", "071175231", "131175050", "132635038", "052891127", "131701046", "131748035", "042741223", "130694043", "132391032", "021327122", "131175040", "061623129", "133402047", "133402036", "051769125", "131453044", "130694034", "032158223", "132350041", "073213230", "133221049", "133402038", "063466226", "132901045", "131130035", "042651224", "130605043", "132349032", "023371121", "132709040", "072901128", "131738047", "132901036", "051333226", "131210044", "132651033", "031111223", "131323042", "082714130", "133733048", "131706038", "062794127", "132741045", "131206035", "042734124", "132647043", "131318032", "033878120", "133477039", "071461129", "131386047", "132413036", "051245126", "131197045", "132637033", "043405122", "133365041", "083413130", "132900048", "132922037", "062394227", "132395046", "131179035", "042711124", "132635043", "102855132", "131701050", "131748039", "062804128", "132742047", "132359036", "051199126", "131175045", "131611034", "031866122", "133749040", "081717130", "131452049", "132742037", "052413127", "132350046", "133222035", "043477123", "133402042", "133493031", "021877121", "131386039", "072747128", "130605048", "132349037", "053243125", "132709044", "132890033" );

    public function getLar( $date, $isLunar = 1 )
    {
        list( $year, $month, $day ) = explode( "-", $date );
        if ( $isLunar == 1 )
        {
            return $this->Lunar2Solar( $year, $month, $day );
        }
        return $this->Solar2Lunar( $year, $month, $day );
    }

    public function IsLeapYear( $AYear )
    {
        return $AYear % 4 == 0 && $AYear % 400 == 0;
    }

    public function CovertLunarMonth( $magicno )
    {
        $m = $magicno;
        $i = 12;
        for ( ; 1 <= $i; --$i )
        {
            $size = $m % 2;
            if ( $size == 0 )
            {
                $this->LMDay[$i] = 29;
            }
            else
            {
                $this->LMDay[$i] = 30;
            }
            $m = floor( $m / 2 );
        }
    }

    public function ProcessMagicStr( $yy )
    {
        $yy -= 1911;
        $magicstr = $this->LongLife[$yy];
        $this->InterMonth = substr( $magicstr, 0, 2 );
        $LunarMonth = substr( $magicstr, 2, 4 );
        $this->CovertLunarMonth( $LunarMonth );
        $dsize = substr( $magicstr, 6, 1 );
        switch ( $dsize )
        {
            case 0 :
                $this->InterMonthDays = 0;
                break;
            case 1 :
                $this->InterMonthDays = 29;
                break;
            case 2 :
                $this->InterMonthDays = 30;
        }
        $this->SLRangeDay = substr( $magicstr, 7, 2 );
    }

    public function DaysPerLunarMonth( $LYear, $LMonth )
    {
        $this->ProcessMagicStr( $LYear );
        if ( $LMonth < 0 )
        {
            return $this->InterMonthDays;
        }
        return $this->LMDay[$LMonth];
    }

    public function Solar2Lunar( $SYear, $SMonth, $SDay )
    {
        if ( !( 1912 <= $SYear && $SYear <= 2012 ) )
        {
            return FALSE;
        }
        $day = 0;
        if ( $this->isLeapYear( $SYear ) )
        {
            $this->SMDay[2] = 29;
        }
        $this->ProcessMagicStr( $SYear );
        if ( $SMonth == 1 )
        {
            $day = $SDay;
        }
        else
        {
            $i = 1;
            for ( ; $i <= $SMonth - 1; ++$i )
            {
                $day += $this->SMDay[$i];
            }
            $day += $SDay;
        }
        if ( $day <= $this->SLRangeDay )
        {
            $day -= $this->SLRangeDay;
            $this->processmagicstr( $SYear - 1 );
            $i = 12;
            for ( ; 1 <= $i; --$i )
            {
                $day += $this->LMDay[$i];
                if ( 0 < $day )
                {
                    break;
                }
            }
            $LYear = $SYear - 1;
            $LMonth = $i;
            $LDay = $day;
        }
        else
        {
            $day -= $this->SLRangeDay;
            $i = 1;
            for ( ; $i <= $this->InterMonth - 1; ++$i )
            {
                $day -= $this->LMDay[$i];
                if ( $day <= 0 )
                {
                    break;
                }
            }
            if ( $day <= 0 )
            {
                $LYear = $SYear;
                $LMonth = $i;
                $LDay = $day + $this->LMDay[$i];
            }
            else
            {
                $day -= $this->LMDay[$this->InterMonth];
                if ( $day <= 0 )
                {
                    $LYear = $SYear;
                    $LMonth = $this->InterMonth;
                    $LDay = $day + $this->LMDay[$this->InterMonth];
                }
                else
                {
                    $this->LMDay[$this->InterMonth] = $this->InterMonthDays;
                    $i = $this->InterMonth;
                    for ( ; $i <= 12; ++$i )
                    {
                        $day -= $this->LMDay[$i];
                        if ($day <= 0 )
                        {
                            break;
                        }
                    }
                    if ( $i == $this->InterMonth )
                    {
                        $LMonth = 0 - $this->InterMonth;
                    }
                    else
                    {
                        $LMonth = $i;
                    }
                    $LYear = $SYear;
                    $LDay = $day + $this->LMDay[$i];
                }
            }
        }
        return mktime( 0, 0, 0, $LMonth, $LDay, $LYear );
    }

    public function Lunar2Solar( $LYear, $LMonth, $LDay )
    {
        if ( !( 1912 <= $LYear  &&  $LYear <= 2012 ) )
        {
            return FALSE;
        }
        $day = 0;
        $SYear = $LYear;
        if ( $this->isLeapYear( $SYear ) )
        {
            $this->SMDay[2] = 29;
        }
        $this->processmagicstr( $SYear );
        if ( $LMonth < 0 )
        {
            $day = $this->LMDay[$this->InterMonth];
        }
        if ( $LMonth != 1 )
        {
            $i = 1;
            for ( ; $i <= $LMonth - 1; ++$i )
            {
                $day += $this->LMDay[$i];
            }
        }
        $day = $day + $LDay + $this->SLRangeDay;
        if ( $this->InterMonth != 13 && $this->InterMonth < $LMonth )
        {
            $day += $this->InterMonthDays;
        }
        $i = 1;
        for ( ; $i <= 12; ++$i )
        {
            $day -= $this->SMDay[$i];
            if ( $day <= 0 )
            {
                break;
            }
        }
        if ( 0 < $day )
        {
            $SYear += 1;
            if ( $this->isLeapYear( $SYear ) )
            {
                $this->SMDay[2] = 29;
            }
            $i = 1;
            for ( ; $i <= 12; ++$i )
            {
                $day -= $this->SMDay[$i];
                if ( $day <= 0 )
                {
                    break;
                }
            }
        }
        $day += $this->SMDay[$i];
        $SMonth = $i;
        $SDay = $day;
        return mktime( 0, 0, 0, $SMonth, $SDay, $SYear );
    }

    public function get_animal( $birth_year )
    {
        $animal = array( "鼠", "牛", "虎", "兔", "龙", "蛇", "马", "羊", "猴", "鸡", "狗", "猪" );
        $my_animal = ( $birth_year - 1900 ) % 12;
        return $animal[$my_animal];
    }

    public function get_zodiac_sign( $month, $day )
    {
        if ( $month < 1 || 12 < $month || $day < 1 || 31 < $day )
        {
            return FALSE;
        }
        $signs = array(
            array( "20" => "水瓶座" ),
            array( "19" => "双鱼座" ),
            array( "21" => "白羊座" ),
            array( "20" => "金牛座" ),
            array( "21" => "双子座" ),
            array( "22" => "巨蟹座" ),
            array( "23" => "狮子座" ),
            array( "23" => "处女座" ),
            array( "23" => "天秤座" ),
            array( "24" => "天蝎座" ),
            array( "22" => "射手座" ),
            array( "22" => "摩羯座" )
        );
        list( $sign_start, $sign_name ) = each( $signs[( integer )$month - 1] );
        if ( $day < $sign_start )
        {
            list( $sign_start, $sign_name ) = each( $signs[$month - 2 < 0 ? ( $month = 11 ) : ( $month -= 2 )] );
        }
        return $sign_name;
    }

    public function getAstro( $birthday )
    {
        if ( is_numeric( $birthday ) )
        {
            $dateline = $birthday;
        }
        else
        {
            $dateline = strtotime( $birthday );
        }
        $month = date( "m", $dateline );
        $day = date( "d", $dateline );
        return $this->get_zodiac_sign( $month, $day );
    }

    public function getLunar( $birthday )
    {
        if ( is_numeric( $birthday ) )
        {
            $date = date( "Y-m-d", $birthday );
        }
        else
        {
            $date = trim( $birthday );
        }
        $nl = new Lunar_SX( );
        $newdate = $nl->S2L( $date );
        unset( $nl );
        return $this->get_animal(date( "Y", $newdate ) );
    }

    public function getLunarID( $text )
    {
        $id = 0;
        foreach ( $this->lunar_numbers as $key => $value )
        {
            if ( trim( $text ) == trim( $value ) )
            {
                $id = intval( $key );
                break;
            }
        }
        return $id;
    }

    public function getLunarText( $id )
    {
        $string = "";
        foreach ( $this->lunar_numbers as $key => $value )
        {
            if ( intval( $id ) == intval( $key ) )
            {
                $string = trim( $value );
                break;
            }
        }
        return $string;
    }

    public function getAstroID( $text )
    {
        $id = 0;
        foreach ( $this->astro_numbers as $key => $value )
        {
            if ( trim( $text ) == trim( $value ) )
            {
                $id = intval( $key );
                break;
            }
        }
        return $id;
    }

    public function getAstroText( $id )
    {
        $string = "";
        foreach ( $this->astro_numbers as $key => $value )
        {
            if ( intval( $id ) == intval( $key ) )
            {
                $string = trim( $value );
                break;
            }
        }
        return $string;
    }

}

if ( !defined( "IN_OESOFT" ) )
{
    exit( "Access Denied" );
}
?>
