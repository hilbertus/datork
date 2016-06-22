<?php


namespace datork\base;


class Key
{

    /**
     * @param array $array
     * @return bool
     */
    public static function areArrayKeysSequential($array){
        $counter = 0;
        foreach ($array as $key => $val){
            if($key !== $counter){
                return false;
            }
            $counter++;
        }
        return true;
    }

    /**
     * @param array $array
     * @return bool
     */
    public static function isKeyMultidimensional($array)
    {
        $counter = 0;
        foreach ($array as $key => $val){
            if($key !== $counter){
                return false;
            }
            if(!is_array($val)){
                return false;
            }
            $counter++;
        }
        return true;
    }

    /**
     * @param mixed $keys
     * @return array
     */
    public static function normalize($keys)
    {
        if(!is_array($keys)){
            return [[$keys]];
        }
        if(!self::isKeyMultidimensional($keys)){
            return [$keys];
        }
        return $keys;
    }
}