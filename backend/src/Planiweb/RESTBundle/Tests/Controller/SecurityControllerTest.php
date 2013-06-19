<?php

namespace Planiweb\RESTBundle\Tests\Controller;

use Symfony\Component\HttpFoundation\Request;
use Planiweb\RESTBundle\Controller\SecurityController;
use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;
use Planiweb\RESTBundle\Tests;
use Symfony\Component\Validator\Constraints\DateTime;

require_once(__DIR__ . '/../../../../../app/AppKernel.php');

class SecurityControllerTest extends \Planiweb\RESTBundle\Tests\ModelTestCase
{
	public function __construct()
	{
        parent::__construct();
		$this->controller = new SecurityController();
	}

	public function testCreateAccount()
	{
		$this->controller->setContainer($this->getContainer());

		$this->addDefaultValues();

		$request = new Request(
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            json_encode(array(
                'firstname' => 'Patrice',
                'lastname' => 'Paquette',
                'username' => 'Bobbybobbets',
                'password' => 'asdf'
                ))
        );

        $this->controller->createAccountAction($request);

        $resultUser = $this->getContainer()->get('Doctrine')
        	->getRepository('Planiweb\RESTBundle\Entity\User')
        	->findOneByUsername('Bobbybobbets');

        $resultHE = $this->getContainer()->get('Doctrine')
        	->getRepository('Planiweb\RESTBundle\Entity\HumanEntity')
        	->findOneBy(array(
        		'first_name' => 'Patrice',
        		'last_name' => 'Paquette'));

        $this->assertEquals(1, count($resultUser), "Check if user is created");
        $this->assertEquals(1, count($resultHE), "Check if human entity is created");
	}

	//utility functions
    protected function addDefaultValues(){
        $dbServices = $this->getContainer()->get("DbServices");
        $dbServices->addDefaultEntries();
    }

}
