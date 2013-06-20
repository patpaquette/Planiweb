<?php

namespace Planiweb\ModelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Planiweb\ModelBundle\Entity\TimetableEventInstance;
use Planiweb\ModelBundle\Form\TimetableEventInstanceType;

use Planiweb\ModelBundle\Controller\Common\ModelController;

/**
 * TimetableEventInstance controller.
 *
 */
class TimetableEventInstanceController extends ModelController
{

    /**
     * Lists all TimetableEventInstance entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PlaniwebModelBundle:TimetableEventInstance')->findAll();

        return new JsonResponse(array(
            'entities' => $entities
        ));
    }
    /**
     * Creates a new TimetableEventInstance entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\TimetableEventInstance");

        $errors = $this->validate($entity);

        if(count($errors) == 0)
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            return new JsonResponse(array('id' => $entity->getId()));
        }

        return new Response(null, 400);
    }

    /**
     * Finds and displays a TimetableEventInstance entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventInstance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventInstance entity.');
        }


        return new Response($this->serialize(array("entity" => $entity)));
    }

    /**
     * Edits an existing TimetableEventInstance entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventInstance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventInstance entity.');
        }
        
        $updatedEntity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\TimetableEventInstance");

        $id = $updatedEntity->getId();
        $errors = $this->validate($updatedEntity);

        //insufficient data
        if(!isset($id) || count($errors) > 0)
        {
            return new Response(null, 400);
        }

        $em->persist($updatedEntity);
        $em->flush();


        return new JsonResponse(array('id' => $updatedEntity->getId()));
    }
    /**
     * Deletes a TimetableEventInstance entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventInstance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventInstance entity.');
        }

        $em->remove($entity);
        $em->flush();


        return new Response(null, 200);
    }

}
