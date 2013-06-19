<?php

namespace Planiweb\ModelBundle\Controller\Common;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ModelController extends Controller
{
    protected $_validator;
    protected $_serializer;
    protected $_modelNamespace;

    public function __construct()
    {
        $this->_modelNamespace = "PlaniwebModelBundle";
    }

    protected function getEntity($entityName, $constraints = array())
    {
        return $this->getDoctrine()->getRepository($this->_modelNamespace . ":" . $entityName)->findOneBy($constraints);
    }

    protected function getEntityById($entityName, $id)
    {
        return $this->getEntity($entityName, array("id" => $id));
    }

    protected function getEntities($entityName, $constraints = array())
    {
        return $this->getDoctrine()->getRepository($_modelNamespace . ":" . $entityName)->find($constraints);
    }

    protected function validate($entity)
    {
        $validator = $this->get('validator');
        return $validator->validate($entity);
    }

    protected function serialize($entity, $format = 'json')
    {
        $serializer = $this->get('jms_serializer');
        return $serializer->serialize($entity, $format);
    }

    protected function deserialize($content, $class, $format = 'json')
    {
        $serializer = $this->get('jms_serializer');
        return $serializer->deserialize($content, $class, $format);
    }
}