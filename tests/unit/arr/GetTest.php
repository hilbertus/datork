<?php


namespace datork\arr;


class GetTest extends \PHPUnit_Framework_TestCase
{
    public function testGetByKeys()
    {
        $this->getBySimpleKeys();
        $this->getByKeyList();
        $this->getByMultidimensionalKey();
    }
    
    private function getBySimpleKeys()
    {
        $arr = ['hello', 'world', 5 => '!'];
        $this->assertEquals([5 => '!'], Get::byKey($arr, 5));
    }


    private function getByKeyList()
    {
        $arr = ['c' => 'Z', 'a' => 'X', 'b' => 'Y'];
        $keys = ['a', 'b', 'c'];
        $res = Get::byKey($arr, $keys);
        $expexted = ['a' => 'X', 'b' => 'Y', 'c' => 'Z'];
        $this->assertEquals(json_encode($expexted), json_encode($res));
    }

    private function getByMultidimensionalKey()
    {
        $arr = [
            [1, 8, 2],
            [5, 7, 0],
            [1, 6, 3]
        ];

        $res = Get::byKey($arr, [[], [2]]);
        $expected = [
            0 => [2 => 2],
            1 => [2 => 0],
            2 => [2 => 3]
        ];
        $this->assertEquals(json_encode($expected), json_encode($res));
    }
}
