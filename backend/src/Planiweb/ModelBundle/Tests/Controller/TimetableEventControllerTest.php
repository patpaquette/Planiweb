<?php

namespace Planiweb\ModelBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Planiweb\ModelBundle\Tests;

class TimetableEventControllerTest extends Tests\ModelTestCase
{

    public function testCompleteScenario()
    {
        $em = $this->getDoctrine();

        $course = $em->getRepository("PlaniwebModelBundle:Course")->findOneBy(array("name" => $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DefaultValues.String")));

        //fill with entity data
        $entityData = array(
            "course" => $course,
            "start_time" => $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DefaultValues.DateTime"),
            "end_time" => $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DefaultValues.DateTime"),
            "day" => $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DefaultValues.String"),
        );

        //fill with updated entity data
        $updatedEntityData = $entityData;
        $updatedEntityData["day"]++;

        //resource name used in urls
        $resourceName = "timetable_event";


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
