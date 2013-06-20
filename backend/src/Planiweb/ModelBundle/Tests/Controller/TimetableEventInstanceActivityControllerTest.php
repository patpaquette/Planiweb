<?php

namespace Planiweb\ModelBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Planiweb\ModelBundle\Tests;

class TimetableEventInstanceActivityControllerTest extends Tests\ModelTestCase
{

    public function testCompleteScenario()
    {
        $em = $this->getDoctrine()->getManager();
        $activity = $em->getRepository("PlaniwebModelBundle:CourseActivity")->findOneBy(array("name" => $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DataFixtures.DefaultValues.String")));
        $timetable_event_instance = $em->getRepository("PlaniwebModelBundle:TimetableEventInstance")->findOneById(1);



        //fill with entity data
        $entityData = array(
            "activity" => array("id" => $activity->getId()),
            "start_time" => $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DefaultValues.DateTime"),
            "end_time" => $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DefaultValues.DateTime"),
            "timetable_event_instance" => array("id" => $timetable_event_instance->getId())
        );

        //fill with updated entity data
        $updatedEntityData = $entityData;
        $updatedEntityData["start_time"] = "1986-05-08T00:00:00O";

        //resource name used in urls
        $resourceName = "timetable_event_instance_activity";


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
