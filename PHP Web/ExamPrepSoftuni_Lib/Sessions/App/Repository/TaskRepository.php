<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 4:41 PM
 */

namespace App\Repository;


use App\Data\GenreDTO;
use App\Data\BookDTO;
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
     * @return \Generator|BookDTO[]
     */
    public function findAll(): \Generator
    {
        $lazyTaskResult = $this->db->query("
                      SELECT 
              b.id AS book_id, 
              b.title, 
              b.author, 
              b.description,
              b.image,
              b.genre_id,
              b.user_id,
              u.id AS user_id,
              u.username,
             u.password,
              u.full_name,
              u.born_on,
              genre.id AS genre_id,
              genre.name,
              b.added_on
              
            FROM books b
            INNER JOIN users u ON b.user_id = u.id
            INNER JOIN genres genre ON b.genre_id = genre.id


        ")->execute()
            ->fetch();
        foreach ($lazyTaskResult as $row){
            /**
             * @var BookDTO $task
             */
            $task = $this->dataBinder->bind($row,BookDTO::class);
            /**
             * @var GenreDTO $category
             */
            $category = $this->dataBinder->bind($row,GenreDTO::class);
            /** @var UserDTO $author */
            $author = $this->dataBinder->bind($row, UserDTO::class);

            $task->setId($row['book_id']);
            $author->setId($row['user_id']);
            $category->setId($row['genre_id']);

            $task->setUser($author);
            $task->setGenre($category);

            yield $task;
        }
    }

    public function findOne(int $id): BookDTO
    {
        $row = $this->db->query("
            SELECT 
              b.id AS book_id, 
              b.title, 
              b.author, 
              b.description,
              b.image,
              b.genre_id,
              b.user_id,
              u.id AS user_id,
              u.username,
             u.password,
              u.full_name,
              u.born_on,
              genre.id AS genre_id,
              genre.name,
              b.added_on
              
            FROM books b
            INNER JOIN users u ON b.user_id = u.id
            INNER JOIN genres genre ON b.genre_id = genre.id
            WHERE b.id =?
        ")->execute([$id])
            ->fetch()
            ->current();

        /** @var BookDTO $task */
        $task = $this->dataBinder->bind($row, BookDTO::class);
        /** @var UserDTO $author */
        $author = $this->dataBinder->bind($row, UserDTO::class);
        /** @var GenreDTO $category */
        $category = $this->dataBinder->bind($row, GenreDTO::class);

        $task->setId($row['book_id']);
        $author->setId($row['user_id']);
        $category->setId($row['genre_id']);

        $task->setUser($author);
        $task->setGenre($category);

        return $task;
    }

    public function insert(BookDTO $taskDTO): bool
    {
        $this->db->query("
            INSERT INTO books(title,author,description, image,genre_id,user_id,added_on)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ")->execute([
            $taskDTO->getTitle(),
            $taskDTO->getAuthor(),
            $taskDTO->getDescription(),
            $taskDTO->getImage(),
            $taskDTO->getGenre()->getId(),
            $taskDTO->getUser()->getId(),
            $taskDTO->getAddedOn()

        ]);

        return true;
    }

    public function update(BookDTO $taskDTO, int $id): bool
    {
        $this->db->query("
                UPDATE books
                SET 
                  title = ?,
                  author = ?,
                  description = ?,
                  image = ?,
                  genre_id = ?,
                  user_id = ?,
                  added_on = ?
                WHERE id = ?  
            ")->execute([
            $taskDTO->getTitle(),
            $taskDTO->getAuthor(),
            $taskDTO->getDescription(),
            $taskDTO->getImage(),
            $taskDTO->getGenre()->getId(),
            $taskDTO->getUser()->getId(),
            $taskDTO->getAddedOn(),
            $id
        ]);

        return true;
    }
    public function remove(int $id): bool
    {
        $this->db->query("DELETE FROM books WHERE id = ?")->execute([$id]);
        return true;
    }
    /**
     * @return \Generator|BookDTO[]
     */
    public function findAllByUsername(int $id): \Generator
    {
        $lazyTaskResult = $this->db->query("
                      SELECT 
              b.id AS book_id, 
              b.title, 
              b.author, 
              b.description,
              b.image,
              b.genre_id,
              b.user_id,
              u.id AS user_id,
              u.username,
             u.password,
              u.full_name,
              u.born_on,
              genre.id AS genre_id,
              genre.name,
              b.added_on
              
            FROM books b
            INNER JOIN users u ON b.user_id = u.id
            INNER JOIN genres genre ON b.genre_id = genre.id
            WHERE u.id =?

        ")->execute([$id])
        ->fetch();
        foreach ($lazyTaskResult as $row){
            /**
             * @var BookDTO $task
             */
            $task = $this->dataBinder->bind($row,BookDTO::class);
            /**
             * @var GenreDTO $category
             */
            $category = $this->dataBinder->bind($row,GenreDTO::class);
            /** @var UserDTO $author */
            $author = $this->dataBinder->bind($row, UserDTO::class);

            $task->setId($row['book_id']);
            $author->setId($row['user_id']);
            $category->setId($row['genre_id']);

            $task->setUser($author);
            $task->setGenre($category);

            yield $task;
        }

    }
}