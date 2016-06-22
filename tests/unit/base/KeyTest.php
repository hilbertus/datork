<?php


namespace datork\base;


class KeyTest extends \PHPUnit_Framework_TestCase
{


    public function testAreArrayKeysSequential()
    {
        $sequential = range(0,9998,1);
        $sequential[] = -1;
        $this->assertTrue(Key::areArrayKeysSequential($sequential));

        $associative = array_flip($sequential);
        $this->assertFalse(Key::areArrayKeysSequential($associative));
    }

    public function testIsKeyMultidimensional()
    {
        $yes = [[574, 687,4589], [], ['a', 'b', 'c']];
        $this->assertTrue(Key::isKeyMultidimensional($yes));

        $no = [[574, 687,4589], [], ['a', 'b', 'c'], 'no'];
        $this->assertFalse(Key::isKeyMultidimensional($no));
    }

    public function testNormalize()
    {
        $singleKey = 'myKey';
        $this->assertEquals([['myKey']], Key::normalize($singleKey));

        $keylist = ['firstKey', 'secondKey', 'lastKey'];
        $this->assertEquals([['firstKey', 'secondKey', 'lastKey']], Key::normalize($keylist));

        $multiDimKey = [$keylist, [$singleKey]];
        $this->assertEquals($multiDimKey, Key::normalize($multiDimKey));
    }


}
