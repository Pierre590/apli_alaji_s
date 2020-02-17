<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentsRepository")
 */
class Students
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Avatar;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trainer", inversedBy="students")
     */
    private $Trainer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Results", mappedBy="Students")
     */
    private $results;

    /**
     * @ORM\Column(type="integer")
     */
    private $Moodle_id;

    public function __construct()
    {
        $this->results = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(string $FullName): self
    {
        $this->FullName = $FullName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->Avatar;
    }

    public function setAvatar(string $Avatar): self
    {
        $this->Avatar = $Avatar;

        return $this;
    }

    public function getTrainer(): ?Trainer
    {
        return $this->Trainer;
    }

    public function setTrainer(?Trainer $Trainer): self
    {
        $this->Trainer = $Trainer;

        return $this;
    }

    /**
     * @return Collection|Results[]
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResult(Results $result): self
    {
        if (!$this->results->contains($result)) {
            $this->results[] = $result;
            $result->setStudents($this);
        }

        return $this;
    }

    public function removeResult(Results $result): self
    {
        if ($this->results->contains($result)) {
            $this->results->removeElement($result);
            // set the owning side to null (unless already changed)
            if ($result->getStudents() === $this) {
                $result->setStudents(null);
            }
        }

        return $this;
    }

    public function getMoodleId(): ?int
    {
        return $this->Moodle_id;
    }

    public function setMoodleId(int $Moodle_id): self
    {
        $this->Moodle_id = $Moodle_id;

        return $this;
    }
}
