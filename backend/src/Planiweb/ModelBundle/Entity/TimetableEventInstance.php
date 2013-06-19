<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planiweb\ModelBundle\Entity\TimetableEventInstance
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\TimetableEventInstanceRepository")
 */

class TimetableEventInstance
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
     * Set period
     *
     * @param Planiweb\ModelBundle\Entity\Period $period
     */
    public function setPeriod(\Planiweb\ModelBundle\Entity\Period $period)
    {
        $this->period = $period;
    }

    /**
     * Get period
     *
     * @return Planiweb\ModelBundle\Entity\Period 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set event
     *
     * @param Planiweb\ModelBundle\Entity\Event $event
     */
    public function setEvent(\Planiweb\ModelBundle\Entity\Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get event
     *
     * @return Planiweb\ModelBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
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