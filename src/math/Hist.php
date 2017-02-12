<?php

namespace datork\math;


class Hist {
    
    /**
     * 
     * @param float[] $values
     * @param float[] $intervals
     * @return float[]
     */
    public static function byIntervals($values, $intervals)
    {
        sort($values);
        if(count($intervals) < 2){
            throw new Exception('$intervals must have at least 2 values.');
        }
        $intervalLeft = reset($intervals);
        $val = reset($values);
        $result = [];
        $resultIndex = 0;
        while(($intervalRight = next($intervals)) !== false){
            $result[$resultIndex] = 0;
            while ($val !== false && $val < $intervalLeft){
                $val = next($values);
            }
            while ($val !== false && $val < $intervalRight) {
                $result[$resultIndex]++;
                $val = next($values);
            }
            $resultIndex++;
            $intervalLeft = $intervalRight;
        }
        $belogsToLastInterval = 0;
        $lastIntervalRight = $intervalLeft;
        $lastResultIndex = $resultIndex - 1;
        while ($val !== false && $val == $lastIntervalRight){
            $result[$lastResultIndex]++;
            $val = next($values);
        }
        return $result;
    }
}
