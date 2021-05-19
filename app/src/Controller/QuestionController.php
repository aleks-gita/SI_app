<?php
/** ... ... */

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Question;
use App\Repository\QuestionRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;


/**
 *Class QuestionController
 *
* @Route("/question")
*/
class QuestionController extends AbstractController
{
    private QuestionRepository $questionRepository;


    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * Index action.

     * @return Response HTTP response
     *
     * @Route(
     *     "/",
     *      methods={"GET"},
     *     name="question_index",
     * )
     */

    public function index(): Response
    {
        $questions = $this->questionRepository->findAll();

        return $this->render(
            'question/index.html.twig',
            ['question'=>$questions]
        );
    }

    /**
     * Show action.
     *
     * @param \App\Entity\Question $question Question entity
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="question_show",
     *     requirements={"id": "[1-9]\d*"},
     * )
     */
    public function show(Question $question): Response
    {
        return $this->render(
            'question/show.html.twig',
            ['question' => $question]
        );
    }
}