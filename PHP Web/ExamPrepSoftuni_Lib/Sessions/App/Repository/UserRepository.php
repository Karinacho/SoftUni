<?php

namespace App\Repository;


use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query("
            INSERT INTO users(username, password, full_name, born_on)
            VALUES (?, ?, ?, ?)
        ")->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword(),
            $userDTO->getFullName(),
            $userDTO->getBornOn()

        ]);

        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        return $this->db->query("
            SELECT id, username, password, full_name AS fullName, born_on AS bornOn
            FROM users
            WHERE username = ?
        ")->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOne(int $id): ?UserDTO
    {
        return $this->db->query("
            SELECT id, username, password, full_name AS fullName, born_on AS bornOn
            FROM users
            WHERE id = ?
        ")->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        $this->db->query("
            UPDATE users
            SET 
              username = ?,
              password = ?,
              full_name = ?,
              born_on = ?
             
            WHERE id = ?
        ")->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword(),
            $userDTO->getFullName(),
            $userDTO->getBornOn(),
            $id
        ]);

        return true;
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("
            SELECT id, username, password, full_name AS fullName, born_on AS bornOn
            FROM users
        ")->execute([])
            ->fetch(UserDTO::class);
    }
}