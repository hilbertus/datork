<?php


namespace datork\io;


use datork\arr\Get;

class Csv
{
    /**
     * @param array $arr 2-dim Array. each row must have same indexes
     * @param $path
     * @throws \Exception
     */
    public static function write(&$arr, $path)
    {

        $fp = fopen($path, 'w');
        $keys = array_keys(reset($arr));
        $length = count($keys);
        fputcsv($fp, $keys);

        foreach($arr as $row){
            if(count($row) !== $length){
                throw new \InvalidArgumentException('Matrix with different row length');
            }
            $row2Write = Get::byKeys($row, $keys);
            fputcsv($fp, $row2Write);
        }
        fclose($fp);
    }

    public static function read($path)
    {
        $fp = fopen($path, 'r');
        $keys = fgetcsv($fp);
        $res = [];
        if($keys === false){
            return $res;
        }
        while (($row = fgetcsv($fp)) !== false) {
            $res[] = array_combine($keys, $row);
        }
        fclose($fp);
        return $res;
    }
}