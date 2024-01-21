<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: QuestionAnswerOption::class)]
    private Collection $questionAnswerOptions;

    public function __construct()
    {
        $this->questionAnswerOptions = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     * @return Question
     */
    public function setText(?string $text): Question
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getQuestionAnswerOptions(): Collection
    {
        return $this->questionAnswerOptions;
    }
}