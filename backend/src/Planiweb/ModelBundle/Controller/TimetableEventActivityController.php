<?php

namespace Planiweb\ModelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Planiweb\ModelBundle\Entity\TimetableEventActivity;
use Planiweb\ModelBundle\Form\TimetableEventActivityType;

use Planiweb\ModelBundle\Controller\Common\ModelController;

/**
 * TimetableEventActivity controller.
 *
 */
class TimetableEventActivityController extends ModelController
{

    /**
     * Lists all TimetableEventActivity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PlaniwebModelBundle:TimetableEventActivity')->findAll();

        return new JsonResponse(array(
            'entities' => $entities
        ));
    }
    /**
     * Creates a new TimetableEventActivity entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\TimetableEventActivity");

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
     * Finds and displays a TimetableEventActivity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventActivity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventActivity entity.');
        }


        return new Response($this->serialize(array("entity" => $entity)));
    }

    /**
     * Edits an existing TimetableEventActivity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventActivity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventActivity entity.');
        }
        
        $updatedEntity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\TimetableEventActivity");

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
     * Deletes a TimetableEventActivity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventActivity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventActivity entity.');
        }

        $em->remove($entity);
        $em->flush();


        return new Response(null, 200);
    }

}
