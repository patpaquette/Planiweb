<?php

namespace Planiweb\ModelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Exception\FormException;
use JMS\Serializer\SerializerBuilder;

use Planiweb\ModelBundle\Entity\User;
use Planiweb\ModelBundle\Form\UserType;
use Planiweb\ModelBundle\Controller\Common\ModelController;

/**
 * User controller.
 *
 */
class UserController extends ModelController
{

    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PlaniwebModelBundle:User')->findAll();

        return new JsonResponse(array(
            'entities' => $entities
        ));
    }
    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
        $role = $this->getEntity("Role", array('name' => 'user'));

        $entity = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\User");
        $entity->setRole($role);

        $errors = $this->validate($entity);

        if(count($errors) == 0)
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return new JsonResponse(array('id' => $entity->getId()));
        }

        return new JsonResponse(null, 400);
    }


    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        return new Response($this->serialize(array("entity" => $entity)));
    }


    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PlaniwebModelBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $user = $this->deserialize($request->getContent(), "Planiweb\ModelBundle\Entity\User");

        $uid = $user->getId();
        if(!isset($uid))
        {
            return new Response(null, 400);
        }

        $em->persist($user);
        $em->flush();

        return new JsonResponse(array('id' => $user->getId()));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('PlaniwebModelBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $em->remove($entity);
        $em->flush();

        return new Response(null, 200);
    }
}
