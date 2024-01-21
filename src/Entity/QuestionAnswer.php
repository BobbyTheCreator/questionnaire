<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class QuestionAnswer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Question::class, inversedBy: 'questionAnswers')]
    private Question $question;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'questionAnswers')]
    private User $user;

    #[ORM\ManyToMany(targetEntity: QuestionAnswerOption::class, inversedBy: 'questionAnswers')]
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
     * @return Question
     */
    public function getQuestion(): Question
    {
        return $this->question;
    }

    /**
     * @param Question $question
     * @return QuestionAnswer
     */
    public function setQuestion(Question $question): QuestionAnswer
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return QuestionAnswer
     */
    public function setUser(User $user): QuestionAnswer
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getQuestionAnswerOptions(): Collection
    {
        return $this->questionAnswerOptions;
    }

    /**
     * @param QuestionAnswerOption $questionAnswerOption
     * @return $this
     */
    public function addQuestionAnswerOption(QuestionAnswerOption $questionAnswerOption): self
    {
        if (!$this->questionAnswerOptions->contains($questionAnswerOption)) {
            $this->questionAnswerOptions[] = $questionAnswerOption;
        }
        return $this;
    }
}