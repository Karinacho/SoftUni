<?php

namespace App\Data;

class UserDTO
{
    const MAX_FIELD_LENGTH = 255;

    const USERNAME_MIN_LENGTH = 3;
    const PASSWORD_MIN_LENGTH = 6;
    const FIRST_NAME_MIN_LENGTH = 3;
    const LAST_NAME_MIN_LENGTH = 3;

    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;

    public static function create($username,
                                  $password,
                                  $firstName,
                                  $lastName,
                                  $id = null)
    {

        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setId($id);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @param $username
     * @return UserDTO
     * @throws \Exception
     */
    public function setUsername($username): UserDTO
    {
        PDOValidator::validate(
        self::USERNAME_MIN_LENGTH,
        self::MAX_FIELD_LENGTH,
        $username,
        "Username out of range"
    );
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): UserDTO
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * @param $firstName
     * @return UserDTO
     * @throws \Exception
     */
    public function setFirstName($firstName): UserDTO
    {
        PDOValidator::validate(
            self::FIRST_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $firstName,
            "Username out of range"
        );
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * @param $lastName
     * @return UserDTO
     * @throws \Exception
     */
    public function setLastName($lastName): UserDTO
    {
        PDOValidator::validate(
            self::LAST_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $lastName,
            "Username out of range"
        );
        $this->lastName = $lastName;
        return $this;
    }


}