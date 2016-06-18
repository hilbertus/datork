<?php


namespace datork\io;


use datork\arr\Get;
use datork\base\Object;

class Csv
{
    /**
     * @param array $arr 2-dim Array. each row must have same indexes
     * @param $path
     * @param $csvWriteOptionsArr 'this Array will create CsvWriteOptions Object with its keys'
     * @throws \Exception
     */
    public static function write(&$arr, $path, $csvWriteOptionsArr = [])
    {

        $fp = fopen($path, 'w');
        $keys = array_keys(reset($arr));
        $length = count($keys);

        /** @var $options CsvWriteOptions */
        $options = Object::build(CsvWriteOptions::class, $csvWriteOptionsArr);
        fputcsv($fp, $keys, $options->delimiter, $options->enclosure, $options->escapeChar);

        foreach($arr as $row){
            if(count($row) !== $length){
                throw new \InvalidArgumentException('Matrix with different row length');
            }
            $row2Write = Get::byKeys($row, $keys);
            fputcsv($fp, $row2Write, $options->delimiter, $options->enclosure, $options->escapeChar);
        }
        fclose($fp);
    }

    /**
     * @param string $path
     * @param $path
     * @param $csvReadOptionsArr 'this Array will create CsvWriteOptions Object with its keys'
     * @return array
     */
    public static function read($path, $csvReadOptionsArr = [])
    {
        $fp = fopen($path, 'r');

        /** @var $options CsvReadOptions */
        $options = Object::build(CsvReadOptions::class, $csvReadOptionsArr);
        $keys = fgetcsv($fp, null, $options->delimiter, $options->enclosure, $options->escapeChar);
        $res = [];
        if($keys === false){
            return $res;
        }
        while (($row = fgetcsv($fp, null, $options->delimiter, $options->enclosure, $options->escapeChar)) !== false) {
            $res[] = array_combine($keys, $row);
        }
        fclose($fp);
        return $res;
    }
}