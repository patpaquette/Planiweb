<?php

namespace Planiweb\ModelBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Planiweb\ModelBundle\Entity\Role;

class LoadRoleData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $roleAdmin = new Role("admin");
        $roleUser = new Role("user");

        $manager->persist($roleAdmin);
        $manager->persist($roleUser);
        $manager->flush();
    }
}

?>
