<?php

namespace App\Data;

class UserDTO
{
    const MAX_FIELD_LENGTH = 255;

    const USERNAME_MIN_LENGTH = 4;
    const PASSWORD_MIN_LENGTH = 4;
    const FULL_NAME_MIN_LENGTH = 5;


    private $id;
    private $username;
    private $password;
    private $fullName;
    private $bornOn;

    public static function create($username,
                                  $password,
                                  $fullName,
                                  $bornOn,
                                  $id = null)
    {

        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFullName($fullName)
            ->setBornOn($bornOn)
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
        "Username must be between 4 and 255 characters!"
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
    public function getFullName()
    {
        return $this->fullName;
    }
    /**
     * @param $fullName
     * @return UserDTO
     * @throws \Exception
     */
    public function setFullName($fullName): UserDTO
    {
        PDOValidator::validate(
            self::FULL_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $fullName,
            "Username out of range"
        );
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBornOn()
    {
        return $this->bornOn;
    }
    /**
     * @param $bornOn
     * @return UserDTO
     * @throws \Exception
     */
    public function setBornOn($bornOn): UserDTO
    {

        $this->bornOn = $bornOn;
        return $this;
    }


}