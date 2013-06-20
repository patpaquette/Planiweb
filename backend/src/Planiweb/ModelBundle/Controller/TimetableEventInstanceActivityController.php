<?php

namespace Planiweb\ModelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Planiweb\ModelBundle\Entity\TimetableEventInstanceActivity;
use Planiweb\ModelBundle\Form\TimetableEventInstanceActivityType;

use Planiweb\ModelBundle\Controller\Common\ModelController;

/**
 * TimetableEventInstanceActivity controller.
 *
 */
class TimetableEventInstanceActivityController extends ModelController
{

    /**
     * Lists all TimetableEventInstanceActivity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PlaniwebModelBundle:TimetableEventInstanceActivity')->findAll();

        return new JsonResponse(array(
            'entities' => $entities
        ));
    }
    /**
     * Creates a new TimetableEventInstanceActivity entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\TimetableEventInstanceActivity");

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
     * Finds and displays a TimetableEventInstanceActivity entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventInstanceActivity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventInstanceActivity entity.');
        }


        return new Response($this->serialize(array("entity" => $entity)));
    }

    /**
     * Edits an existing TimetableEventInstanceActivity entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventInstanceActivity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventInstanceActivity entity.');
        }
        
        $updatedEntity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\TimetableEventInstanceActivity");

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
     * Deletes a TimetableEventInstanceActivity entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('PlaniwebModelBundle:TimetableEventInstanceActivity')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimetableEventInstanceActivity entity.');
        }

        $em->remove($entity);
        $em->flush();


        return new Response(null, 200);
    }

}
