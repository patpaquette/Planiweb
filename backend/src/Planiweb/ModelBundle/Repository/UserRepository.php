<?php
namespace Planiweb\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
	public function findUserComments($user_id)
	{
		$query = $this->getEntityManager()
			->createQuery(
				"SELECT u, c FROM PlaniwebModelBundle:UserComment c
				JOIN c.user u
				WHERE u.id = :id"
			)->setParameter('id', $user_id);

		try
		{
			return $query->getResult();
		}
		catch(\Doctrine\ORM\NoResultException $e)
		{
			return null;
		}
	}
}
