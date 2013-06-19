<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planiweb\ModelBundle\Entity\CourseActivity
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\CourseActivityRepository")
 */

class CourseActivity
{
	/**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\Column(length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Planiweb\ModelBundle\Entity\Course $course
     *
     * @ORM\ManyToOne(targetEntity="Course")
     */
    protected $course;

    /**
     * @var string $name
     *
     * @ORM\Column(type="string")
     * @ORM\Column(length=255)
     */
    protected $name;

    /**
     * @var string $description
     *
     * @ORM\Column(type="text")
     */
    protected $description;

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set course
     *
     * @param Planiweb\ModelBundle\Entity\Course $course
     */
    public function setCourse(\Planiweb\ModelBundle\Entity\Course $course)
    {
        $this->course = $course;
    }

    /**
     * Get course
     *
     * @return Planiweb\ModelBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}