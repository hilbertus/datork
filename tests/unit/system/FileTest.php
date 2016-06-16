<?php


namespace datork\system;


class FileTest extends \PHPUnit_Framework_TestCase
{
    private $dir;

    protected function setUp()
    {
        $this->dir = dirname(dirname(__DIR__)).'/runtime';

    }

    public function testDelete(){
        $path = $this->dir.'/empty.txt';
        File::delete([$path]);
        $this->assertFileNotExists($path);
        file_put_contents($path, 'dummy content');
        $this->assertFileExists($path);
        File::delete([$path]);
        $this->assertFileNotExists($path);
    }
}
