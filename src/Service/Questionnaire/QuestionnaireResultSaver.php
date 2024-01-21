<?php

namespace App\Service\Questionnaire;

use App\Entity\Question;
use App\Entity\QuestionAnswer;
use App\Entity\QuestionAnswerOption;
use App\Entity\User;
use App\Exception\DefaultPublicErrorException;
use Doctrine\ORM\EntityManagerInterface;

class QuestionnaireResultSaver
{
    private EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param array $payload
     * @param User $user
     * @return array
     * @throws DefaultPublicErrorException
     */
    public function save(array $payload, User $user): array
    {
        $questionsCount = $this->entityManager->getRepository(Question::class)->count([]);
        if ($questionsCount !== count($payload)) {
            throw new DefaultPublicErrorException();
        }

        $answers = [];
        foreach ($payload as $questionId => $answerOptions) {
            $question = $this->entityManager->getRepository(Question::class)->find($questionId);

            $answer = (new QuestionAnswer())
                ->setUser($user)
                ->setQuestion($question);

            foreach ($answerOptions as $answerOptionId) {
                $questionAnswerOption = $this->entityManager->getRepository(QuestionAnswerOption::class)
                    ->find($answerOptionId);
                $answer->addQuestionAnswerOption($questionAnswerOption);
            }

            $this->entityManager->persist($answer);
            $answers[] = $answer;
        }
        $this->entityManager->flush();

        return $answers;
    }
}