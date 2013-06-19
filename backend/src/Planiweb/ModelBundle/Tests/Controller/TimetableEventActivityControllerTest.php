<?php

namespace Planiweb\ModelBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Planiweb\ModelBundle\Tests;
use Planiweb\ModelBundle\Tests\DefaultTestValues;

class TimetableEventActivityControllerTest extends Tests\ModelTestCase
{

    public function testCompleteScenario()
    {
        $em = $this->getDoctrine()->getManager();
        $activity = $em->getRepository("PlaniwebModelBundle:CourseActivity")->findOneBy(array("name" => "fixture_test"));
        $event = $em->getRepository("PlaniwebModelBundle:TimetableEvent")->findOneBy(array("id" => 1));

        //fill with entity data
        $entityData = array(
            "activity" => $activity->getId(),
            "start_time" => DefaultTestValues::Get("DateTime"),
            "end_time" => DefaultTestValues::Get("DateTime"),
            "timetable_event" => $event->getId()
        );

        //fill with updated entity data
        $updatedEntityData = array(
            "activity" => $activity->getId(),
            "start_time" => "1986-05-08T00:00:00O",
            "end_time" => DefaultTestValues::Get("DateTime"),
            "timetable_event" => $event->getId()
        );

        //resource name used in urls
        $resourceName = "timetable_event_activity";


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
