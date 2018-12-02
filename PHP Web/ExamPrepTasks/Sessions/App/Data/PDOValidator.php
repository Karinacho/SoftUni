<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 12/1/2018
 * Time: 12:22 PM
 */

namespace App\Data;


class PDOValidator
{
    /**
     * @param int $min
     * @param int $max
     * @param string $field
     * @param string $errorMsg
     * @throws \Exception
     */
    public static function validate(int $min, int $max, string $field, string $errorMsg){
        if(mb_strlen($field) < $min && mb_strlen($field) > $max){
            throw new \Exception($errorMsg);
        }
    }
}