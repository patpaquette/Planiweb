<?php

namespace Planiweb\ModelBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Planiweb\ModelBundle\Entity\CourseActivity;
use Planiweb\ModelBundle\Entity\Course;

class LoadActivityTestData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $course = $manager->getRepository("PlaniwebModelBundle:Course")->findOneBy(array("name" => "fixture_test"));
         
        $activity = new CourseActivity();
        $activity->setCourse($course);
        $activity->setName("fixture_test");
        $activity->setDescription("fixture_test");

        $manager->persist($activity);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
?>