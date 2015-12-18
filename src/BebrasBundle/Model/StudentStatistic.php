<?php

namespace BebrasBundle\Model;

/**
 * @author Tadas Gliaubicas
 */
class StudentStatistic 
{
    /**
     * @var float
     */
    private $byAll;

    /**
     * @var float
     */
    private $byGrade;

    /**
     * Constructor.
     *
     * @param float $byAll
     * @param float $byGrade
     */
    public function __construct($byAll, $byGrade)
    {
        $this->byAll = $byAll;
        $this->byGrade = $byGrade;
    }

    /**
     * @return float
     */
    public function getByAll()
    {
        return $this->byAll;
    }

    /**
     * @return float
     */
    public function getByGrade()
    {
        return $this->byGrade;
    }
}
