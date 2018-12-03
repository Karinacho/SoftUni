<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10/29/2018
 * Time: 14:55
 */

namespace App\Data;


class ErrorDTO
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }




}