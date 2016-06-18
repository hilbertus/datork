<?php


namespace datork\arr;


class GetTest extends \PHPUnit_Framework_TestCase
{
    public function testGetByKeys()
    {
        $arr = ['c' => 'Z', 'a' => 'X', 'b' => 'Y'];
        $keys = ['a', 'b', 'c'];
        $res = Get::byKeys($arr, $keys);
        $expexted = ['a' => 'X', 'b' => 'Y', 'c' => 'Z'];
        $this->assertEquals(json_encode($expexted), json_encode($res));
    }

    public function testGetByMultiKeys()
    {
        $arr = [
            [1, 8, 2],
            [5, 7, 0],
            [1, 6, 3]
        ];

        $expected = [
            0 => [1, 8],
            2 => [1, 6]
        ];

//        $res = Get::byMultiKeys($arr, [[0,2], [0,1]]);
//        $this->assertEquals(json_encode($expected), json_encode($res));

        $res = Get::byMultiKeys($arr, [[], [2]]);
        $expected = [
            0 => [2 => 2],
            1 => [2 => 0],
            2 => [2 => 3]
        ];
        $this->assertEquals(json_encode($expected), json_encode($res));

    }
}
