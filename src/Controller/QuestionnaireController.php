<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\User;
use App\Exception\DefaultPublicErrorException;
use App\Service\Questionnaire\QuestionnaireResultPreparer;
use App\Service\Questionnaire\QuestionnaireResultSaver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuestionnaireController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private QuestionnaireResultSaver $questionnaireResultSaver;
    private QuestionnaireResultPreparer $questionnaireResultPreparer;

    /**
     * @param EntityManagerInterface $entityManager
     * @param QuestionnaireResultSaver $questionnaireResultSaver
     * @param QuestionnaireResultPreparer $questionnaireResultPreparer
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        QuestionnaireResultSaver $questionnaireResultSaver,
        QuestionnaireResultPreparer $questionnaireResultPreparer
    ) {
        $this->entityManager = $entityManager;
        $this->questionnaireResultSaver = $questionnaireResultSaver;
        $this->questionnaireResultPreparer = $questionnaireResultPreparer;
    }

    /**
     * @return Response
     */
    #[Route('/questionnaire', name: 'get_questionnaire', methods: 'GET')]
    public function getQuestionnaire(): Response
    {
        $questions = $this->entityManager->getRepository(Question::class)->findAll();

        return $this->render('questionnaire/index.html.twig', ['questions' => $questions]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/questionnaire', name: 'save_questionnaire', methods: 'POST')]
    public function saveQuestionnaire(Request $request): Response
    {
        $user = $this->entityManager->getRepository(User::class)->findAll()[0];
        try {
            $answers = $this->questionnaireResultSaver->save($request->getPayload()->all(), $user);
        } catch (DefaultPublicErrorException) {
            return new Response('', 400);
        }

        $result = $this->questionnaireResultPreparer->prepare($answers);

        return $this->render('questionnaire/result.html.twig', ['result' => $result]);
    }
}