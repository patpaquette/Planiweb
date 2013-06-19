<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planiweb\ModelBundle\Entity\TimetableEvent
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\TimetableEventRepository")
 */

class TimetableEvent
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
     * @var Planiweb\ModelBundle\Entity\Course $course
     *
     * @ORM\ManyToOne(targetEntity="Course")
     */
    protected $course;

    /**
     * @var datetime $start_time
     *
     * @ORM\Column(type="datetime")
     */
    protected $start_time;

    /**
     * @var datetime $end_time
     *
     * @ORM\Column(type="datetime")
     */
    protected $end_time;

    /**
     * @var integer $day
     *
     * @ORM\Column(type="integer")
     * @ORM\Column(length=2)
     */
    protected $day;


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
     * Set start_time
     *
     * @param datetime $startTime
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;
    }

    /**
     * Get start_time
     *
     * @return datetime 
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set end_time
     *
     * @param datetime $endTime
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;
    }

    /**
     * Get end_time
     *
     * @return datetime 
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Set day
     *
     * @param integer $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * Get day
     *
     * @return integer 
     */
    public function getDay()
    {
        return $this->day;
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