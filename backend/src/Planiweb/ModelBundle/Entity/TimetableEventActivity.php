<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planiweb\ModelBundle\Entity\TimetableEventActivity
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\TimetableEventActivityRepository")
 */

class TimetableEventActivity
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
     * @var Planiweb\ModelBundle\Entity\CourseActivity $activity
     *
     * @ORM\ManyToOne(targetEntity="CourseActivity")
     */
    protected $activity;

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
     * @var Planiweb\ModelBundle\Entity\TimetableEvent $timetable_event
     *
     * @ORM\ManyToOne(targetEntity="TimetableEvent")
     */
    protected $timetable_event;
    
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
     * Set activity
     *
     * @param Planiweb\ModelBundle\Entity\Activity $activity
     */
    public function setActivity(\Planiweb\ModelBundle\Entity\Activity $activity)
    {
        $this->activity = $activity;
    }

    /**
     * Get activity
     *
     * @return Planiweb\ModelBundle\Entity\Activity 
     */
    public function getActivity()
    {
        return $this->activity;
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
     * Set event
     *
     * @param Planiweb\ModelBundle\Entity\Event $event
     */
    public function setPeriod(\Planiweb\ModelBundle\Entity\Event $period)
    {
        $this->period = $period;
    }

    /**
     * Get event
     *
     * @return Planiweb\ModelBundle\Entity\Event 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set timetableEvent
     *
     * @param Planiweb\ModelBundle\Entity\TimetableEvent $timetableEvent
     */
    public function setTimetableEvent(\Planiweb\ModelBundle\Entity\TimetableEvent $timetableEvent)
    {
        $this->timetable_event = $timetableEvent;
    }

    /**
     * Get timetableEvent
     *
     * @return Planiweb\ModelBundle\Entity\TimetableEvent 
     */
    public function getTimetableEvent()
    {
        return $this->timetable_event;
    }
}