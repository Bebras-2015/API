<?php

namespace BebrasBundle\Helper;

use BebrasBundle\Entity\Repository\StudentRepository;
use BebrasBundle\Entity\Student;

/**
 * Class StatisticHelper
 */
class StatisticHelper
{
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
     * @return array
     */
    public function getStudentStatistics(Student $student)
    {
        $statistics = [];

        $maxScore = $this->repository->getMaxScoreByGroup($student->getGroup());

        $byGrade = $this->calculateStatistics($maxScore, $student->getScore());
        $statistics['by_grader'] = $byGrade;

        $maxScore = $this->repository->getMaxScore();

        $byAll = $this->calculateStatistics($maxScore, $student->getScore());
        $statistics['by_all'] = $byAll;

        return $statistics;
    }

    /**
     * @param float $maxScore
     * @param float $studentScore
     *
     * @return float
     */
    private function calculateStatistics($maxScore, $studentScore)
    {
        return ($studentScore / $maxScore) * 100;
    }
}
