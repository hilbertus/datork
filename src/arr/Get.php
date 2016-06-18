<?php


namespace datork\arr;


class Get
{
    /**
     * Returns the sub array of $array with key and order of $keys
     * @param array $array
     * @param array $keys
     * @return array
     */
    public static function byKeys(&$array, $keys)
    {
        return self::byMultiKeys($array, [$keys]);
    }

    /**
     * Returns the sub multidimensional array of $array with multidimensional keys and order of $keys
     * @param array $array
     * @param array $keys [[keys of first dimension], [keys of second dimension], ...] <br /> empty dimension array means take all
     * @return array
     */
    public static function byMultiKeys(&$array, $keys)
    {
        $curDimKeys = array_shift($keys);
        if($curDimKeys === null){
            $copy = $array;
            return $copy;
        }
        if(count($curDimKeys) === 0){
            $curDimKeys = array_keys($array);
        }
        $res = [];
        foreach($curDimKeys as $key){
            $res[$key] = self::byMultiKeys($array[$key], $keys);
        }
        return $res;
    }
}