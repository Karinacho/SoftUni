<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 4:27 PM
 */

namespace App\Service;


use App\Data\BookDTO;
use App\Repository\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return \Generator|BookDTO[]
     */
    public function allTasks(): \Generator
    {
        return $this->taskRepository->findAll();
    }
    /**
     * @param int $id
     * @return BookDTO
     * @throws \Exception
     */
    public function findOne(int $id): BookDTO
    {
        $task = $this->taskRepository->findOne($id);

        if($task === null){
            throw new \Exception("Task not exist!");
        }

        return $task;
    }

    public function addTask(BookDTO $taskDTO): bool
    {
         return $this->taskRepository->insert($taskDTO);
    }
    /**
     * @param BookDTO $taskDTO
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function editTask(BookDTO $taskDTO, int $id): bool
    {
        $task = $this->taskRepository->findOne($id);

        if($task === null){
            throw new \Exception("Task not exist!");
        }

        return $this->taskRepository->update($taskDTO, $id);
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete(int $id): bool
    {
        $task = $this->taskRepository->findOne($id);

        if($task === null){
            throw new \Exception("Task not exist!");
        }

        return $this->taskRepository->remove($id);
    }

    /**
     * @return \Generator|BookDTO[]
     */
    public function findAllByUsername(int $id): \Generator
    {
        return $this->taskRepository->findAllByUsername($id);
    }
}