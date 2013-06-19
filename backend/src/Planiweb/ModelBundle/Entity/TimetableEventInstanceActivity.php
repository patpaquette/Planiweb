<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planiweb\ModelBundle\Entity\TimetableEventActivity
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\TimetableEventInstanceActivityRepository")
 */

class TimetableEventInstanceActivity
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
     * @var Planiweb\ModelBundle\Entity\TimetableEvent $timetableEvent
     *
     * @ORM\ManyToOne(targetEntity="TimetableEvent")
     */

    protected $timetableEvent;
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
        $this->timetableEvent = $timetableEvent;
    }

    /**
     * Get timetableEvent
     *
     * @return Planiweb\ModelBundle\Entity\TimetableEvent 
     */
    public function getTimetableEvent()
    {
        return $this->timetableEvent;
    }
}