<?php

namespace datork\math;

use datork\math\Hist;

class HistTest extends \PHPUnit_Framework_TestCase {
    
    public function testByIntervals()
    {
        $values = [];
        $intervals = [0, 1, 2, 3];
        $expected = [0, 0, 0];
        $result = Hist::byIntervals($values, $intervals);
        $this->assertEquals(json_encode($expected), json_encode($result));

        $values = [1.9999];
        $intervals = [0, 1, 2, 3];
        $expected = [0, 1, 0];
        $result = Hist::byIntervals($values, $intervals);
        $this->assertEquals(json_encode($expected), json_encode($result));

        $values = [-1, 0, 0.1, 0.3, 0.7, 2, 2.5, 3, 3, 3, 3, 3, 3.001];
        $intervals = [0, 1, 2, 3];
        $expected = [4, 0, 7];
        $result = Hist::byIntervals($values, $intervals);
        $this->assertEquals(json_encode($expected), json_encode($result));
    }
}
