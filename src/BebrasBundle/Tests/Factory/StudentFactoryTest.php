<?php

namespace BebrasBundle\Tests\Factory;

use BebrasBundle\Factory\StudentFactory;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * @author Tadas Gliaubicas
 */
class StudentFactoryTest extends TestCase
{
    public function testCreateFromArray()
    {
        $data = ['full_name' => 'Test full name', 'school' => 'Test school', 'grade' => 9, 'score' => 1];
        $student = StudentFactory::createFromArray($data);

        $this->assertEquals($data['full_name'], $student->getFullName());
        $this->assertEquals($data['school'], $student->getSchool());
        $this->assertEquals($data['grade'], $student->getGrade());
        $this->assertEquals($data['score'], $student->getScore());
    }
}
