<?php

namespace Planiweb\RESTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DbServicesController extends Controller
{
    public function initDbAction(){
        $dbServices = $this->get("DbServices");
        $dbServices->addDefaultEntries();

        return new Response("Success");
    }
}
