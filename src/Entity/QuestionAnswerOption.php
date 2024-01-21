<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class QuestionAnswerOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\Column]
    private ?bool $isRight = null;

    #[ORM\ManyToOne(targetEntity: Question::class, inversedBy: 'questionAnswerOptions')]
    private Question $question;

    #[ORM\ManyToMany(targetEntity: QuestionAnswer::class, mappedBy: 'questionAnswerOptions')]
    private Collection $questionAnswers;

    public function __construct()
    {
        $this->questionAnswers = new ArrayCollection();
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
     * @return QuestionAnswerOption
     */
    public function setText(?string $text): QuestionAnswerOption
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsRight(): ?bool
    {
        return $this->isRight;
    }

    /**
     * @param bool|null $isRight
     * @return QuestionAnswerOption
     */
    public function setIsRight(?bool $isRight): QuestionAnswerOption
    {
        $this->isRight = $isRight;

        return $this;
    }

    /**
     * @return Question
     */
    public function getQuestion(): Question
    {
        return $this->question;
    }

    /**
     * @param Question $question
     * @return QuestionAnswerOption
     */
    public function setQuestion(Question $question): QuestionAnswerOption
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getQuestionAnswers(): Collection
    {
        return $this->questionAnswers;
    }
}