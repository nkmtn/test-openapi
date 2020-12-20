<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TryTestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TryTestRepository::class)
 */
class TryTest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEnd;

    /**
     * @ORM\ManyToOne(targetEntity=Test::class, inversedBy="tryTests")
     */
    private $testId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tryTests")
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity=Results::class, mappedBy="tryTestId", orphanRemoval=true)
     */
    private $results;

    public function __construct()
    {
        $this->results = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getTestId(): ?Test
    {
        return $this->testId;
    }

    public function setTestId(?Test $testId): self
    {
        $this->testId = $testId;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection|Results[]
     */
    public function getResults(): Collection
    {
        return $this->results;
    }

    public function addResults(Results $results): self
    {
        if (!$this->results->contains($results)) {
            $this->results[] = $results;
            $results->setTryTestId($this);
        }

        return $this;
    }

    public function removeResults(Results $results): self
    {
        if ($this->results->removeElement($results)) {
            // set the owning side to null (unless already changed)
            if ($results->getTryTestId() === $this) {
                $results->setTryTestId(null);
            }
        }

        return $this;
    }
}
