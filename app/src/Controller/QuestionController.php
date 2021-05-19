<?php
/** ... ... */

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Question;
use App\Repository\QuestionRepository;
use http\Env\Request;
use Knp\Component\Pager\Pagination\PaginationInterface;


/**
 *Class QuestionController
 *
* @Route("/question")
*/
class QuestionController extends AbstractController
{
    private QuestionRepository $questionRepository;

    private PaginationInterface $paginator;

    public function __construct(QuestionRepository $questionRepository, PaginationInterface $paginator)
    {
        $this->questionRepository = $questionRepository;
        $this->paginator =$paginator;
    }

    /**
     * Index action.
     *
     * @param Request $request
     * @return  \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *      methods={"GET"},
     *      name="question_index",
     * )
     */
    public function index(Request $request): Response
    {
        $pagination = $this->paginator->paginate(
            $this->questionRepository->queryAll(),
            $request->query->getInt('page', 1),
            QuestionRepository::PAGINATOR_ITEMS_PER_PAGE
        );

        return $this->render(
            'question/index.html.twig',
            ['pagination'=>$pagination]
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