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
    private $byGrander;

    /**
     * Constructor.
     *
     * @param float $byAll
     * @param float $byGrander
     */
    public function __construct($byAll, $byGrander)
    {
        $this->byAll = $byAll;
        $this->byGrander = $byGrander;
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
    public function getByGrander()
    {
        return $this->byGrander;
    }
}
