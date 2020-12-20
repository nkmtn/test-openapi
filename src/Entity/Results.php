<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ResultsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ResultsRepository::class)
 */
class Results
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TryTest::class, inversedBy="taskId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tryTestId;

    /**
     * @ORM\OneToOne(targetEntity=Answer::class, inversedBy="results", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $answerId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTryTestId(): ?TryTest
    {
        return $this->tryTestId;
    }

    public function setTryTestId(?TryTest $tryTestId): self
    {
        $this->tryTestId = $tryTestId;

        return $this;
    }

    public function getAnswerId(): ?Answer
    {
        return $this->answerId;
    }

    public function setAnswerId(Answer $answerId): self
    {
        $this->answerId = $answerId;

        return $this;
    }
}
