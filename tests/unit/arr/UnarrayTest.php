<?php

namespace datork\arr;

class UnarrayTest extends \PHPUnit_Framework_TestCase {

    public function testRecursive()
    {
        $arr = [
            0 => [
                "a" => "NotAnArray"
            ]
        ];
        $this->assertEquals("NotAnArray", Unarray::recursive($arr));
        
        $arr2 = [
            0 => [
                "a" => "NotAnArray"
            ],
            1 => 42,
            "datetime" => new \DateTime()
        ];
        $res2 = Unarray::recursive($arr2);
        $this->assertEquals("NotAnArray", $res2[0]);
        $this->assertEquals(42, $res2[1]);
        $this->assertEquals($arr2['datetime'], $res2['datetime']);
    }

}
