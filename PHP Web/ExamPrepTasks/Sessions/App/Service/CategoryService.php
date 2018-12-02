<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 7:03 PM
 */

namespace App\Service;


use App\Data\CategoryDTO;
use App\Repository\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * @return \Generator|CategoryDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->categoryRepository->findAll();
    }

    public function getOne(int $id): CategoryDTO
    {
        return $this->categoryRepository->findOne($id);
    }
}