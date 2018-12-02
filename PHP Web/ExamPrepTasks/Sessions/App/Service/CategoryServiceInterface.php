<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 7:02 PM
 */

namespace App\Service;


use App\Data\CategoryDTO;

interface CategoryServiceInterface
{
    /**
     * @return \Generator|CategoryDTO[]
     */
    public function getAll() : \Generator;

    public function getOne(int $id) : CategoryDTO;
}