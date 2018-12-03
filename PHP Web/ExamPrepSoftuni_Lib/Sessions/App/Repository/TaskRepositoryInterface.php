<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 4:34 PM
 */

namespace App\Repository;


use App\Data\BookDTO;

interface TaskRepositoryInterface
{
    /**
     * @return \Generator|BookDTO[]
     */
    public function findAll() : \Generator;

    public function findOne(int $id) : BookDTO;
    /**
     * @return \Generator|BookDTO[]
     */
    public function findAllByUsername(int $id) : \Generator;
    public function insert(BookDTO $taskDTO) : bool;
    public function update(BookDTO $taskDTO, int $id) : bool;
    public function remove(int $id) : bool;

}