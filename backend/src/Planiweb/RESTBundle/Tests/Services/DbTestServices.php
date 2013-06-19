<?php

namespace Planiweb\RESTBundle\Tests\Services;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Planiweb\RESTBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Planiweb\RESTBundle\Services\DbServices;

class DbTestServices
{
	public function __construct(DbServices $dbServices, EntityManager $em)
	{
		$this->_dbServices = $dbServices;
		$this->_em = $em;
	}

	public function addDefaultValues(){
        $this->_dbServices->addDefaultEntries();
    }

    public function populateDB(){
        $this->addDefaultValues();

        $teacher = $this->addTeacher();
        $student = $this->addStudent();

        $this->addTeacherComment($teacher, $student);

        echo "Database populated\n";
    }

    public function addTeacherComment($teacher, $student){
        $em = $this->_em;

        $teacherComment = new \Planiweb\RESTBundle\Entity\UserComment();
        $teacherComment->setText("Test");
        $teacherComment->addHumanEntity($student);
        $teacherComment->setUser($teacher);
        $teacherComment->setDate(new \DateTime('now'));
        $em->persist($teacherComment);
        $em->flush();
    }

    public function addTeacher(){
        $em = $this->_em;

        $typeTeacher = $em->getRepository("PlaniwebRESTBundle:HumanEntityType")
            ->findOneBy(array('type' => 'teacher'));
        

        $teacher = new \Planiweb\RESTBundle\Entity\HumanEntity();
        $teacher->setFirstName("Julie");
        $teacher->setLastName("Kingsley");
        $teacher->setType($typeTeacher);
        $teacher->setSex('f');
        $teacher->setBirthdate(new \DateTime('1987/05/08'));

        $user = new \Planiweb\RESTBundle\Entity\User();
        $user->setUsername("admin");
        $user->setPassword("asdf");
        $user->setHumanEntity($teacher);

        $em->persist($teacher);
        $em->persist($user);
        $em->flush();

        return $this->_em->getRepository('PlaniwebRESTBundle:User')
            ->findOneBy(array('username' => 'admin'));
    }
    public function addStudent(){
        $em = $this->_em;

        $typeStudent = $this->_em->getRepository("PlaniwebRESTBundle:HumanEntityType")
            ->findOneBy(array('type' => 'student'));

        $student = new \Planiweb\RESTBundle\Entity\HumanEntity();
        $student->setFirstName("Patrice");
        $student->setLastName("Paquette");
        $student->setType($typeStudent);
        $student->setSex('m');
        $student->setBirthdate(new \DateTime('1987/05/08'));
        $em->persist($student);
        $em->flush();

        return $this->_em->getRepository('PlaniwebRESTBundle:HumanEntity')
            ->findOneBy(array('first_name' => 'Patrice'));
    }

}



