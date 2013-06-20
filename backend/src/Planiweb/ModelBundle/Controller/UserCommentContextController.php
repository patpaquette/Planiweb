<?php

namespace Planiweb\ModelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Planiweb\ModelBundle\Entity\UserCommentContext;
use Planiweb\ModelBundle\Form\UserCommentContextType;

use Planiweb\ModelBundle\Controller\Common\ModelController;

/**
 * UserCommentContext controller.
 *
 */
class UserCommentContextController extends ModelController
{

    /**
     * Lists all UserCommentContext entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PlaniwebModelBundle:UserCommentContext')->findAll();

        return new JsonResponse(array(
            'entities' => $entities
        ));
    }
    /**
     * Creates a new UserCommentContext entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\UserCommentContext");

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
     * Finds and displays a UserCommentContext entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:UserCommentContext')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserCommentContext entity.');
        }


        return new Response($this->serialize(array("entity" => $entity)));
    }

    /**
     * Edits an existing UserCommentContext entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:UserCommentContext')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserCommentContext entity.');
        }
        
        $updatedEntity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\UserCommentContext");

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
     * Deletes a UserCommentContext entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('PlaniwebModelBundle:UserCommentContext')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserCommentContext entity.');
        }

        $em->remove($entity);
        $em->flush();


        return new Response(null, 200);
    }

}
