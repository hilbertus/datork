<?php


namespace datork\arr;


use datork\base\Key;

class Get
{
    /**
     * Returns the sub multidimensional array of $array with multidimensional keys and order of $keys
     * @param array $array
     * @param array $key [[keys of first dimension], [keys of second dimension], ...] <br /> empty dimension array means take all
     * @return array
     */
    public static function byKey(&$array, $key)
    {
        $keys = Key::normalize($key);
        return self::byMultiKeys($array, $keys);
    }


    /**
     * Returns the sub multidimensional array of $array with multidimensional keys and order of $keys
     * @param array $array
     * @param array $keys [[keys of first dimension], [keys of second dimension], ...] <br /> empty dimension array means take all
     * @return array
     */
    private static function byMultiKeys(&$array, $keys)
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