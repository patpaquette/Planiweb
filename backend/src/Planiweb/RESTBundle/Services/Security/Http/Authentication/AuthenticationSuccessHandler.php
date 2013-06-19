<?php

namespace Planiweb\RESTBundle\Services\Security\Http\Authentication;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Doctrine\ORM\EntityManager;
use Planiweb\RESTBundle\Entity\User;

class AuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface{
	private $router;
	private $em;

	/**
	 * Constructor
	 * @param RouterInterface $router
	 * @param EntityManager $em
	 */
	public function __construct(RouterInterface $router, EntityManager $em){
		$this->router = $router;
		$this->em = $em;
	}

	/**
    * This is called when an interactive authentication attempt succeeds. This
    * is called by authentication listeners inheriting from AbstractAuthenticationListener.
    * @param Request        $request
    * @param TokenInterface $token
    * @return Response The response to return
    */
   function onAuthenticationSuccess(Request $request, TokenInterface $token){
   		$response = new Response();
   		$response->setStatusCode(200);
   		$response->setContent(json_encode($request->request->get('_target_path')));
   		return $response;
   }
}
