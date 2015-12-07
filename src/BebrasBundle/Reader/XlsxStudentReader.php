<?php

namespace BebrasBundle\Reader;

use BebrasBundle\Entity\Student;
use BebrasBundle\Factory\StudentFactory;

/**
 * @author Tadas Gliaubicas
 */
class XlsxStudentReader
{
    /**
     * @param string $filePath
     *
     * @return array|Student[]
     */
    public function read($filePath)
    {
        $students = [];
        $objPHPExcel = \PHPExcel_IOFactory::load($filePath);

        /** @var \PHPExcel_Worksheet $worksheet */
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            /** @var \PHPExcel_Worksheet_Row $row */
            foreach ($worksheet->getRowIterator() as $row) {
                if (1 === $row->getRowIndex()) {
                    continue;
                }

                $data = [];

                /** @var \PHPExcel_Cell $cell */
                foreach ($row->getCellIterator('A', 'C') as $cell) {
                    switch ($cell->getColumn()) {
                        case 'A':
                            $data['full_name'] = $cell->getValue();
                            break;
                        case 'B':
                            $data['school'] = $cell->getValue();
                            break;
                        case 'C':
                            $data['score'] = $cell->getValue();
                            break;
                    }
                }

                $students[] = StudentFactory::createFromArray($data);
            }
        }

        return $students;
    }
}
