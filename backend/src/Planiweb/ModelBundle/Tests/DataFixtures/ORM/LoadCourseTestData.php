<?php

namespace Planiweb\ModelBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Planiweb\ModelBundle\Entity\Course;

class LoadCourseTestData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $course = new Course();
        $course->setName("fixture_test");
        $course->setDescription("fixture_test");

        $manager->persist($course);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
?>