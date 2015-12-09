<?php

namespace BebrasBundle\Tests\Reader;

use BebrasBundle\Reader\XlsxStudentReader;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * @author Tadas Gliaubicas
 */
class XlsxStudentReaderTest extends TestCase
{
    public function testRead_v1()
    {
        $reader = $this->createReader();

        $students = $reader->read(__DIR__ . '/../MockFiles/students-v1.xlsx');

        $this->assertCount(5, $students);

        foreach ($students as $key => $student) {
            $index = $key + 1;

            $this->assertEquals('Moksleivis ' . $index, $student->getFullName());
            $this->assertEquals('Mokykla ' . $index, $student->getSchool());
            $this->assertEquals($index, $student->getGrader());
            $this->assertEquals($index, $student->getScore());
        }
    }

    private function createReader()
    {
        return new XlsxStudentReader();
    }
}
