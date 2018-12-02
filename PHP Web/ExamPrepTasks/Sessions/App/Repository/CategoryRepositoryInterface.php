<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 7:01 PM
 */

namespace App\Repository;


use App\Data\CategoryDTO;

interface CategoryRepositoryInterface
{
    /**
     * @return \Generator|CategoryDTO[]
     */
    public function findAll() : \Generator;

    public function findOne(int $id) : CategoryDTO;

}