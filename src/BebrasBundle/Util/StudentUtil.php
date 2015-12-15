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
        if (3 === $grader || 4 === $grader) {
            return 'Mažyliai';
        }

        if (5 === $grader || 6 === $grader) {
            return 'Bičiuliai';
        }

        if (7 === $grader || 8 === $grader) {
            return 'Draugai';
        }

        if (9 === $grader || 10 === $grader) {
            return 'Jauniai';
        }

        return 'Kolegos';
    }
}
 