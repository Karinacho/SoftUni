<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Cause",mappedBy="author")
     *
     */

private $causes;
public function __construct()
{
    $this->causes=new ArrayCollection();
    $this->roles=new ArrayCollection();
}

    /**
     * @var string
     * @Assert\NotNull
     * @Assert\Length(
     * min = 4,
     * max = 50,
     * minMessage = "Your username must be between 4 and 50 characters long",
     * maxMessage = "Your username must be between 4 and 50 characters long"
     * )
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**

     * @var string
     ** @Assert\NotNull
     * @Assert\Length(
     * min = 4,
     * max = 50,
     * minMessage = "Your password must be between 4 and 50 characters long",
     * maxMessage = "Your password must be between 4 and 50 characters long"
     * )
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Role")
     * @ORM\JoinTable(name="users_roles",
     *     joinColumns={@ORM\JoinColumn(name="user_id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id",referencedColumnName="id")})
     */
   private $roles;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return ArrayCollection
     */
    public function getCauses()
    {
        return $this->causes;
    }

    /**
     * @param Cause $cause
     * @return User
     */
    public function addCauses($cause)
    {
        $this->causes[] = $cause;
        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return array (Role|string)[]
     */
    public function getRoles()
    {
        $stringRoles=[];
        foreach ($this->roles as $role){
            /** @var Role $role */
            $stringRoles[]=$role->getRole();
        }
        return $stringRoles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @param Role $role
     * @return User
     */
    public function setRoles(Role $role)
    {
        $this->roles[] = $role;
        return $this;
    }

    /**
     * @param Cause $cause
     * @return bool
     */
    public function isAuthor(Cause $cause){
       return $cause->getAuthorId() === $this->getId();


    }

    /**
     * @return bool
     */
    public function isAdmin(){
        return in_array("ROLE_ADMIN",$this->getRoles());
    }
}

