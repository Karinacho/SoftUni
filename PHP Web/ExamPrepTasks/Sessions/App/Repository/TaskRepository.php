<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 4:41 PM
 */

namespace App\Repository;


use App\Data\CategoryDTO;
use App\Data\TaskDTO;
use App\Data\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    public function __construct(DatabaseInterface $db, DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }

    /**
     * @return \Generator|TaskDTO[]
     */
    public function findAll(): \Generator
    {
        $lazyTaskResult = $this->db->query("
             SELECT 
              tasks.id AS task_id, 
              title, 
              description, 
              location,
              users.id AS author_id,
              users.username,
              users.password,
              users.first_name,
              users.last_name,
              categories.id AS category_id,
              categories.name,
              started_on, 
              due_date
            FROM tasks
            INNER JOIN users users ON tasks.author_id = users.id
            INNER JOIN categories categories ON tasks.category_id = categories.id
            ORDER BY tasks.due_date DESC, tasks.id ASC


        ")->execute()
            ->fetch();
        foreach ($lazyTaskResult as $row){
            /**
             * @var TaskDTO $task
             */
            $task = $this->dataBinder->bind($row,TaskDTO::class);
            /**
             * @var CategoryDTO $category
             */
            $category = $this->dataBinder->bind($row,CategoryDTO::class);
            /** @var UserDTO $author */
            $author = $this->dataBinder->bind($row, UserDTO::class);

            $task->setId($row['task_id']);
            $author->setId($row['author_id']);
            $category->setId($row['category_id']);

            $task->setAuthor($author);
            $task->setCategory($category);

            yield $task;
        }
    }

    public function findOne(int $id): TaskDTO
    {
        $row = $this->db->query("
           SELECT 
              tasks.id AS task_id, 
              title, 
              description, 
              location,
              users.id AS author_id,
              users.username,
              users.password,
              users.first_name,
              users.last_name,
              categories.id AS category_id,
              categories.name,
              started_on, 
              due_date
            FROM tasks
            INNER JOIN users users ON tasks.author_id = users.id
            INNER JOIN categories categories ON tasks.category_id = categories.id
            WHERE tasks.id=?
            ORDER BY tasks.due_date DESC, tasks.id ASC

        ")->execute([$id])
            ->fetch()
            ->current();

        /** @var TaskDTO $task */
        $task = $this->dataBinder->bind($row, TaskDTO::class);
        /** @var UserDTO $author */
        $author = $this->dataBinder->bind($row, UserDTO::class);
        /** @var CategoryDTO $category */
        $category = $this->dataBinder->bind($row, CategoryDTO::class);

        $task->setId($row['task_id']);
        $author->setId($row['author_id']);
        $category->setId($row['category_id']);

        $task->setAuthor($author);
        $task->setCategory($category);

        return $task;
    }

    public function insert(TaskDTO $taskDTO): bool
    {
        $this->db->query("
            INSERT INTO tasks(title,description, location, author_id,category_id,started_on,due_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ")->execute([
            $taskDTO->getTitle(),
            $taskDTO->getDescription(),
            $taskDTO->getLocation(),
            $taskDTO->getAuthor()->getId(),
            $taskDTO->getCategory()->getId(),
            $taskDTO->getStartedOn(),
            $taskDTO->getDueDate()

        ]);

        return true;
    }

    public function update(TaskDTO $taskDTO, int $id): bool
    {
        $this->db->query("
                UPDATE tasks
                SET 
                  title = ?,
                  description = ?,
                  location = ?,
                  author_id = ?,
                  category_id = ?,
                  started_on = ?,
                  due_date = ?
                WHERE id = ?  
            ")->execute([
            $taskDTO->getTitle(),
            $taskDTO->getDescription(),
            $taskDTO->getLocation(),
            $taskDTO->getAuthor()->getId(),
            $taskDTO->getCategory()->getId(),
            $taskDTO->getStartedOn(),
            $taskDTO->getDueDate(),
            $id
        ]);

        return true;
    }
    public function remove(int $id): bool
    {
        $this->db->query("DELETE FROM tasks WHERE id = ?")->execute([$id]);
        return true;
    }
}