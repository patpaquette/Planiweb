<?php

namespace Planiweb\ModelBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Planiweb\ModelBundle\Tests;

class TimetableEventInstanceControllerTest extends Tests\ModelTestCase
{

    public function testCompleteScenario()
    {
        $em = $this->getDoctrine()->getManager();
        $timetableEvent = $em->getRepository("PlaniwebModelBundle:TimetableEvent")->findOneBy(array("id" => 1));

        //fill with entity data
        $entityData = array(
            "timetable_event" => array("id" => $timetableEvent->getId()),
            "date" => $this->getContainer()->getParameter("PlaniwebModelBundle.Testing.DefaultValues.DateTime")
        );

        //fill with updated entity data
        $updatedEntityData = $entityData;
        $updatedEntityData["date"] = "1986-05-08T00:00:00O";

        //resource name used in urls
        $resourceName = "timetable_event_instance";


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
