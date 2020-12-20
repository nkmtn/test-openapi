<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correct;

    /**
     * @ORM\ManyToOne(targetEntity=Task::class, inversedBy="answers")
     */
    private $taskId;

    /**
     * @ORM\OneToOne(targetEntity=Results::class, mappedBy="answerId", cascade={"persist", "remove"})
     */
    private $results;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCorrect(): ?string
    {
        return $this->correct;
    }

    public function setCorrect(string $correct): self
    {
        $this->correct = $correct;

        return $this;
    }

    public function getTaskId(): ?Task
    {
        return $this->taskId;
    }

    public function setTaskId(?Task $taskId): self
    {
        $this->taskId = $taskId;

        return $this;
    }

    public function getResults(): ?Results
    {
        return $this->results;
    }

    public function setResults(Results $results): self
    {
        // set the owning side of the relation if necessary
        if ($results->getAnswerId() !== $this) {
            $results->setAnswerId($this);
        }

        $this->results = $results;

        return $this;
    }
}
