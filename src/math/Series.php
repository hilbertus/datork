<?php

namespace datork\math;


class Series {
    
    
    /**
     * 
     * @param float $start
     * @param float $end
     * @param int $byStepWidth
     * @return float[]
     */
    public static function byIntervalLength($start, $end, $byStepWidth)
    {
        if ($start >= $end) {
            throw new Exception('$start have to be smaller then $end.');
        }
        $series = $start;
        $r = [];
        while ($series <= $end){
            $r[] = $series;
            $series += $byStepWidth;
        }
        return $r;        
    }

    /**
     * 
     * @param float $start
     * @param float $end
     * @param int $intervalCount
     * @return float[]
     */
    public static function byIntervalCount($start, $end, $intervalCount)
    {
        if ($intervalCount <= 0) {
            throw new Exception('$intervalCount have to be greater then 0.');
        }
        $length = ($end - $start) / $intervalCount;
        return self::byIntervalLength($start, $end, $length);
    }

}
