<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 7:02 PM
 */

namespace App\Service;


use App\Data\GenreDTO;

interface CategoryServiceInterface
{
    /**
     * @return \Generator|GenreDTO[]
     */
    public function getAll() : \Generator;

    public function getOne(int $id) : GenreDTO;
}