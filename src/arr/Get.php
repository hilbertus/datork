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
    public static function byKeys(&$array, &$keys)
    {
        $res = [];
        foreach($keys as $key){
            $res[$key] = $array[$key];
        }
        return $res;
    }
}