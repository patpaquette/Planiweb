<?php

namespace Planiweb\RESTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Constraints\DateTime;


class HEntitiesController extends Controller
{
    public function __construct(){
        $this->serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
    }

    public function studentAddAction(Request $request){
        $student = json_decode($request->getContent());

        if(isset($student)){
            $type = $this->getDoctrine()->getRepository("PlaniwebRESTBundle:HumanEntityType")
                ->findOneBy(array('type' => 'student'));

            $newStudent = new \Planiweb\RESTBundle\Entity\HumanEntity();
            $newStudent->setLastName($student->lastName);
            $newStudent->setFirstName($student->firstName);
            $newStudent->setType($type);
            $newStudent->setBirthdate(new \DateTime($student->birthdate));
            $newStudent->setTelephoneNumber($student->telephoneNumber);
            $newStudent->setEmail($student->email);
            $newStudent->setSex($student->sex);

            $studentInfo = new \Planiweb\RESTBundle\Entity\StudentInfo();
            $studentInfo->setFatherName($student->fatherName);
            $studentInfo->setMotherName($student->motherName);
            $studentInfo->setStudent($newStudent);



            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($newStudent);
            $em->persist($studentInfo);
            $em->flush();


            return new Response("Success");
        }

        $response = new Response();
        $response->setStatusCode(400, "Input could not be validated");

        return $response;
    }

    public function studentsGetAllAction(){
        $studentType = $this->getDoctrine()
            ->getRepository('PlaniwebRESTBundle:HumanEntityType')
            ->findOneBy(array('type' => 'student'));

        $students = $this->getDoctrine()->getRepository("PlaniwebRESTBundle:HumanEntity")
            ->findByType($studentType->getId());

        $json = json_encode($students);

        $response = new Response();
        $response->setContent($json);
        return $response;
    }

    public function studentsGetAction($id){
        $student = $this->getDoctrine()->getRepository("PlaniwebRESTBundle:HumanEntity")
            ->findById($id);

        $response = new Response();

        if(isset($student)){
            $json = json_encode($student);
            $response->setStatusCode(200);
            $response->setContent($json);
            return $response;
        }

        $response->setStatusCode(404, "Not found");
        return $response;

    }

    public function teacherCommentAddAction(Request $request){
        //$comment = json_decode($request->request->get('json_data'));
        $comment = json_decode($request->getContent());
        $em = $this->getDoctrine()->getEntityManager();
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();

        if(isset($comment)){

            $student = $this->getDoctrine()->getRepository("PlaniwebRESTBundle:HumanEntity")
                ->findOneBy(array('id' => $comment->student_id));

            $user = $this->getDoctrine()->getRepository("PlaniwebRESTBundle:User")->findOneBy(array('id' => $user_id));

            if(!isset($student) || !isset($user)){
                $response = new Response();
                $response->setStatusCode(404, "Query failed.");
                return $response;
            }



            $newComment = new \Planiweb\RESTBundle\Entity\UserComment();
            $newComment->setText($comment->text);
            $newComment->setUser($user);
            $newComment->addHumanEntity($student);
            $newComment->setDate(new \DateTime('now'));


            $em->persist($newComment);
            $em->flush();

            return new Response("Success");

        }

        $response = new Response();
        $response->setStatusCode(400, "Input could not be validated");

        return $response;
    }

    public function teacherCommentGetAction(Request $request){
        $startDate = $request->request->get('startDate');
        $endDate = $request->request->get('endDate');
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();
        
        $em = $this->getDoctrine()->getEntityManager();
        $response = new Response();

        if(isset($startDate) && isset($endDate)){
            $startDate = new \DateTime($startDate . ' 00:00:00');//new \DateTime($date . ' 00:00:00');
            $endDate = new \DateTime($endDate . ' 23:59:59');//new \DateTime($date . ' 23:59:59');

            $commentsRepo = $this->getDoctrine()->getRepository("PlaniwebRESTBundle:UserComment");
            $qb = $commentsRepo->createQueryBuilder('c');

            $qry = $qb
                ->andwhere($qb->expr()->eq('c.user', ':teacher_id'))
                ->andwhere($qb->expr()->gt('c.date', ':dateStart'))
                ->andwhere($qb->expr()->lt('c.date', ':dateEnd'))
                ->setParameter('teacher_id', $user_id)
                ->setParameter('dateStart', $startDate)
                ->setParameter('dateEnd', $endDate)
                ->getQuery();

            try{
                $comments = $qry->getResult();
            }
            catch(\PDOException $e)
            {
                return $this->get('DBServices')->handleErrors($e);
            }
            
            if(count($comments) > 0){
                //$response->setContent($this->serializer->serialize($comments->toArray(), 'json'));
                $response->setContent(json_encode($comments));
            }

            $response->setStatusCode(200);
            return $response;
        }
        else{
            $comments = array();
            $user_comments= $this->getDoctrine()->getRepository('PlaniwebRESTBundle:User')
                ->findUserComments($user_id);
             

            $response->setStatusCode(200);
            $response->setContent(json_encode($user_comments));
            return $response;
        }
    }
}
