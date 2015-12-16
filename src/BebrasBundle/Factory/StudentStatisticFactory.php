<?php

namespace BebrasBundle\Factory;

use BebrasBundle\Entity\Repository\StudentRepository;
use BebrasBundle\Entity\Student;
use BebrasBundle\Model\StudentStatistic;
use BebrasBundle\Util\StatisticUtil;

/**
 * @author Tadas Gliaubicas
 */
class StudentStatisticFactory 
{
    /**
     * @var StudentRepository
     */
    private $repository;

    /**
     * Constructor.
     *
     * @param StudentRepository $repository
     */
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Student $student
     *
     * @return StudentStatistic
     */
    public function create(Student $student)
    {
        $byGrade = StatisticUtil::calculate(
            $this->repository->getMaxScoreByGroup($student->getGroup()),
            $student->getScore()
        );
        $byAll = StatisticUtil::calculate($this->repository->getMaxScore(), $student->getScore());

        return new StudentStatistic($byAll, $byGrade);
    }
}
