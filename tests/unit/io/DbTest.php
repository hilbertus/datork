<?php


namespace datork\io;


use datork\system\File;

class DbTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PDO
     */
    private $pdo;
    /**
     * @var string
     */
    private $dbPath;

    protected function setUp()
    {
        $this->dbPath = dirname(dirname(__DIR__)) . '/runtime/testDataBase.db';
        File::delete([$this->dbPath]);
        $this->pdo = new \PDO('sqlite:' . $this->dbPath);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    protected function tearDown()
    {
        unset($this->pdo);
        File::delete([$this->dbPath]);
    }

    public function testAllFunctions()
    {
        $this->createTable();
        $this->writeWithExec();
        $this->query();
        $this->autoWrite();
    }

    private function createTable()
    {
        $sql = "CREATE TABLE `score` (
            `id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
            `name`	TEXT NOT NULL,
            `score`	INTEGER NOT NULL,
            `description`	TEXT
        );";
        $this->assertTrue(Db::execute($this->pdo, $sql));


        $result = $this->pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='score';")
            ->fetchAll(\PDO::FETCH_ASSOC);
        $this->assertEquals(1, count($result));
    }

    private function writeWithExec()
    {
        $sql = "INSERT INTO `score` (`name`, `score`, `description`) 
                VALUES (:name, :score, :description);";
        $params = [':name' => 'X-MEN', ':score' => 8, ':description' => 'Darwin.'];
        $this->assertTrue(Db::execute($this->pdo, $sql, $params));

        $result = $this->pdo->query("SELECT COUNT(*) as count FROM `score` WHERE 1 = 1;")
            ->fetchAll(\PDO::FETCH_ASSOC);
        $this->assertEquals(1, $result[0]['count']);
    }

    private function query()
    {
        $sql = "SELECT * FROM score WHERE name = :name;";
        $res = Db::query($this->pdo, $sql, [':name' => 'X-MEN'], 'id');
        $expected = [1 => ['id' => 1, 'name' => 'X-MEN', 'score' => 8, 'description' => 'Darwin.']];
        $this->assertEquals($expected, $res);
    }

    private function autoWrite()
    {
//        $data = [
//            ['id' => 2, 'name' => 'Deadpool', 'score' => 7, 'description' => 'Funny'],
//            ['id' => 3, 'name' => 'Hulk', 'score' => 8, 'description' => 'Very green'],
//            ['id' => 4, 'name' => 'Iron Man', 'score' => 9, 'description' => 'Technical genius']
//        ];
    }

    private function getTestData()
    {
        return [
            ['id' => 1, 'name' => 'X-MEN', 'score' => 8, 'description' => 'Darwin.'],

        ];
    }
}
