<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

/**
 * Planiweb\ModelBundle\Entity\HumanEntityInfo
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\HumanEntityInfoRepository")
 */

class HumanEntityInfo
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
     * @var string $first_name
     *
     * @ORM\Column(type="string")
     * @ORM\Column(length=255)
     */
    protected $first_name;

    /**
     * @var string $last_name
     *
     * @ORM\Column(type="string")
     * @ORM\Column(length=255)
     */
    protected $last_name;


    /**
     * @var  string $sex 
     *
     * @ORM\Column(type="string", nullable=true)
     * @ORM\Column(length=1)
     */
    protected $sex;

    /**
     * @var datetime $birthdate
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $birthdate;

    /**
     * @var string email
     *
     * @ORM\Column(type="string", nullable=true)
     * @ORM\Column(length=255)
     */
    protected $email;

    /**
     * @var integer $telephone_number
     *
     * @ORM\Column(type="string", nullable=true)
     * @ORM\Column(length=20)
     */
    protected $telephone_number;

    /**
     * @var integer $cell_number
     *
     * @ORM\Column(type="string", nullable=true)
     * @ORM\Column(length=20)
     */
    protected $cell_number;


    public function __construct()
    {
        $this->comments = new ArrayCollection();
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }


    /**
     * Set sex
     *
     * @param  string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * Get sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set birthdate
     *
     * @param datetime $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * Get birthdate
     *
     * @return datetime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set email
     *
     * @param string $email 
     * 
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone_number
     *
     * @param string $telephone_number 
     */
    public function setTelephoneNumber($telephone_number)
    {
        $this->telephone_number = $telephone_number;
    }

    /**
     * Get telephone_number
     *
     * @return string 
     */
    public function getTelephoneNumber()
    {
        return $this->telephone_number;
    }

    /**
     * Set cell_number
     *
     * @param string $cell_number 
     */
    public function setCellNumber($cell_number)
    {
        $this->cell_number = $cell_number;
    }

    /**
     * Get cell_number
     *
     * @return string 
     */
    public function getCellNumber()
    {
        return $this->cell_number;
    }
}