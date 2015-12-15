<?php

namespace BebrasBundle\Entity\Repository;

use BebrasBundle\Entity\Student;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * @author Tadas Gliaubicas
 */
class StudentRepository extends EntityRepository
{
    /**
     * @return float
     */
    public function getMaxScore()
    {
        $qb = $this->createQueryBuilder('s');

        $qb
            ->select('MAX(s.score)');

        try {
            return $qb->getQuery()->getSingleScalarResult();
        } catch (NoResultException $e) {
        }

        return 0;
    }

    /**
     * @param string $group
     *
     * @return float
     */
    public function getMaxScoreByGroup($group)
    {
        $qb = $this->createQueryBuilder('s');

        $qb
            ->select('MAX(s.score)')
            ->where($qb->expr()->eq('s.group', ':group'))
            ->setParameter('group', $group);

        try {
            return $qb->getQuery()->getSingleScalarResult();
        } catch (NoResultException $e) {
        }

        return 0;
    }
}
