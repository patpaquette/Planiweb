<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

/**
 * Planiweb\ModelBundle\Entity\UserComment
 *
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\UserCommentRepository")
 */
class UserComment implements JsonSerializable
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
     * @var Planiweb\ModelBundle\Entity\UserCommentContext $context
     *
     * @ORM\ManyToOne(targetEntity="Planiweb\ModelBundle\Entity\UserCommentContext")
     */
    protected $context;

    /**
     * @var string $text
     *
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * @var datetime $date
     *
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @var Planiweb\ModelBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Planiweb\ModelBundle\Entity\User", inversedBy="comments")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="Planiweb\ModelBundle\Entity\Student", inversedBy="comments")
     * @ORM\JoinTable(name="students_comments")
     */
    protected $students;

    public function __construct()
    {
        $this->entities = new ArrayCollection();
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
     * Set text
     *
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set teacher
     *
     * @param Planiweb\ModelBundle\Entity\User $user
     */
    public function setUser(\Planiweb\ModelBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get teacher
     *
     * @return Planiweb\ModelBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    //json serializable
    public function jsonSerialize()
    {

        $entitiesIds = array_map(
            function(HumanEntity $h)
            {
                return $h->getId();
            },
            $this->getEntities()->toArray()
        );

        return array(
            'id' => $this->getId(),
            'text' => $this->getText(),
            'date' => $this->getDate()->format('Y-m-d H:i:s'),
            'user' => array(
                'id' => $this->getUser()->getId(),
                'username' => $this->getUser()->getUsername(),
                'role' => $this->getUser()->getRoles(),
                'human_entity' => array(
                    'id' => $this->getUser()->getHumanEntity()->getId(),
                    'type' => $this->getUser()->getHumanEntity()->getType()->getType()
                    )
                ),
            'entities' => $entitiesIds
        );

    }

    /**
     * Set context
     *
     * @param Planiweb\ModelBundle\Entity\CommentContext $context
     */
    public function setContext(\Planiweb\ModelBundle\Entity\CommentContext $context)
    {
        $this->context = $context;
    }

    /**
     * Get context
     *
     * @return Planiweb\ModelBundle\Entity\CommentContext 
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Add entities
     *
     * @param Planiweb\ModelBundle\Entity\HumanEntity $entities
     */
    public function addHumanEntity(\Planiweb\ModelBundle\Entity\HumanEntity $entities)
    {
        $this->entities[] = $entities;
    }

    /**
     * Get entities
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Add students
     *
     * @param Planiweb\ModelBundle\Entity\Student $students
     */
    public function addStudent(\Planiweb\ModelBundle\Entity\Student $students)
    {
        $this->students[] = $students;
    }

    /**
     * Get students
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Remove students
     *
     * @param \Planiweb\ModelBundle\Entity\Student $students
     */
    public function removeStudent(\Planiweb\ModelBundle\Entity\Student $students)
    {
        $this->students->removeElement($students);
    }
}