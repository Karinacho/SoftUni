<?php

namespace App\Repository;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO) : bool;

    public function findOneByUsername(string $username) : ?UserDTO;

    public function findOne(int $id): ?UserDTO;

    public function update(int $id, UserDTO $userDTO) : bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll() : \Generator;

}