<?php
/**
 * User entity
 *
 * @package   App\Manager
 * @version   0.0.1
 * @author    Rayzen-dev <rayzen.dev@gmail.com>
 * @copyright 2020 MineShit
 */

namespace App\Entity;


use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields="email")
 * @UniqueEntity(fields="username")
 */
class User implements UserInterface, \Serializable
{

    /**
     * Id of user.
     *
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Username of user.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=64, unique=true)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * E-mail of user.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=256, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * Password of user.
     *
     * @var string
     *
     * @ORM\Column(type="string", length= 60)
     */
    private $password;

    /**
     * Temporarily stores the plain password from the registration form. This field can be validated and is then used to populate the password field (from Symfony Doc).
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * Active account user.
     *
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * Roles of user.
     *
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $roles;


    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->isActive = false;

        $this->roles = ['ROLE_USER'];

    }//end __construct()


    /**
     * Get the id of user.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;

    }//end getId()


    /**
     * Set value to e-mail property.
     *
     * @param string $email E-mail of user.
     *
     * @return User|null
     */
    public function setEmail(string $email): ?User
    {
        $this->email = $email;

        return $this;

    }//end setEmail()


    /**
     * Get e-mail of user.
     *
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;

    }//end getEmail()


    /**
     * Set hashed password of user.
     *
     * @param string $password Hashed password.
     *
     * @return User|null
     */
    public function setPassword(string $password): ?User
    {
        $this->password = $password;

        return $this;

    }//end setPassword()


    /**
     * Get plain password of user.
     *
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;

    }//end getPlainPassword()


    /**
     * Set plain password of user (encoded later for "real" password).
     *
     * @param string $plainPassword Plain password.
     *
     * @return User|null
     */
    public function setPlainPassword(string $plainPassword): ?User
    {
        $this->plainPassword = $plainPassword;

        return $this;

    }//end setPlainPassword()


    /**
     * Set username of user.
     *
     * @param string $username Username of user.
     *
     * @return User|null
     */
    public function setUsername(string $username): ?User
    {
        $this->username = $username;

        return $this;

    }//end setUsername()


    /**
     * Returns the salt that was originally used to encode the password.
     *
     * @return string|null
     */
    public function getSalt()
    {
        return null;

    }//end getSalt()


    /**
     * Removes sensitive data from the user.
     *
     * @return void
     */
    public function eraseCredentials(): void
    {

    }//end eraseCredentials()


    /**
     * Set roles of user
     *
     * @param array $roles Role of user.
     *
     * @return User|null
     */
    public function setRoles(array $roles): ?User
    {
        $this->roles = $roles;

        return $this;

    }//end setRoles()


    /**
     * Get roles of user.
     *
     * @return array
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // Guarantee every user at least has ROLE_USER.
        $roles[] = 'ROLE_USER';

        return array_unique($roles);

    }//end getRoles()


    /**
     * Get username of user
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;

    }//end getUsername()


    /**
     * Get password of user.
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;

    }//end getPassword()


    /**
     * Set if account is active
     *
     * @param bool $isActive Active account or not.
     *
     * @return User
     */
    public function setIsActive(bool $isActive): User
    {
        $this->isActive = $isActive;

        return $this;

    }


    /**
     * String representation of User object
     *
     * @return string
     */
    public function serialize()
    {
        return serialize(
            [
                $this->id,
                $this->username,
                $this->password,
            ]
        );

    }//end serialize()


    /**
     * String representation of User object
     *
     * @param string $serialized The string representation of the User object.
     *
     * @return void
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized, ['allowed_classes' => false]);

    }//end unserialize()


}//end class
