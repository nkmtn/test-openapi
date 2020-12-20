<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
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
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="tests")
     */
    private $categoryId;

    /**
     * @ORM\OneToMany(targetEntity=Task::class, mappedBy="testId", orphanRemoval=true)
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity=TryTest::class, mappedBy="testId")
     */
    private $tryTests;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
        $this->tryTests = new ArrayCollection();
    }

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

    public function getCategoryId(): ?Category
    {
        return $this->categoryId;
    }

    public function setCategoryId(?Category $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setTestId($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getTestId() === $this) {
                $task->setTestId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TryTest[]
     */
    public function getTryTests(): Collection
    {
        return $this->tryTests;
    }

    public function addTryTest(TryTest $tryTest): self
    {
        if (!$this->tryTests->contains($tryTest)) {
            $this->tryTests[] = $tryTest;
            $tryTest->setTestId($this);
        }

        return $this;
    }

    public function removeTryTest(TryTest $tryTest): self
    {
        if ($this->tryTests->removeElement($tryTest)) {
            // set the owning side to null (unless already changed)
            if ($tryTest->getTestId() === $this) {
                $tryTest->setTestId(null);
            }
        }

        return $this;
    }
}
