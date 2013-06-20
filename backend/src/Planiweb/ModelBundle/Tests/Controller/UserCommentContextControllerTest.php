<?php

namespace Planiweb\ModelBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Planiweb\ModelBundle\Tests;

class UserCommentContextControllerTest extends Tests\ModelTestCase
{

    public function testCompleteScenario()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("PlaniwebModelBundle:User")->findOneBy(array("username" => "fixture_test"));

        //fill with entity data
        $entityData = array(
            "user" => array("id" => $user->getId()),
            "context" => "test"
        );

        //fill with updated entity data
        $updatedEntityData = $entityData;
        $updatedEntityData["context"] = "updated_test";

        //resource name used in urls
        $resourceName = "user_comment_context";


        //create entity
        //no data
        $response = $this->request(
            'POST',
            '/' . $resourceName . '/create',
            array()
        );

        $this->assertEquals('400', $response->getStatusCode());

        //with data
        $response = $this->request(
            'POST',
            '/' . $resourceName . '/create',
            $entityData
        );

        $entityId = json_decode($response->getContent(), true)["id"];
        $this->assertEquals('200', $response->getStatusCode());

        //show entity
        $response = $this->request(
            'GET',
            '/' . $resourceName . '/' . $entityId . '/show'
        );

        $entity = json_decode($response->getContent(), true)["entity"];

        $this->assertEquals('200', $response->getStatusCode());


        //update entity
        $updatedEntityData['id'] = $entityId;
        $response = $this->request(
            'PUT',
            '/' . $resourceName . '/' . $entityId . '/update',
            $updatedEntityData
        );

        $this->assertEquals('200', $response->getStatusCode());


        //delete entity
        $response = $this->request(
            'DELETE',
            '/' . $resourceName . '/' . $entityId . '/delete'
        );

        $this->assertEquals('200', $response->getStatusCode());
    }


}
