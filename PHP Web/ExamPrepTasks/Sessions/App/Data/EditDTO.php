<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 6:37 PM
 */

namespace App\Data;


class EditDTO
{
    /**
     * @var TaskDTO
     */
private $task;
    /**
     * @var CategoryDTO[]
     */
private $categories;

    /**
     * @return TaskDTO
     */
    public function getTask(): TaskDTO
    {
        return $this->task;
    }

    /**
     * @param TaskDTO $task
     */
    public function setTask(TaskDTO $task): void
    {
        $this->task = $task;
    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param CategoryDTO[] $categories
     */
    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }

}