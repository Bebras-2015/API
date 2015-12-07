<?php

namespace BebrasBundle\Factory;

use BebrasBundle\Entity\Student;

/**
 * @author Tadas Gliaubicas
 */
class StudentFactory 
{
    /**
     * @param array $data
     *
     * @return Student
     */
    public static function createFromArray(array $data)
    {
        return new Student($data['full_name'], $data['school'], $data['score']);
    }
}
 