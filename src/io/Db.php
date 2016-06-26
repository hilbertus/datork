<?php


namespace datork\io;


class Db
{

    /**
     * @param \PDO $pdo
     * @param string $sql optional with integrated params e. g. UPDATE  user SET color = green WHERE name = :name;
     * @param array $params optional params e. g. [':name' => 'Hulk']
     * @return bool
     */
    public static function execute($pdo, $sql, $params = [])
    {
        $statement = $pdo->prepare($sql);
        return $statement->execute($params);
    }

    /**
     * @param \PDO $pdo
     * @param string $sql optional with integrated params e. g. SELECT * FROM user WHERE name = :name;
     * @param array $params optional params e. g. [':name' => 'Hulk']
     * @param null|string $indexResultWithColumn
     * @return array
     */
    public static function query($pdo, $sql, $params = [], $indexResultWithColumn = null)
    {
        $statement = $pdo->prepare($sql);
        $statement->execute($params);
        $res = [];
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            if($indexResultWithColumn !== null){
                $res[$row[$indexResultWithColumn]] = $row;
            } else {
                $res[] = $row;
            }
        }
        return $res;
    }

//    /**
//     * @param \PDO $pdo
//     * @param string $tableName
//     * @param array $conditions e. g. ['name' => 'Hulk', 'gender' => ['m', 'f']] will be generate folowing SQL: <br>
//     *      SELECT * FROM $tableName WHERE name = 'Hulk' AND gender IN ('m', 'f');
//     *
//     */
//    public static function autoQuery($pdo, $tableName, $conditions = [])
//    {
//
//    }
//
//    /**
//     * @param \PDO $pdo
//     * @param string $tableName
//     * @param string $referencedColumnName
//     * @param array $data
//     */
//    public static function autoUpdate($pdo, $tableName, $referencedColumnName, $data)
//    {
//
//    }
//
//    /**
//     * @param \PDO $pdo
//     * @param string $tableName
//     * @param array $data
//     */
//    public static function autoInsert($pdo, $tableName, $data)
//    {
//
//    }
}