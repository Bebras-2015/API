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

        $scoresByGrade = $this->repository->getStudentsByGrade($student->getGrader());

        $byGrade = $this->calculateStatistics($scoresByGrade, $student->getScore());
        $statistics['by_grade'] = $byGrade;

        $scoresBySchool = $this->repository->getStudentsBySchool($student->getSchool());

        $bySchool = $this->calculateStatistics($scoresBySchool, $student->getScore());
        $statistics['by_school'] = $bySchool;

        return $statistics;
    }

    /**
     * @param array $scores
     * @param float $studentScore
     *
     * @return float
     */
    private function calculateStatistics(array $scores, $studentScore)
    {
        if (1 === count($scores)) {
            return 100;
        }

        $betterThan = 0;
        foreach ($scores as $score) {
            if ($studentScore > $score['score']) {
                $betterThan++;
            }
        }

        return ($betterThan / (count($scores) - 1)) * 100;
    }
}
