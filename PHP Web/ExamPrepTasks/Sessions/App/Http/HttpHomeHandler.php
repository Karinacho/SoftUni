<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 12:13 AM
 */

namespace App\Http;


use App\Service\TaskServiceInterface;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class HttpHomeHandler extends UserHttpHandlerAbstract
{
    public function index(UserServiceInterface $userService)
    {
        if($userService->isLogged()){
            $this->render("tasks/all");
        }else{
            $this->render("home/index");
        }
    }

    public function dashboard(TaskServiceInterface $taskService,UserService $userService)
    {
        if($userService->isLogged()){
            $alltasks = $taskService->allTasks();
            $this->render("tasks/all",$alltasks);
        }else{
            $this->render("home/index");
        }
    }
}