<?php

namespace BebrasBundle\Util;

/**
 * @author Tadas Gliaubicas
 */
final class StudentUtil
{
    /**
     * @param int $grade
     *
     * @return string
     */
    public static function getGroup($grade)
    {
        switch ($grade) {
            case 3:
            case 4:
                return 'Mažyliai';
            case 5:
            case 6:
                return 'Bičiuliai';
            case 7:
            case 8:
                return 'Draugai';
            case 9:
            case 10:
                return 'Jauniai';
            default:
                return 'Kolegos';
        }
    }
}
