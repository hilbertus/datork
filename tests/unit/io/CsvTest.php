<?php


namespace datork\io;


class CsvTest extends \PHPUnit_Framework_TestCase
{
    public function testWrite()
    {
        $sampleData = [
            ['name', 'age', 'alive'],
            ['Batman', 34, true],
            ['Superman', 28, true],
            ['Clingon', 99, false]
        ];
//        $path = dirname(dirname(__DIR__)):'/'
//        Csv::write()
        echo 'ich bin hier';
    }
}
