<?php
session_start();
spl_autoload_register();

$template = new \Core\Template();
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);
$dataBinder = new \Core\DataBinder();
$userRepository = new \App\Repository\UserRepository($db);
$taskRepository = new \App\Repository\TaskRepository($db,$dataBinder);
$categoryRepository = new \App\Repository\CategoryRepository($db);
$categoryService = new \App\Service\CategoryService($categoryRepository);
$userService = new \App\Service\UserService($userRepository);
$taskService = new \App\Service\TaskService($taskRepository);
$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder);
$homeHttpHandler = new \App\Http\HttpHomeHandler($template,$dataBinder);
$bookHttpHandler = new \App\Http\BookHttpHandler($template,$dataBinder);
