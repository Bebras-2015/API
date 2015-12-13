<?php

namespace BebrasBundle\Controller;

use BebrasBundle\Entity\Repository\StudentRepository;
use BebrasBundle\Entity\Student;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Tadas Gliaubicas
 */
class StudentController extends FOSRestController
{

    /**
     * List all students.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to
     *                                        start listing students.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="10", description="How many students to
     *                                       return.")
     *
     * @param ParamFetcherInterface $paramFetcher
     *
     * @return array
     */
    public function getStudentsAction(ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $limit = $paramFetcher->get('limit');

        $students = $this->getRepository()->getStudents($offset, $limit);

        return $students;
    }

    /**
     * Get a single student.
     *
     * @ApiDoc(
     *   output = "BebrasBundle\Entity\Student",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the student is not found"
     *   }
     * )
     *
     * @param int $id
     *
     * @return array
     *
     * @throws NotFoundHttpException
     */
    public function getStudentAction($id)
    {
        $student = $this->getStudentOr404($id);

        return $student;
    }

    /**
     * Get statistics for single student.
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the student was not found"
     *   }
     * )
     *
     * @param int $id
     *
     * @return array
     *
     * @throws NotFoundHttpException
     */
    public function getStudentStatisticsAction($id)
    {
        $student = $this->getStudentOr404($id);

        $statistics = $this->getStatisticHelper()->getStudentStatistics($student);

        return $statistics;
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

    private function getStatisticHelper()
    {
        return $this->container->get('bebras.helper.statistic');
    }
}
