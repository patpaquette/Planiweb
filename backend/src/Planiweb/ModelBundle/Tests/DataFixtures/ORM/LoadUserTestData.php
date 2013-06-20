<?php

namespace Planiweb\ModelBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Planiweb\ModelBundle\Entity\User;
use Planiweb\ModelBundle\Tests\DefaultTestValues;
use Planiweb\ModelBundle\Entity\Role;
use Planiweb\ModelBundle\Entity\HumanEntityInfo;

class LoadUserTestData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $defaultString = DefaultTestValues::Get("String", "fixture");
        $defaultDate = new \DateTime(DefaultTestValues::Get("DateTime"));

        $role = $manager->getRepository("PlaniwebModelBundle:Role")->findOneBy(array("name" => "user"));
        
        $info = new HumanEntityInfo();
        $info->setFirstName($defaultString);
        $info->setLastName($defaultString);
        $info->setSex("m");
        $info->setBirthdate($defaultDate);
        $info->setEmail($defaultString);


        $user = new User();
        $user->setUsername($defaultString);
        $user->setPassword($defaultString);
        $user->setRole($role);
        $user->setInfo($info);


        $manager->persist($user);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
?>