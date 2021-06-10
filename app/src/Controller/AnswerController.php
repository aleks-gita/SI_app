<?php
/** ... ... */

namespace App\Controller;



use App\Entity\Answer;
use App\Repository\AnswerRepository;
use App\Form\AnswerType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




/**
 *Class AnswerController
 *
 * @Route("/answer")
 */
class AnswerController extends AbstractController
{
    private AnswerRepository $answerRepository;

    private PaginatorInterface $paginator;

    public function __construct(AnswerRepository $answerRepository, PaginatorInterface $paginator)
    {
        $this->answerRepository = $answerRepository;
        $this-> paginator = $paginator;
    }


    /**
     * Index action.
     *
     *
     * @param Request $request
     * @return Response HTTP response
     *
     * @Route(
     *     "/",
     *      methods={"GET"},
     *     name="answer_index",
     * )
     */

    public function index(Request $request, AnswerRepository $answerRepository, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $answerRepository->queryAll(),
            $request->query->getInt('page', 1),
            AnswerRepository::PAGINATOR_ITEMS_PER_PAGE
        );

        return $this->render(
            'answer/index.html.twig',
            ['pagination' => $pagination]
        );
    }
    /**
     * Show action.
     *
     * @param \App\Entity\Answer $answer Answer entity
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="answer_show",
     *     requirements={"id": "[1-9]\d*"},
     * )
     */
    public function show(Answer $answer): Response
    {
        return $this->render(
            'answer/show.html.twig',
            ['answer' => $answer]
        );
    }
    /**
     * Answer action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request            HTTP request
     * @param \App\Repository\AnswerRepository        $answerRepository Answer repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/answer",
     *     methods={"GET", "POST"},
     *     name="answer_create",
     * )
     */
    public function create(Request $request, AnswerRepository $answerRepository): Response
    {
        $answer = new Answer();
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $answer->setDate(new \DateTime());
            $answerRepository->save($answer);

            return $this->redirectToRoute('answer_index');
        }

        return $this->render(
            'answer/create.html.twig',
            ['form' => $form->createView()]
        );
    }
}