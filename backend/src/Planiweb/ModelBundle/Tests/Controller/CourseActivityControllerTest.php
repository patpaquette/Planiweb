<?php

namespace Planiweb\ModelBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Planiweb\modelBundle\Tests;
use Planiweb\ModelBundle\Entity;

class CourseActivityControllerTest extends Tests\ModelTestCase
{

    public function testCompleteScenario()
    {
        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository("PlaniwebModelBundle:Course")->findOneBy(array("name" => "fixture_test"));

        //fill with entity data
        $entityData = array(
            'name' => 'test',
            'description' => 'test',
            'course' => array(
                'id' => $course->getId()
            )
        );

        //fill with updated entity data
        $updatedEntityData = array(
            'name' => 'new_test',
            'description' => 'test',
            'course' => array(
                'id' => $course->getId()
            )
        );

        //resource name used in urls
        $resourceName = "course_activity";


        //create entity
        //no data
        $response = $this->request(
            'POST',
            '/' . $resourceName . '/create',
            array()
        );
        echo $response->getContent();
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
