<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 4:34 PM
 */

namespace App\Repository;


use App\Data\TaskDTO;

interface TaskRepositoryInterface
{
    /**
     * @return \Generator|TaskDTO[]
     */
    public function findAll() : \Generator;

    public function findOne(int $id) : TaskDTO;

    public function insert(TaskDTO $taskDTO) : bool;
    public function update(TaskDTO $taskDTO, int $id) : bool;
    public function remove(int $id) : bool;

}