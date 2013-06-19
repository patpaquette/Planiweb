<?php
namespace Planiweb\RESTBundle\Services;
use Planiweb\RESTBundle\Entity;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;


class DbServices{
    public function __construct(EntityManager $entityManager){
        $this->em = $entityManager;
    }

    public function addDefaultEntries(){
        $typeEtudiant = new \Planiweb\RESTBundle\Entity\HumanEntityType();
        $typeEtudiant->setType("student");

        $typeEnseignant = new \Planiweb\RESTBundle\Entity\HumanEntityType();
        $typeEnseignant-> setType("teacher");

        $roleUser = new \Planiweb\RESTBundle\Entity\Role();
        $roleUser->setRole("user");

        $roleAdmin = new \Planiweb\RESTBundle\Entity\Role();
        $roleAdmin->setRole("admin");


        $this->em->persist($typeEtudiant);
        $this->em->persist($typeEnseignant);
        $this->em->persist($roleAdmin);
        $this->em->persist($roleUser);
        $this->em->flush();
    }

    public function insertHumanEntity($firstname, $lastname, $type){

        $entity = new \Planiweb\RESTBundle\Entity\HumanEntity();
        $entity->setFirstName($firstname);
        $entity->setLastName($lastname);

    }

    public function handleErrors(\PDOException $e){
        $response = new Response();

        if($e->getCode() == '23000')
        {
            $response->setStatusCode(404, "Duplicate");
            return $response;
        }
    }
}

?>
