<?php

namespace BebrasBundle\Controller;

use BebrasBundle\Entity\Repository\StudentRepository;
use BebrasBundle\Entity\Student;
use BebrasBundle\Factory\StudentStatisticFactory;
use BebrasBundle\Model\StudentStatistic;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use Symfony\Component\HttpFoundation\Response;
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
     * @return array
     */
    public function getStudentsAction()
    {
        $students = $this->getRepository()->findAll();

        return $this->createResponse($students);
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

        return $this->createResponse($student);
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
     * @return StudentStatistic
     *
     * @throws NotFoundHttpException
     */
    public function getStudentStatisticsAction($id)
    {
        $student = $this->getStudentOr404($id);
        $statistic = $this->getStatisticFactory()->create($student);

        return $this->createResponse($statistic);
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

    /**
     * @return StudentStatisticFactory
     */
    private function getStatisticFactory()
    {
        return $this->container->get('bebras.factory.student_statistic');
    }

    /**
     * @param $data
     *
     * @return Response
     */
    private function createResponse($data)
    {
        $data = $this->container->get('serializer')->serialize($data, 'json');

        return new Response($data, 201, array('Access-Control-Allow-Origin' => '*', 'Content-Type' => 'application/json'));
    }
}
