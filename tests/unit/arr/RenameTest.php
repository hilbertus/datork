<?php


namespace datork\arr;


class RenameTest extends \PHPUnit_Framework_TestCase
{
    public function testMultiKeys()
    {
        $arr = [
            ['name' => 'Person1', 'yearsOld' => 23],
            ['name' => 'Person2', 'yearsOld' => 32],
            ['name' => 'Person3', 'yearsOld' => 40]
        ];
        $res = Rename::multiKeys($arr, [[], ['yearsOld' => 'age']]);
        $expected = [
            ['name' => 'Person1', 'age' => 23],
            ['name' => 'Person2', 'age' => 32],
            ['name' => 'Person3', 'age' => 40]
        ];
        $this->assertEquals(json_encode($expected), json_encode($res));
    }

    public function testKeys()
    {
        $arr = ['a' => 'X', 'b' => 'Y', 'c' => 'Z'];
        $res = Rename::Keys($arr, ['a' => 'x', 'b' => 'y']);
        $expected = ['x' => 'X', 'y' => 'Y', 'c' => 'Z'];
        $this->assertEquals(json_encode($expected), json_encode($res));
    }
}
