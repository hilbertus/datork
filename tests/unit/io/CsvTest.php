<?php


namespace datork\io;


use datork\system\File;

class CsvTest extends \PHPUnit_Framework_TestCase
{
    private $path;
    
    protected function setUp()
    {
        $this->path = dirname(dirname(__DIR__)).'/runtime/csv-test.csv';
        
    }

    protected function tearDown()
    {
        File::delete([$this->path]);
    }


    public function testWrite()
    {
        $sampleData = [
            ['name' => 'Batman', 'age' => '34', 'alive' => 'true'],
            ['name' => 'Superman', 'age' => '28', 'alive' => 'true'],
            ['alive' => 'false', 'name'=> 'Caeser', 'age' => '99']
        ];
        
        Csv::write($sampleData, $this->path);
        $res = Csv::read($this->path);
        $this->assertEquals($sampleData, $res);
    }


    public function testWithOptions()
    {
        $sampleData = [
            ['name' => 'Batman', 'age' => '34', 'alive' => 'true'],
            ['name' => 'Superman', 'age' => '28', 'alive' => 'true'],
            ['alive' => 'false', 'name'=> 'Caeser', 'age' => '99']
        ];

        $options = ["delimiter" => "\t"];

        Csv::write($sampleData, $this->path, $options);
        $res = Csv::read($this->path, $options);
        $this->assertEquals($sampleData, $res);
    }


}
