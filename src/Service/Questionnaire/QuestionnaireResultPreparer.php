<?php

namespace App\Service\Questionnaire;

use App\Entity\QuestionAnswer;
use App\Entity\QuestionAnswerOption;

class QuestionnaireResultPreparer
{
    /**
     * @param QuestionAnswer[] $answers
     * @return array
     */
    public function prepare(array $answers): array
    {
        $rightAnswers = [];
        $wrongAnswers = [];

        foreach ($answers as $answer) {
            $isRightAnsweredQuestion = true;
            foreach ($answer->getQuestionAnswerOptions() as $questionAnswerOption) {
                /* @var QuestionAnswerOption $questionAnswerOption */
                if (!$questionAnswerOption->getIsRight()) {
                    $isRightAnsweredQuestion = false;
                    break;
                }
            }

            if ($isRightAnsweredQuestion) {
                $rightAnswers[] = $answer;
            } else {
                $wrongAnswers[] = $answer;
            }
        }

        return [
            'rightAnswers' => $rightAnswers,
            'wrongAnswers' => $wrongAnswers
        ];
    }
}