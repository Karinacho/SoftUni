<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 7:01 PM
 */

namespace App\Repository;


use App\Data\CategoryDTO;
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
     * @return \Generator|CategoryDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("
          SELECT id , name
          from categories

        ")->execute()
            ->fetch(CategoryDTO::class);

    }

    public function findOne(int $id): CategoryDTO
    {
        return $this->db->query("
            SELECT id, name
            FROM categories
            WHERE id = ?
        ")->execute([$id])
        ->fetch(CategoryDTO::class)
        ->current();
    }
}