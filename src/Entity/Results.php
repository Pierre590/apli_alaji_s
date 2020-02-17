<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResultsRepository")
 */
class Results
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Criteria", inversedBy="results")
     */
    private $Criteria;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Students", inversedBy="results")
     */
    private $Students;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Test;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Interviews;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCriteria(): ?Criteria
    {
        return $this->Criteria;
    }

    public function setCriteria(?Criteria $Criteria): self
    {
        $this->Criteria = $Criteria;

        return $this;
    }

    public function getStudents(): ?Students
    {
        return $this->Students;
    }

    public function setStudents(?Students $Students): self
    {
        $this->Students = $Students;

        return $this;
    }

    public function getTest(): ?int
    {
        return $this->Test;
    }

    public function setTest(int $Test): self
    {
        $this->Test = $Test;

        return $this;
    }

    public function getInterviews(): ?int
    {
        return $this->Interviews;
    }

    public function setInterviews(int $Interviews): self
    {
        $this->Interviews = $Interviews;

        return $this;
    }
}
