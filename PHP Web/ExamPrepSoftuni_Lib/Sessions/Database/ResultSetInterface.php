<?php

namespace Database;

interface ResultSetInterface
{
    public function fetch($className = null) : \Generator;
}