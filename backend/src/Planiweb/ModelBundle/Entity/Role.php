<?php
namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planiweb\ModelBundle\Entity\Role
 *
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\RoleRepository")
 * 
 */
class Role{
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
     * @var string $role
     *
     * @ORM\Column(type="string", unique=true)
     * 
     */
    protected $name;

    /**
     * Set role name
     *
     * @param string $name
     */
    public function setName($name){
    	$this->name = $name;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getName(){
    	return $this->name;
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
     * Constructor
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}