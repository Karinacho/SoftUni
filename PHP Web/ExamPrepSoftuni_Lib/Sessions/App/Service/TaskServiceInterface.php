<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 3:36 PM
 */

namespace App\Service;


use App\Data\BookDTO;

interface TaskServiceInterface
{
    /**
     * @return \Generator|BookDTO[]
     */
    public function allTasks() : \Generator;
    /**
     * @return \Generator|BookDTO[]
     */
    public function findAllByUsername(int $id): \Generator;
    public function findOne(int $id) : ?BookDTO;
    public function addTask(BookDTO $taskDTO) :bool;
    public function editTask(BookDTO $taskDTO, int $id) :bool;
    public function delete(int $id) : bool;
}