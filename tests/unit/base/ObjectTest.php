<?php


namespace datork\base;


class ObjectTest extends \PHPUnit_Framework_TestCase
{

    public $prop1 = false;
    public $prop2 = null;
    protected $prop3 = 33;

    public function prop3Val()
    {
        return $this->prop3;
    }

    public function testSetProperties()
    {
        $props = ['prop1' => true, 'prop2' => 'something', 'prop3' => 42, 'notExisting' => 78];
        $obj = Object::setProperties($this, $props);
        $this->assertTrue($obj->prop1);
        $this->assertEquals('something', $obj->prop2);
        $this->assertEquals(33, $obj->prop3Val());
    }
    
    public function testBuild()
    {
        $props = ['prop1' => true, 'prop2' => 'something', 'prop3' => 42, 'notExisting' => 78];
        $obj = Object::build(self::class, $props);
        $this->assertTrue($obj->prop1);
        $this->assertEquals('something', $obj->prop2);
        $this->assertEquals(33, $obj->prop3Val());
    }
}
