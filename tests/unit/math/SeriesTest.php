<?php

namespace datork\math;

use datork\math\Series;

class SeriesTest extends \PHPUnit_Framework_TestCase {
    
    public function testByIntervalLength()
    {
        $seriesOne = Series::byIntervalLength(0, 5, 1);
        $expectedOne = [0, 1, 2, 3, 4, 5];
        $this->assertEquals(json_encode($expectedOne), json_encode($seriesOne));
        
        $seriesTwo = Series::byIntervalLength(0, 1, 0.3);
        $expectedTwo = [0, 0.3, 0.6, 0.9];
        $this->assertEquals(json_encode($expectedTwo), json_encode($seriesTwo));
    }

    public function testByIntervalCount()
    {
        $seriesOne = Series::byIntervalCount(0, 5, 2);
        $expectedOne = [0,2.5,5];
        $this->assertEquals(json_encode($expectedOne), json_encode($seriesOne));
        
        $seriesTwo = Series::byIntervalCount(-2, 3, 5);
        $expectedTwo = [-2, -1, 0, 1, 2, 3];
        $this->assertEquals(json_encode($expectedTwo), json_encode($seriesTwo));
    }
    
}
