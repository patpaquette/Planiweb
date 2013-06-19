<?php

namespace Planiweb\ModelBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Planiweb\modelBundle\Tests;

class UserControllerTest extends Tests\ModelTestCase
{
    public function testCompleteScenario()
    {
        $userData = array(
            'username' => 'test',
            'password' => 'test',
            'info' => array(
                'first_name' => 'test',
                'last_name' => 'test',
                'sex' => 'm',
                'birthdate' => '1987-05-08T00:00:00O',
                'email' => 'test@test.com',
                'telephone_number' => '555-555-5555',
                'cell_number' => '555-555-5555'
            )
        );

        //create entity
        $response = $this->request(
            'POST', 
            '/user/create',
            $userData
        );

        $userId = json_decode($response->getContent(), true)["id"];
        $this->assertEquals('200', $response->getStatusCode());
        
        
        //show entity
        $response = $this->request(
            'GET',
            '/user/' . $userId . '/show'
        );

        $user = json_decode($response->getContent(), true)["entity"];

        $this->assertEquals('200', $response->getStatusCode());
        $this->assertEquals($userData["username"], $user["username"]);


        //update entity
        $response = $this->request(
            'PUT',
            '/user/' . $userId . '/update',
            array("id" => $userId, "password" => "new_pass")
        );

        $this->assertEquals('200', $response->getStatusCode());


        //delete entity
        $response = $this->request(
            'DELETE',
            '/user/' . $userId . '/delete'
        );

        $this->assertEquals('200', $response->getStatusCode());
    }
}
