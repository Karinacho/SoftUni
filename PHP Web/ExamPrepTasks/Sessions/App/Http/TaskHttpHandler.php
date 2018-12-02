<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 6:13 PM
 */

namespace App\Http;


use App\Data\EditDTO;
use App\Data\TaskDTO;
use App\Service\CategoryService;
use App\Service\CategoryServiceInterface;
use App\Service\TaskService;
use App\Service\TaskServiceInterface;

use App\Service\UserService;
use App\Service\UserServiceInterface;

class TaskHttpHandler extends UserHttpHandlerAbstract
{
    /**
     * @param TaskServiceInterface $taskService
     * @param UserServiceInterface $userService
     * @param CategoryServiceInterface $categoryService
     * @param array $formData
     */
    public function addTask(TaskServiceInterface $taskService,
                                 UserServiceInterface $userService,
                                 CategoryServiceInterface $categoryService,
                                 array $formData = [])
    {
        /** @var EditDTO $taskDTO */
        $task = $this->dataBinder->bind($formData, TaskDTO::class);
        $editDTO = new EditDTO();
        $editDTO->setTask($task);
        $editDTO->setCategories($categoryService->getAll());

        if (isset($formData['save'])) {
            $this->handlerAddProcess($taskService,$userService,$categoryService, $formData);
        } else {
            $this->render("tasks/add",$editDTO);
        }
    }
    public function edit(TaskServiceInterface $taskService,
                         UserServiceInterface $userService,
                         CategoryServiceInterface $categoryService,
                         array $formData = [], array $getData = [])
    {

        $task = $taskService->findOne(intval($getData['id']));

        $editDTO = new EditDTO();
        $editDTO->setTask($task);
        $editDTO->setCategories($categoryService->getAll());

        if(isset($formData['save'])){
            $this->handleEditProcess($taskService, $userService, $categoryService, $formData, $getData);
        }else{
            $this->render("tasks/edit", $editDTO);
        }
    }
    public function deleteTask(TaskServiceInterface $taskService, array $getData = []){
        if(!isset($getData['id'])){
            $this->redirect("dashboard.php");
        }
        $taskService->delete(intval($getData['id']));
        $this->redirect("dashboard.php");
    }

    /**
     * @param  $taskService
     * @param  $userService
     * @param  $categoryService
     * @param array $formData
     */
    private function handlerAddProcess(TaskServiceInterface $taskService,
                                       UserServiceInterface $userService,
                                       CategoryServiceInterface $categoryService,
                                       array $formData = []): void
    {
        /** @var TaskDTO $task */
        $task = $this->dataBinder->bind($formData, TaskDTO::class);
        /** @var CategoryService $categoryService */
        $category = $categoryService->getOne(intval($formData['category_id']));
        /**
         * @var UserService $userService
         */
        $author = $userService->currentUser();
        $task->setAuthor($author);
        $task->setCategory($category);
        /**
         * @var TaskService $taskService
         */
        $taskService->addTask($task);
        $this->redirect("dashboard.php");

    }
    private function handleEditProcess($taskService, $userService, $categoryService, $formData, $getData)
    {
        try {
            /** @var TaskDTO $task */
            $task = $this->dataBinder->bind($formData, TaskDTO::class);
            /** @var UserService $userService */
            $author = $userService->currentUser();
            /** @var CategoryService $categoryService */
            /** @var CategoryService $categoryService */
            $category = $categoryService->getOne(intval($formData['category_id']));
            $task->setAuthor($author);
            $task->setCategory($category);
            $task->setId($getData['id']);

            /** @var TaskService $taskService */
            $taskService->editTask($task, intval($getData['id']));
            $this->redirect("dashboard.php");
        }catch (\Exception $ex){

        }
    }
}