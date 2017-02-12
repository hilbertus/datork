<?php

namespace datork\arr;

class Unarray {

    public static function recursive(&$array)
    {
        if(!is_array($array)){
            return $array;
        }
        if(count($array) == 1){
            $val = reset($array);
            return self::recursive($val);
        }
        $res = [];
        foreach($array as $key => $val){
            $res[$key] = self::recursive($val);
        }
        return $res;
    }

}
