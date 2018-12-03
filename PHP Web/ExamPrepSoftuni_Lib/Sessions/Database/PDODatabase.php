<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10/26/2018
 * Time: 10:44
 */

namespace Database;


class PDODatabase implements DatabaseInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(string $query): StatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOPreparedStatement($stmt);

    }

    public function getErrorInfo(): array
    {
        // TODO: Implement getErrorInfo() method.
    }
}