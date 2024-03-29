<?php
/** Question controller.
 */

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Service\QuestionService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 *Class QuestionController
 *
 * @Route("/question")
 */
class QuestionController extends AbstractController
{
    /**
     *  Question service.
     *
     * @var \App\Service\ QuestionService
     */
    private $questionService;

    /**
     *
     *  QuestionController constructor.
     *
     * @param \App\Service\ QuestionService $questionService Question service
     */
    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    /**
     * Index action.
     *
     *
     * @param Request $request
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/",
     *      methods={"GET"},
     *     name="question_index",
     * )
     */
    public function index(Request $request): Response
    {

        $filters = [];
        $filters['category_id'] = $request->query->getInt('filters_category_id');
        $filters['tag_id'] = $request->query->getInt('filters_tag_id');

        if ($this->isGranted('ROLE_ADMIN')) {
            //$page = $request->query->getInt('page', 1);
            $pagination = $this->questionService->createPaginatedListNotAuthor(
                $request->query->getInt('page', 1),
                $filters
            );
        } elseif ($this->isGranted('ROLE_USER')) {
            $pagination = $this->questionService->createPaginatedListAuthor(
                $request->query->getInt('page', 1),
                $this->getUser(),
                $filters
            );
        } else {
            $pagination = $this->questionService->createPaginatedListNotAuthor(
                $request->query->getInt('page', 1),
                $filters
            );
        }

        //$request->query->getInt('page', 1);
        //pagination = $this->questionService->createPaginatedList($page);

        return $this->render(
            'question/index.html.twig',
            ['pagination' => $pagination]
        );
    }

    /*public function index(Request $request): Response
    {
        if ($this->isGranted('ROLE_ADMIN')){

            $pagination = $this->paginator->paginate(
                $this->questionRepository->queryAll(),
                $request->query->getInt('page', 1),
                QuestionRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        }
        elseif ($this->isGranted('ROLE_USER')) {
            $pagination = $this->paginator->paginate(
                $this->questionRepository->queryByAuthor($this->getUser()),
                $request->query->getInt('page', 1),
                QuestionRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        }

        else{
        $pagination = $this->paginator->paginate(
            $this->questionRepository->queryAll(),
            $request->query->getInt('page', 1),
            QuestionRepository::PAGINATOR_ITEMS_PER_PAGE
        );

     }
        return $this->render(
            'question/index.html.twig',
            ['pagination'=>$pagination],
        );
    */


    /**
     * Create action.
     *
     * @param Request $request HTTP request
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/create",
     *     methods={"GET", "POST"},
     *     name="question_create",
     * )
     * @IsGranted("ROLE_USER")
     */
    public function create(Request $request): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $question->setAuthor($this->getUser());
            $this->questionService->save($question);
            $this->addFlash('success', 'message_created_successfully');

            return $this->redirectToRoute('question_index');
        }

        return $this->render(
            'question/create.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * Edit action.
     *
     * @param Request  $request  HTTP request
     * @param Question $question Question entity
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/{id}/edit",
     *     methods={"GET", "PUT"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="question_edit",
     * )
     * @IsGranted(
     *    "EDIT",
     *     subject="question",
     * )
     */
    public function edit(Request $request, Question $question): Response
    {
        $form = $this->createForm(QuestionType::class, $question, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->questionService->save($question);
            $this->addFlash('success', 'message_updated_successfully');

            return $this->redirectToRoute('question_index');
        }

        if ($this->denyAccessUnlessGranted('EDIT', $question)) {//$question->getAuthor() !== $this->getUser()) {
            $this->addFlash('warning', 'message.item_not_found');

            return $this->redirectToRoute('question_index');
        }

        return $this->render(
            'question/edit.html.twig',
            [
                'form' => $form->createView(),
                'question' => $question,
            ]
        );
    }

    /**
     * Delete action.
     *
     * @param Request  $request  HTTP request
     * @param Question $question question entity
     *
     * @return Response HTTP response
     *
     *
     * @Route(
     *     "/{id}/delete",
     *     methods={"GET", "DELETE"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="question_delete",
     * )
     * @IsGranted(
     *     "ROLE_USER",
     *
     * )
     */
    public function delete(Request $request, Question $question): Response
    {

            $form = $this->createForm(FormType::class, $question, ['method' => 'DELETE']);
            $form->handleRequest($request);

        if ($request->isMethod('DELETE') && !$form->isSubmitted()) {
            $form->submit($request->request->get($form->getName()));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $this->questionService->delete($question);
            $this->addFlash('success', 'message_deleted_successfully');

            return $this->redirectToRoute('question_index');
        }
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'question/delete.html.twig',
                [
                    'form' => $form->createView(),
                    'question' => $question,
                ]
            );
        }
        if ($this->isGranted('ROLE_USER')) {
            if ($this->denyAccessUnlessGranted('DELETE', $question)) {//) {
                $this->addFlash('warning', 'message.item_not_found');

                return $this->redirectToRoute('question_index');
            }

            return $this->render(
                'question/delete.html.twig',
                [
                    'form' => $form->createView(),
                    'question' => $question,
                ]
            );
        }
    }
    /**
     * Show action.
     *
     * @param Question $question Question entity
     *
     * @return Response HTTP response
     *
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="question_show",
     *     requirements={"id": "[1-9]\d*"},
     * )
     *
     */
    public function show(Question $question): Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->render(
                'question/show.html.twig',
                ['question' => $question]
            );
        }
        if ($this->isGranted('ROLE_USER')) {
            if ($this->denyAccessUnlessGranted('VIEW', $question)) {//$question->getAuthor() !== $this->getUser()) {
                $this->addFlash('warning', 'message.item_not_found');

                return $this->redirectToRoute('question_index');
            }

            return $this->render(
                'question/show.html.twig',
                ['question' => $question]
            );
        }
        if ($this->isGranted('ROLE_USER') === false) {
            return $this->render(
                'question/show.html.twig',
                ['question' => $question]
            );
        }
    }
}
