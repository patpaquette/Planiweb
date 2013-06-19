<?php
/**
 * Patrice Paquette
 *
 * User controller unit tests
 */
namespace Planiweb\RESTBundle\Tests\Controller;

use Planiweb\RESTBundle\Tests;
use Planiweb\ModelBundle\Entity;

class UserControllerTest extends Tests\ModelTestCase
{
    public function __construct(){
        parent::__construct();
    }

    public function testUserCreateAction(){
        $userData = array(
            'username' => 'test',
            'password' => 'test',
            'info' => array(
                'first_name' => 'test',
                'last_name' => 'test',
                'sex' => 'm',
                'birthdate' => '1987-05-08',
                'email' => 'test@test.com',
                'telephone_number' => '555-555-5555',
                'cell_number' => '555-555-5555'
            )
        );

        //Test with all proper input
        $this->_client->request(
            'POST', 
            '/user',
            array(),
            array(),
            array(),
            json_encode($userData)
        );

        $response = $this->_client->getResponse();
        echo $response->getContent();
        $this->assertEquals('200', $response->getStatusCode());


        //test without email, telephone_number, and cell_number
        $this->initTest();
        $this->_client->request(
            'POST',
            '/user',
            array(),
            array(),
            array(),
            json_encode(array(
                "username" => $userData["username"],
                "password" => $userData["password"],
                "info" => array(
                    "first_name" => $userData["info"]["first_name"],
                    "last_name" => $userData["info"]["last_name"],
                    "birthdate" => $userData["info"]["birthdate"],
                    "sex" => $userData["info"]["sex"],
                    'email' => '',
                    'telephone_number' => '',
                    'cell_number' => ''
                )
            ))
        );

        $response = $this->_client->getResponse();
        $this->assertEquals('200', $response->getStatusCode());

        //test without user info
        $this->initTest();
        $this->_client->request(
            'POST',
            '/user',
            array(),
            array(),
            array(),
            json_encode(array(
                "username" => $userData["username"],
                "password" => $userData["password"]
                )
            )
        );

        $response = $this->_client->getResponse();
        $this->assertEquals('400', $response->getStatusCode());


        //test with no data
        $this->initTest();
        $this->_client->request(
            'POST',
            '/user',
            array(),
            array(),
            array(),
            ""
        );

        $response = $this->_client->getResponse();
        $this->assertEquals('400', $response->getStatusCode());

    }

    public function userGetAllActionTest(){
    }

    public function userGetOneActionTest(){
    }

    public function userDeleteActionTest(){
    }

    public function userUpdateActionTest(){
    }
}
