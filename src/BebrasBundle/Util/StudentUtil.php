<?php

namespace BebrasBundle\Util;

/**
 * @author Tadas Gliaubicas
 */
final class StudentUtil
{
    /**
     * @param int $grader
     *
     * @return string
     */
    public static function getGroup($grader)
    {
        switch ($grader) {
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
 