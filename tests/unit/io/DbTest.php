<?php


namespace datork\io;


use datork\system\File;

class DbTest extends \PHPUnit_Framework_TestCase
{
    private $pdo;
    private $dbPath;

    protected function setUp()
    {
        $this->dbPath = dirname(dirname(__DIR__)).'/runtime/testDataBase.db';
        $this->pdo = new \PDO('sqlite:'.$this->dbPath);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `score` (
            `id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
            `name`	TEXT NOT NULL,
            `score`	INTEGER NOT NULL,
            `description`	TEXT
        );";
//        $this->pdo->exec($sql)->
    }

    protected function tearDown()
    {
        unset($this->pdo);
        File::delete([$this->dbPath]);
    }


    public function testExecute()
    {
//        $dbh = new PDO('sqlite:/tmp/foo.db');
    }
}
