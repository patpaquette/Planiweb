<?php
namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\StudentRepository")
* @ORM\Table(name="Student")
*/
class Student
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Planiweb\ModelBundle\Entity\HumanEntityInfo", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="FK_info", referencedColumnName="id")
     */
    protected $info;

    /**
     * @ORM\ManyToMany(targetEntity="Planiweb\ModelBundle\Entity\UserComment", mappedBy="students", fetch="LAZY", cascade={"persist", "remove"})
     * 
     */
    protected $comments;
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set info
     *
     * @param Planiweb\ModelBundle\Entity\HumanEntityInfo $info
     */
    public function setInfo(\Planiweb\ModelBundle\Entity\HumanEntityInfo $info)
    {
        $this->info = $info;
    }

    /**
     * Get info
     *
     * @return Planiweb\ModelBundle\Entity\HumanEntityInfo 
     */
    public function getInfo()
    {
        return $this->info;
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
     * @return Student
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