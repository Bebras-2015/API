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

    /**
     * @param float $grade
     *
     * @return array
     */
    public function getStudentsByGrade($grade)
    {
        $qb = $this->createQueryBuilder('s');

        $qb
            ->select('s.score')
            ->where('s.grader = :grade')
            ->setParameter('grade', $grade);

        return $qb->getQuery()->getResult();
    }

    /**
     * @param string $school
     *
     * @return array
     */
    public function getStudentsBySchool($school)
    {
        $qb = $this->createQueryBuilder('s');

        $qb
            ->select('s.score')
            ->where('s.school = :school')
            ->setParameter('school', $school);

        return $qb->getQuery()->getResult();
    }
}
