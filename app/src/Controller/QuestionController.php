<?php
/** Question controller.
 */

namespace App\Controller;


use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    private QuestionRepository $questionRepository;

    private PaginatorInterface $paginator;

    public function __construct(QuestionRepository $questionRepository, PaginatorInterface $paginator)
    {
        $this-> questionRepository = $questionRepository;
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
     *     name="question_index",
     * )
     */

    public function index(Request $request): Response
    {


        $pagination = $this->paginator->paginate(
          $this->questionRepository->queryByAuthor($this->getUser()),
          $request->query->getInt('page', 1),
          QuestionRepository::PAGINATOR_ITEMS_PER_PAGE
        );



        return $this->render(
            'question/index.html.twig',
            ['pagination'=>$pagination],
        );
    }
    /**
     * Create action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request        HTTP request
     * @param \App\Repository\QuestionRepository            $questionRepository Question repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/create",
     *     methods={"GET", "POST"},
     *     name="question_create",
     * )
     */
    public function create(Request $request, QuestionRepository $questionRepository): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $question->setAuthor($this->getUser());
            $questionRepository->save($question);
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
     * @param \Symfony\Component\HttpFoundation\Request $request        HTTP request
     * @param \App\Entity\Question                          $question         Question entity
     * @param \App\Repository\QuestionRepository            $taskRepository Task repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/{id}/edit",
     *     methods={"GET", "PUT"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="question_edit",
     * )
     * @IsGranted(
     *     "EDIT",
     *     subject="question",
     * )
     */
    public function edit(Request $request, Question $question, QuestionRepository $questionRepository): Response
    {
        $form = $this->createForm(QuestionType::class, $question, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $questionRepository->save($question);
            $this->addFlash('success', 'message_updated_successfully');

            return $this->redirectToRoute('question_index');
        }

        if ($question->getAuthor() !== $this->getUser()) {
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
     * @param \Symfony\Component\HttpFoundation\Request $request        HTTP request
     * @param \App\Entity\Question                         $question          question entity
     * @param \App\Repository\QuestionRepository            $questionRepository question repository
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/{id}/delete",
     *     methods={"GET", "DELETE"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="question_delete",
     * )
     * @IsGranted(
     *     "DELETE",
     *     subject="question",
     * )
     */
    public function delete(Request $request, Question $question, QuestionRepository $questionRepository): Response
    {


        $form = $this->createForm(FormType::class, $question, ['method' => 'DELETE']);
        $form->handleRequest($request);

        if ($request->isMethod('DELETE') && !$form->isSubmitted()) {
            $form->submit($request->request->get($form->getName()));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $questionRepository->delete($question);
            $this->addFlash('success', 'message_deleted_successfully');

            return $this->redirectToRoute('question_index');
        }

        if ($question->getAuthor() !== $this->getUser()) {
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
     * @IsGranted(
     *     "VIEW",
     *     subject="question",
     * )
     */
    public function show(Question $question): Response
    {
        if ($question->getAuthor() !== $this->getUser()) {
            $this->addFlash('warning', 'message.item_not_found');

            return $this->redirectToRoute('question_index');
        }
        return $this->render(
            'question/show.html.twig',
            ['question' => $question]
        );
    }

}