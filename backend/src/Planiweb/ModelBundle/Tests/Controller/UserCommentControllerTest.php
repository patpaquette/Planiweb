<?php

namespace Planiweb\ModelBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Planiweb\ModelBundle\Tests;

class UserCommentControllerTest extends Tests\ModelTestCase
{

    public function testCompleteScenario()
    {
        $defaultString = $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DefaultValues.String");
        $defaultDate = $this->getContainer()->getParameter("PlaniwebModelBundle.testing.DefaultValues.DateTime");
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("PlaniwebModelBundle:User")->findOneBy(array("id" => 1));
        $context = $em->getRepository("PlaniwebModelBundle:UserCommentContext")->findOneBy(array("id" => 1));

        //fill with entity data
        $entityData = array(
            "context" => array("id" => $context->getId()),
            "text" => $defaultString,
            "date" => $defaultDate,
            "user" => array("id" => $user->getId())
        ); 

        //fill with updated entity data
        $updatedEntityData = $entityData;
        $updatedEntityData["text"] = "asdf";

        //resource name used in urls
        $resourceName = "user_comment";


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
