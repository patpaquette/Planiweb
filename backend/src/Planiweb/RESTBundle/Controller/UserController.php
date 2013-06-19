<?php

namespace Planiweb\RESTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Planiweb\ModelBundle\Entity\User;
use Planiweb\ModelBundle\Entity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * User controller.
 *
 * @Method("POST")
 * @Route("/user")
 */
class UserController extends Controller
{
    public function userCreateAction(Request $request)
    {
        $user = json_decode($request->getContent());

        if(isset($user) && isset($user->info))
        {   
            $role = $this->getDoctrine()->getRepository("PlaniwebModelBundle:Role")->findOneBy(array('name' => 'user'));

            $userInfo = new Entity\HumanEntityInfo(
                $user->info->first_name,
                $user->info->last_name,
                $user->info->sex,
                new \DateTime($user->info->birthdate),
                $user->info->email,
                $user->info->telephone_number,
                $user->info->cell_number
            );

            
            $newUser = new User(
                $user->username, 
                $user->password, 
                $role,
                $userInfo
            );
            

            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            $em->flush();

            return new JsonResponse(null, 200);
        }

        return new JsonResponse(null, 400);
    }
}
