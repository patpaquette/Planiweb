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
     * @var Planiweb\ModelBundle\Entity\TimetableEvent $timetable_event
     *
     * @ORM\ManyToOne(targetEntity="TimetableEvent")
     */
    protected $timetable_event;

    /**
     * @var datetime $date
     *
     * @ORM\Column(type="datetime")
     */
    protected $date;


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
     * Get date
     *
     * @return datetime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set date
     * @param datetime $date
     */ 
    public function setDate($date)
    {
        $this->date = $date;
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