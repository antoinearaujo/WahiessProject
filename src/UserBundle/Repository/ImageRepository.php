<?php

namespace UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ImageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImageRepository extends EntityRepository
{
		public function getAll()
	{
		$qb = $this->createQueryBuilder('s');

		$result = $qb->getQuery()->execute();

		return $result;
	}
}