<?php
require_once "common.php";

$taskHttpHandler->edit($taskService, $userService, $categoryService, $_POST, $_GET);