<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 3:36 PM
 */

namespace App\Service;


use App\Data\TaskDTO;

interface TaskServiceInterface
{
    /**
     * @return \Generator|TaskDTO[]
     */
    public function allTasks() : \Generator;
    public function findOne(int $id) : ?TaskDTO;
    public function addTask(TaskDTO $taskDTO) :bool;
    public function editTask(TaskDTO $taskDTO,int $id) :bool;
    public function delete(int $id) : bool;
}