<?php
/**
 * Created by PhpStorm.
 * User: ko3ebo7e
 * Date: 11/30/2018
 * Time: 6:13 PM
 */

namespace App\Http;


use App\Data\EditDTO;
use App\Data\BookDTO;
use App\Service\CategoryService;
use App\Service\CategoryServiceInterface;
use App\Service\TaskService;
use App\Service\TaskServiceInterface;

use App\Service\UserService;
use App\Service\UserServiceInterface;

class BookHttpHandler extends UserHttpHandlerAbstract
{


    public function viewBook(TaskServiceInterface $taskService,
                             UserServiceInterface $userService,
                             CategoryServiceInterface $categoryService,array $getData = []){
        /** @var BookDTO $currentBook */
        $currentBook = $taskService->findOne(intval($getData['id']));
        if($userService->isLogged()){
            $this->render("books/details",$currentBook);
        }else{
            $this->render("home/index");
        }
    }
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
        $task = $this->dataBinder->bind($formData, BookDTO::class);
        $editDTO = new EditDTO();
        $editDTO->setBook($task);
        $editDTO->setGenre($categoryService->getAll());

        if (isset($formData['add'])) {
            $this->handlerAddProcess($taskService,$userService,$categoryService, $formData);
        } else {
            $this->render("books/add",$editDTO);
        }
    }
    public function edit(TaskServiceInterface $taskService,
                         UserServiceInterface $userService,
                         CategoryServiceInterface $categoryService,
                         array $formData = [], array $getData = [])
    {

        $task = $taskService->findOne(intval($getData['id']));

        $editDTO = new EditDTO();
        $editDTO->setBook($task);
        $editDTO->setGenre($categoryService->getAll());

        if(isset($formData['edit'])){
            $this->handleEditProcess($taskService, $userService, $categoryService, $formData, $getData);
        }else{
            $this->render("books/edit", $editDTO);
        }
    }
    public function deleteTask(TaskServiceInterface $taskService, array $getData = []){
        if(!isset($getData['id'])){
            $this->redirect("all_books.php");
        }
        $taskService->delete(intval($getData['id']));
        $this->redirect("all_books.php");
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
        /** @var BookDTO $task */
        $task = $this->dataBinder->bind($formData, BookDTO::class);
        /** @var CategoryService $categoryService */
        $category = $categoryService->getOne(intval($formData['genre_id']));
        /**
         * @var UserService $userService
         */
        $author = $userService->currentUser();
        $task->setUser($author);
        $task->setGenre($category);
        /**
         * @var TaskService $taskService
         */
        $taskService->addTask($task);
        $this->redirect("profile.php");

    }
    private function handleEditProcess($taskService, $userService, $categoryService, $formData, $getData)
    {
        try {
            /** @var BookDTO $task */
            $task = $this->dataBinder->bind($formData, BookDTO::class);
            /** @var UserService $userService */
            $author = $userService->currentUser();
            /** @var CategoryService $categoryService */
            /** @var CategoryService $categoryService */
            $category = $categoryService->getOne(intval($formData['genre_id']));
            $task->setUser($author);
            $task->setGenre($category);
            $task->setId($getData['id']);

            /** @var TaskService $taskService */
            $taskService->editTask($task, intval($getData['id']));
            $this->redirect("all_books.php");
        }catch (\Exception $ex){

        }
    }
}