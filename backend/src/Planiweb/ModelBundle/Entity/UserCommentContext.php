<?php

namespace Planiweb\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planiweb\ModelBundle\Entity\UserCommentContext
 * @ORM\Entity(repositoryClass="Planiweb\ModelBundle\Repository\UserCommentContextRepository")
 */

class UserCommentContext
{
	/**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\Column(length=11)
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var Planiweb\ModelBundle\Entity\User $user
     *
     * @ORM\ManyToOne(targetEntity="User")
     */
    protected $user;

    /**
     * @var string $context
     * 
     * @ORM\Column(length=255, unique=true)
     */
    protected $context;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get User
     *
     * @return Planiweb\ModelBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set User
     *
     * @param Planiweb\ModelBundle\Entity\User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Set context
     *
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * Get context
     *
     * @return string 
     */
    public function getContext()
    {
        return $this->context;
    }
}