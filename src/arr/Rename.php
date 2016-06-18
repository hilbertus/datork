<?php


namespace datork\arr;


class Rename
{

    /**
     * @param array $arr
     * @param array $keys [[rename keys in first dimension, e.g. oldName => newName], [rename keys in second dimension, e.g. oldName => newName]]
     * @return array mixed
     */
    public static function multiKeys(&$arr, $keys)
    {
        $curDimMaps = array_shift($keys);
        if ($curDimMaps === null) {
            $copy = $arr;
            return $copy;
        }
        $res = [];
        foreach($arr as $key => $val){
            $newKey = $key;
            if(array_key_exists($key, $curDimMaps)){
                $newKey = $curDimMaps[$key];
            }
            $res[$newKey] = self::multiKeys($val, $keys);
        }
        return $res;
    }

    /**
     * @param array $arr
     * @param array $keys e. g. [oldName1 => newName1, oldName2 => newName2]
     * @return array mixed
     */
    public static function Keys($arr, $keys)
    {
        return self::multiKeys($arr, [$keys]);
    }
}