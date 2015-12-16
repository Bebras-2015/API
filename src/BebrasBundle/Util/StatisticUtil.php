<?php

namespace BebrasBundle\Util;

/**
 * @author Tadas Gliaubicas
 */
final class StatisticUtil
{
    /**
     * @param float $maxScore
     * @param float $studentScore
     *
     * @return float
     */
    public static function calculate($maxScore, $studentScore)
    {
        return ($studentScore / $maxScore) * 100;
    }
}
 