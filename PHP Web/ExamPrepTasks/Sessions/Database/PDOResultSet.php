<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10/26/2018
 * Time: 10:48
 */

namespace Database;


class PDOResultSet implements ResultSetInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }

    public function fetch($className = null) : \Generator
    {
        if($className === null){
            while ($row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC)){
                yield $row;
            }
        }else {
            while ($row = $this->pdoStatement->fetchObject($className)) {
                yield $row;
            }
        }
    }
}