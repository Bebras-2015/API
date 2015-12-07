<?php

namespace BebrasBundle\Entity\Saver;

use BebrasBundle\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @author Tadas Gliaubicas
 */
class StudentSaver 
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * Constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param array|Student[] $students
     */
    public function saveAll(array $students)
    {
        foreach ($students as $student) {
            $this->em->persist($student);
        }

        $this->em->flush();
    }
}
