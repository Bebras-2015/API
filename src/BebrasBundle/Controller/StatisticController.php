<?php

namespace BebrasBundle\Controller;

use BebrasBundle\Entity\Repository\StudentRepository;
use BebrasBundle\Entity\Student;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class StatisticController
 *
 * @package BebrasBundle\Controller
 */
class StatisticController extends FOSRestController
{

    /**
     * Get statistic for student.
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the statistic failed"
     *   }
     * )
     *
     * @param int $id
     *
     * @return array
     *
     * @throws NotFoundHttpException
     */
    public function getStudentStatistic()
    {
        $student = $this->getStudentOr404($id);

        return $student;
    }

    /**
     * @return StudentRepository
     */
    private function getRepository()
    {
        return $this->container->get('bebras.repository.student');
    }

    /**
     * @param int $studentId
     *
     * @return Student
     *
     * @throws NotFoundHttpException
     */
    private function getStudentOr404($studentId)
    {
        $student = $this->getRepository()->find($studentId);

        if (null === $student) {
            throw $this->createNotFoundException("Student does not exist.");
        }

        return $student;
    }
}
