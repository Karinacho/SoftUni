<?php

namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
       if($userDTO->getPassword() !== $confirmPassword){
           return false;
       }

       if(null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
           return false;
       }

       $this->encryptPassword($userDTO);

       return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $user = $this->userRepository->findOneByUsername($username);

        if(null == $user){
           throw new \Exception("Username not exist!");
        }

        $userPasswordHash = $user->getPassword();

        if(false === password_verify($password, $userPasswordHash)){
           throw new \Exception ("Passwords does not match");
        }

        return null;
    }

    public function currentUser(): ?UserDTO
    {
        if(!isset($_SESSION['id'])) {
            return null;
        }
        return $this->userRepository->findOne($_SESSION['id']);
    }

    public function update(UserDTO $userDTO): bool
    {
        $user = $this->userRepository->findOneByUsername($userDTO->getUsername());

        if(null !== $user){
            return false;
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->update($_SESSION['id'], $userDTO);
    }

    /**
     * @param UserDTO $userDTO
     */
    private function encryptPassword(UserDTO $userDTO): void
    {
        $plainPassword = $userDTO->getPassword();
        $passwordHash = password_hash($plainPassword, PASSWORD_DEFAULT);
        $userDTO->setPassword($passwordHash);
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function all(): \Generator
    {
        return $this->userRepository->findAll();
    }

    public function isLogged(): bool
    {
        if($this->currentUser() === null){
            return false;
        }
        return true;
    }
}