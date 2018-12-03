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
     * @var BookDTO
     */
private $book;
    /**
     * @var GenreDTO[]
     */
private $genre;

    /**
     * @return BookDTO
     */
    public function getBook(): BookDTO
    {
        return $this->book;
    }

    /**
     * @param BookDTO $book
     */
    public function setBook(BookDTO $book): void
    {
        $this->book = $book;
    }

    /**
     * @return GenreDTO[]
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param GenreDTO[] $genre
     */
    public function setGenre($genre): void
    {
        $this->genre = $genre;
    }



}