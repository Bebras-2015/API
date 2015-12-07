<?php

namespace BebrasBundle\Entity\Repository;

use BebrasBundle\Entity\Student;
use Doctrine\ORM\EntityRepository;

/**
 * @author Tadas Gliaubicas
 */
class StudentRepository extends EntityRepository
{
    /**
     * @param int $offset
     * @param int $limit
     *
     * @return array|Student[]
     */
    public function getStudents($offset, $limit)
    {
        $qb = $this->createQueryBuilder('s');

        $qb
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }
}
 