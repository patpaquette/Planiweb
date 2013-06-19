<?php

namespace Planiweb\RESTBundle\Tests\Controller;

use Symfony\Component\HttpFoundation\Request;
use Planiweb\RESTBundle\Controller\HEntitiesController;
use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;
use Planiweb\RESTBundle\Tests;
use Symfony\Component\Validator\Constraints\DateTime;

require_once(__DIR__ . '/../../../../../app/AppKernel.php');

class RestServicesControllerTest extends \Planiweb\RESTBundle\Tests\ModelTestCase
{

    public function __construct(){
        parent::__construct();
        $this->controller = new HEntitiesController();
        
    }

    public function testStudentAddAction()
    {
        $this->_DbTestServices->addDefaultValues();

        $this->controller->setContainer($this->getContainer());


        $request = new Request(
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            json_encode(array(
            'lastName' => 'Paquette',
            'firstName' => 'Patrice',
            'birthdate' => '1987/05/08',
            'telephoneNumber' => '819-328-4505',
            'email' => 'asdf@gmail.com',
            'sex' => 'm',
            'fatherName' => 'Philippe Paquette',
            'motherName' => 'Huy Nguyen'
            )));
        
        $request->setMethod('POST');

        $this->controller->studentAddAction($request);

        $em = $this->getContainer()->get('Doctrine')->getEntityManager();
        $query = $em->createQuery('SELECT COUNT(student.id) FROM \Planiweb\RESTBundle\Entity\HumanEntity student');
        $count = $query->getSingleScalarResult();

        $this->assertEquals(1, $count);
    }

    public function testStudentGetAllAction(){
        $this->_DbTestServices->populateDB();


        $this->controller->setContainer($this->getContainer());

        $request = Request::createFromGlobals();
        $request->setMethod('GET');

        $response = $this->controller->studentsGetAllAction();

        $students = json_decode($response->getContent());

        $this->assertGreaterThan(0, count($students));
    }

    public function testStudentGetAction(){
        $this->_DbTestServices->populateDB();


        $this->controller->setContainer($this->getContainer());

        $request = Request::createFromGlobals();
        $request->setMethod('GET');

        $response = $this->controller->studentsGetAction(1);

        $students = json_decode($response->getContent());

        $this->assertGreaterThan(0, count($students));
    }

    public function testTeacherCommentAddAction(){
        $this->_DbTestServices->populateDB();
        $this->createClientWithAuthentication();

        $em = $this->getContainer()->get('Doctrine')->getEntityManager();
        $this->controller->setContainer($this->getContainer());

        $student = $this->getContainer()->get("Doctrine")->getRepository("PlaniwebRESTBundle:HumanEntity")
            ->findOneBy(array('first_name' => 'Patrice'));

        $teacher = $this->getContainer()->get("Doctrine")->getRepository("PlaniwebRESTBundle:HumanEntity")
            ->findOneBy(array('first_name' => 'Julie'));

        $request = new Request(
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            json_encode(array(
                'text' => 'testTeacherCommentAdd',
                'student_id' => $student->getId(),
                'teacher_id' => $teacher->getId(),
                ''))
        );
        
        $request->setMethod('POST');

        $this->controller->teacherCommentAddAction($request);

        $query = $em->createQuery("SELECT COUNT(comment.id) FROM \Planiweb\RESTBundle\Entity\UserComment comment WHERE comment.text = 'testTeacherCommentAdd'");
        $count = $query->getSingleScalarResult();

        $this->assertEquals(1, $count);
    }

    public function testTeacherCommentsGetAction(){
        //$this->populateDB();
        $em = $this->getContainer()->get("Doctrine")->getEntityManager();
        $this->_DbTestServices->addDefaultValues();  
        $student = $this->_DbTestServices->addStudent();
        $teacher = $this->_DbTestServices->addTeacher();
        $this->createClientWithAuthentication();

        $this->controller->setContainer($this->getContainer());

        $now = new \DateTime('now');
        /*$request = new Request(
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            json_encode(array(
                    'teacher_id' => $teacher->getId(),
                    'startDate' => $now->format('Y-m-d'),
                    'endDate' => $now->format('Y-m-d')
                    ))
            );*/
        

        $request = new Request();

        $request->setMethod('GET');

        $comments = json_decode($this->controller->teacherCommentGetAction($request)->getContent(), true);

        $this->assertEquals(0, count($comments), "Check when no comments were added");

        $this->_DbTestServices->addTeacherComment($teacher, $student);

        $comments = json_decode($this->controller->teacherCommentGetAction($request)->getContent(), true);

        $this->assertGreaterThan(0, count($comments), "Check when comments were added, but with no arguments");

        $request->request->add(array(
            'startDate' => $now->format('Y-m-d'),
            'endDate' => $now->format('Y-m-d')
            ));

        $comments = json_decode($this->controller->teacherCommentGetAction($request)->getContent(), true);

        $this->assertGreaterThan(0, count($comments), "With arguments");
    }

}
