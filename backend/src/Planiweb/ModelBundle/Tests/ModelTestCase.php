<?php
/**
 * Patrice Paquette
 *
 * Test case for testing the model. Adds some helper functions and sets up
 * the database for testing(uses test database)
 */


namespace Planiweb\ModelBundle\Tests;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Planiweb\ModelBundle\Entity;
use Symfony\Bundle\FrameworkBundle\Test;
use Symfony\Bundle\FrameworkBundle\Console;

class ModelTestCase extends Test\WebTestCase
{
    protected $_application;
    protected $_client;

    public function getContainer()
    {
        return static::$kernel->getContainer();
    }

    public function getDoctrine()
    {
        if (!$this->getContainer()->has('doctrine')) {
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
        }

        return $this->getContainer()->get('doctrine');
    }

    protected function setUp()
    {
        $this->_client = $this->initTest();
    }

    protected function initTest(array $options = array(), array $server = array())
    {
        $client = static::createClient($options, $server);
        $this->_application = new Console\Application(static::$kernel);
        $this->_application->setAutoExit(false);

        $this->runConsole("doctrine:schema:drop", array("--force" => true));
        $this->runConsole("doctrine:schema:create");
        $this->runConsole("doctrine:fixtures:load", array("--fixtures" => __DIR__ . "/../DataFixtures/ORM"));
        $this->runConsole("doctrine:fixtures:load", array("--fixtures" => __DIR__ . "/DataFixtures/ORM"));

        return $client;
    }
    

    protected function runConsole($command, Array $options = array())
    {
        $options["-e"] = "test";
        $options["-q"] = null;
        $options["-n"] = null;
        $options = array_merge($options, array('command' => $command));
        return $this->_application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
    }

    protected function createClientWithAuthentication()
    {
        $user = $this->getContainer()->get('doctrine')->getRepository('PlaniwebModelBundle:User')->findOneByUsername("admin");

        $this->getContainer()->get('security.context')->setToken(
            new UsernamePasswordToken(
                $user, null, 'main', $user->getRoles()
            )
        );
    }

    protected function request($method, $route, $data = array())
    {
        $this->_client->request(
            $method,
            $route,
            array(),
            array(),
            array(),
            json_encode($data)
        );

        return $this->_client->getResponse();
    }
}
