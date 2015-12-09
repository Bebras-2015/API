<?php

namespace BebrasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * @author Tadas Gliaubicas
 *
 * @ExclusionPolicy("all")
 * @XmlRoot("student")
 *
 * @ORM\Table(name="bebras_student")
 * @ORM\Entity(repositoryClass="BebrasBundle\Entity\Repository\StudentRepository")
 */
class Student 
{
    /**
     * @var int
     *
     * @Expose
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Expose
     *
     * @ORM\Column(name="full_name", type="string", length=255, nullable=false)
     */
    private $fullName;

    /**
     * @var string
     *
     * @Expose
     *
     * @ORM\Column(name="school", type="text", nullable=false)
     */
    private $school;

    /**
     * @var int
     *
     * @Expose
     *
     * @ORM\Column(name="grander", type="smallint", nullable=false)
     */
    private $grader;

    /**
     * @var float
     *
     * @Expose
     *
     * @ORM\Column(name="score", type="decimal", precision=4, scale=2, nullable=false)
     */
    private $score;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * Constructor.
     *
     * @param string $fullName
     * @param string $school
     * @param int $grader
     * @param float $score
     */
    public function __construct($fullName, $school, $grader, $score)
    {
        $this->fullName = $fullName;
        $this->school = $school;
        $this->grader = $grader;
        $this->score = $score;

        $this->createdAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @return int
     */
    public function getGrader()
    {
        return $this->grader;
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return $this
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }
}
