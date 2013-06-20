<?php

namespace Planiweb\ModelBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Planiweb\ModelBundle\Entity\TimetableEvent;
use Planiweb\ModelBundle\Entity\Course;
use Planiweb\ModelBundle\Tests\DefaultTestValues;

class LoadTimetableEventTestData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $course = $manager->getRepository("PlaniwebModelBundle:Course")->findOneBy(array("name" => "fixture_test"));
         
        $event = new TimetableEvent();
        $event->setCourse($course);
        $event->setStartTime(new \DateTime(DefaultTestValues::Get("DateTime", "fixture")));
        $event->setEndTime(new \DateTime(DefaultTestValues::Get("DateTime", "fixture")));
        $event->setDay(DefaultTestValues::Get("Integer", "fixture"));

        $manager->persist($event);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
?>