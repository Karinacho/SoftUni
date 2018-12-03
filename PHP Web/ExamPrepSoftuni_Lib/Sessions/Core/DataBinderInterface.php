<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10/29/2018
 * Time: 15:38
 */

namespace Core;


interface DataBinderInterface
{
    public function bind(array $from, $className);

}