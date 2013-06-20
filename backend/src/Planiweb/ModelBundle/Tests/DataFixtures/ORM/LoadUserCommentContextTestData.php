<?php

namespace Planiweb\ModelBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Planiweb\ModelBundle\Entity\UserCommentContext;
use Planiweb\ModelBundle\Tests\DefaultTestValues;

class LoadUserCommentContextTestData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = $manager->getRepository("PlaniwebModelBundle:User")->findOneBy(array("username" => "fixture_test"));

        $userContext = new UserCommentContext();
        $userContext->setUser($user);
        $userContext->setContext(DefaultTestValues::Get("String", "fixture"));

        $manager->persist($userContext);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
?>