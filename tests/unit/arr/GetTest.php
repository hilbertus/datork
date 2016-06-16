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
}
