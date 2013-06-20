<?php

namespace Planiweb\ModelBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Planiweb\ModelBundle\Entity\TimetableEventInstance;
use Planiweb\ModelBundle\Tests\DefaultTestValues;

class LoadTimetableEventInstanceTestData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $event = $manager->getRepository("PlaniwebModelBundle:TimetableEvent")->findOneById(1);
        $event_instance = new TimetableEventInstance();
        $event_instance->setTimetableEvent($event);
        $event_instance->setDate(new \DateTime(DefaultTestValues::Get("DateTime")));

        $manager->persist($event_instance);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
?>