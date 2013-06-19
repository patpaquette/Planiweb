<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use JsonSerializable;

/**
 * Planiweb\ModelBundle\Entity\User
 *
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\UserRepository")
 * 
 */
class User implements UserInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\Column(length=11)
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var string $username
     * 
     *@ORM\Column(type="string", unique=true, nullable=false)
     *      
     */
    protected $username;

    /**
     * @var string $password
     *
     * @ORM\Column(length=60, nullable=false)
     */
    protected $password;

    /**
     * @var Planiweb\ModelBundle\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     */
    protected $role;

    /**
     * @var Planiweb\ModelBundle\Entity\HumanEntityInfo
     *
     * @ORM\OneToOne(targetEntity="Planiweb\ModelBundle\Entity\HumanEntityInfo", cascade={"persist", "remove"})
     */
    protected $info;

    /**
     * @ORM\OneToMany(targetEntity="Planiweb\ModelBundle\Entity\UserComment", mappedBy="user", fetch="LAZY", cascade={"persist", "remove"})
     */
    protected $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param integer
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     * Set human_entity
     *
     * @param Planiweb\ModelBundle\Entity\HumanEntity $humanEntity
     */
    public function setInfo(\Planiweb\ModelBundle\Entity\HumanEntityInfo $humanEntityInfo)
    {
        $this->info = $humanEntityInfo;
    }

    /**
     * Get human_entity
     *
     * @return Planiweb\ModelBundle\Entity\HumanEntity 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Get roles
     *
     * @return Planiweb\ModelBundle\Entity\Role
     */
    public function getRoles(){
        if($this->role == 'admin')
        {
            return array('ROLE_ADMIN', 'ROLE_USER');
        }
        else if($this->role == 'user')
        {
            return array('ROLE_USER');
        }
        else
        {
            return array();
        }
    }

    /**
     * Set role
     *
     * @param Planiweb\ModelBundle\Entity\Role $role
     */
    public function setRole(\Planiweb\ModelBundle\Entity\Role $role)
    {
        $this->role = $role;
    }

    public function getSalt(){
    }

    public function eraseCredentials(){
    }

    public function equals(UserInterface $user){
        return $this->getUsername() === $user->getUsername();
    }


    /**
     * Get role
     *
     * @return Planiweb\ModelBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add comments
     *
     * @param Planiweb\ModelBundle\Entity\UserComment $comments
     */
    public function addUserComment(\Planiweb\ModelBundle\Entity\UserComment $comments)
    {
        $this->comments[] = $comments;
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add comments
     *
     * @param \Planiweb\ModelBundle\Entity\UserComment $comments
     * @return User
     */
    public function addComment(\Planiweb\ModelBundle\Entity\UserComment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Planiweb\ModelBundle\Entity\UserComment $comments
     */
    public function removeComment(\Planiweb\ModelBundle\Entity\UserComment $comments)
    {
        $this->comments->removeElement($comments);
    }
}