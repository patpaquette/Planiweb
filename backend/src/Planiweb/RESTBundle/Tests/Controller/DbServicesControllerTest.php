<?php

namespace Planiweb\RESTBundle\Tests\Controller;

use Symfony\Component\HttpFoundation\Request;
use Planiweb\RESTBundle\Controller\DbServicesController;

class DbServicesControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testInitDb()
    {
        $controller = new DbServicesController();
        $controller->initDbAction();
    }
}
