<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 7:01 PM
 */

namespace App\Repository;


use App\Data\GenreDTO;
use Database\DatabaseInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }
    /**
     * @return \Generator|GenreDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("
          SELECT id , name
          from genres

        ")->execute()
            ->fetch(GenreDTO::class);

    }

    public function findOne(int $id): GenreDTO
    {
        return $this->db->query("
            SELECT id, name
            FROM genres
            WHERE id = ?
        ")->execute([$id])
        ->fetch(GenreDTO::class)
        ->current();
    }
}