<?php

namespace Planiweb\RESTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Constraints\DateTime;
use Planiweb\ModelBundle\Entity;

class SecurityController extends controller{
    public function __construct(){
        $this->serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
    }

    public function isLoggedAction()
    {
        $response = new Response();
       

        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            // authenticated (NON anonymous)
            $response->setStatusCode(200);
            return $response;
        }

        $response->setStatusCode(401);
        return $response;
    }

    public function loginAction(Request $request){
		$response = new Response();
        $response->setStatusCode(401);

		return $response;
    }

    public function logoutAction(){
        $this->get('security.context')->setToken(null);
        $this->get('request')->getSession()->invalidate();

        $response = new Response();
        $response->setStatusCode(401);
        return $response;
    }

    public function createAccountAction(Request $request){
        $accountData = json_decode($request->getContent());
        $response = new Response();

        if(isset($accountData)){
            $typeHE = $this->getDoctrine()
                ->getRepository('Planiweb\RESTBundle\Entity\HumanEntityType')
                ->findOneBy(array('type' => 'teacher'));

            $role = $this->getDoctrine()
                ->getRepository('Planiweb\RESTBundle\Entity\Role')
                ->findOneBy(array('role' => 'user'));

            if(isset($typeHE) && isset($role)){
                try{
                    $newHE = new Entity\HumanEntity();
                    $newHE->setFirstName($accountData->firstname);
                    $newHE->setLastName($accountData->lastname);
                    $newHE->setType($typeHE);

                    $newUser = new Entity\User();
                    $newUser->setUsername($accountData->username);
                    $newUser->setPassword($accountData->password);
                    $newUser->setRole($role);
                    $newUser->setHumanEntity($newHE);

                    $em = $this->getDoctrine()->getEntityManager();
                    $em->persist($newHE);
                    $em->persist($newUser);
                    $em->flush();
                }
                catch(\PDOException $e)
                {
                    return $this->get('DBServices')->handleErrors($e);
                }

                $response->setStatusCode(200, "Success");
                return $response;
            }

            $response->setStatusCode(404, "Query failed");
            return $response;

       }

        $response->setStatusCode(400, "Input could not be validated");
        return $response;
    }

}
