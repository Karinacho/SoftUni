<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends UserHttpHandlerAbstract
{

    public function allUsers(UserServiceInterface $userService)
    {
        $this->render("users/all", $userService->all());
    }

    public function profile(UserServiceInterface $userService,
                            array $formData = [])
    {
        $currentUser = $userService->currentUser();

        if (null == $currentUser) {
            $this->redirect("login.php");
        }

        if (isset($formData['edit'])) {
            $this->handlerEditProcess($userService, $formData);
        }else{
            $this->render("users/profile", $currentUser);
        }
    }


    public function login(UserServiceInterface $userService,
                          array $formData = [])
    {
        if (isset($formData['login'])) {
            $this->handlerLoginProcess($userService, $formData);
        } else {
            $this->render("users/login");
        }
    }

    public function registerUser(UserServiceInterface $userService,
                                 array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handlerRegisterProcess($userService, $formData);
        } else {
            $this->render("users/register");
        }
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    private function handlerRegisterProcess(UserServiceInterface $userService, array $formData): void
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);

        if($userService->register($user, $formData['confirm_password'])) {
            $_SESSION['username'] = $formData['username'];
            $this->redirect("success.php");
        }else{
            $this->render("app/error",
                new ErrorDTO("Username is already taken or password mismatch."));
        }
    }

    private function handlerLoginProcess(UserServiceInterface $userService, array $formData): void
    {


        try {
            $currentUser = $userService->login($formData['username'], $formData['password']);
            $_SESSION['id'] = $currentUser->getId();
            $this->redirect("dashboard.php");
        }catch (\Exception $ex){
            $this->render("users/login",null,[$ex->getMessage()]);
        }
    }

    private function handlerEditProcess(UserServiceInterface $userService, array $formData): void
    {
        $user = $this->dataBinder->bind($formData, UserDTO::class);

        if($userService->update($user)) {

            $this->redirect("profile.php");
        }else{
            $this->render("app/error",
                new ErrorDTO("Error editing the profile"));
        }
    }

}