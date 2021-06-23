<?php
/** ... ... */

namespace App\Controller;



use App\Entity\Answer;
use App\Entity\Question;

use App\Service\AnswerService;
use App\Form\AnswerType;

use App\Service\QuestionService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;




/**
 *Class AnswerController
 *
 * @Route("/answer")
 */
class AnswerController extends AbstractController
{
    /**
     * Answer service.
     *
     * @var \App\Service\AnswerService
     */
    private $answerService;

    /**
     * AnswerController constructor.
     *
     * @param \App\Service\AnswerService $answerService Answer service
     */
    public function __construct(AnswerService $answerService)
    {
        $this->answerService = $answerService;
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

    /*public function index(Request $request, AnswerRepository $answerRepository, PaginatorInterface $paginator): Response
    {
        if ($this->isGranted('ROLE_ADMIN')){

            $pagination = $paginator->paginate(
                $answerRepository->queryAll(),
                $request->query->getInt('page', 1),
                AnswerRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        }
        elseif ($this->isGranted('ROLE_USER')) {
            $pagination = $paginator->paginate(
                $answerRepository->queryByAuthor($this->getUser()),
                $request->query->getInt('page', 1),
                AnswerRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        }
        else{

            $pagination = $this->paginator->paginate(
                $this->answerRepository->queryAll(),
                $request->query->getInt('page', 1),
                AnswerRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        }

        return $this->render(
            'answer/index.html.twig',
            ['pagination' => $pagination]
        );
    }*/
    public function index(Request $request): Response
    {

        $filters = [];
        $filters['question_id'] = $request->query->getInt('filters_question_id');

        if ($this->isGranted('ROLE_ADMIN')) {

            $pagination = $this->answerService->createPaginatedList_not_author(
                $request->query->getInt('page', 1),
                $filters
            );

        } elseif ($this->isGranted('ROLE_USER')) {

            $pagination = $this->answerService->createPaginatedList_author(
                $request->query->getInt('page', 1),
                $this->getUser(),
                $filters
            );
        } else {

            $pagination = $this->answerService->createPaginatedList_not_author(
                $request->query->getInt('page', 1),
                $filters
            );

        }
        return $this->render(
            'answer/index.html.twig',
            ['pagination' => $pagination]
        );
    }
    public function index_author(Request $request): Response
    {

        $filters = [];
        $filters['question_id'] = $request->query->getInt('filters_question_id');

        if ($this->isGranted('ROLE_USER')) {

            $pagination = $this->answerService->createPaginatedList_author(
                $request->query->getInt('page', 1),
                $this->getUser(),
                $filters
            );

            return $this->render(
                'answer/index.html.twig',
                ['pagination' => $pagination]
            );
        }
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
     *
     */
    public function show(Answer $answer): Response
    {

        if ($this->isGranted('ROLE_ADMIN')){
            return $this->render(
                'answer/show.html.twig',
                ['answer' => $answer]
            );
        }

        if ($this->isGranted('ROLE_USER')) {
            if ($answer->getAuthor() !== $this->getUser()) {
                $this->addFlash('warning', 'message.item_not_found');

                return $this->redirectToRoute('answer_index');
            }

                return $this->render(
                    'answer/show.html.twig',
                    ['answer' => $answer]
                );

        }
        if ($this->isGranted('ROLE_USER') == false){
            return $this->render(
                'answer/show.html.twig',
                ['answer' => $answer]
            );
        }
    }


    /**
     * Answer action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request            HTTP request
     * @param \App\Service\AnswerService        $answerService Answer Service
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/create",
     *     methods={"GET", "POST"},
     *     name="answer_create",
     * )
     */
    public function create(Request $request): Response
    {
        $answer = new Answer();
        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);

        if ($this->isGranted('ROLE_USER') == false){
            if ($form->isSubmitted() && $form->isValid()) {
                // $answer->setAuthorName($this-> getAuthorName);
                $answer->setDate(new \DateTime());
                $this->answerService->save($answer);
                $this->addFlash('success', 'message_created_successfully');

                return $this->redirectToRoute('answer_index');

            }

        }

        if ($this->isGranted('ROLE_USER')) {
            if ($form->isSubmitted() && $form->isValid()) {
               $answer->setAuthor($this->getUser());
                $answer->setDate(new \DateTime());
                $this->answerService->save($answer);
                $this->addFlash('success', 'message_created_successfully');

                return $this->redirectToRoute('answer_index');
            }
        }

        if ($this->isGranted('ROLE_USER') == false){
            if ($form->isSubmitted() && $form->isValid()) {
               // $answer->setAuthorName($this-> getAuthorName);
                $answer->setDate(new \DateTime());
                $this->answerService->save($answer);
                $this->addFlash('success', 'message_created_successfully');

                return $this->redirectToRoute('answer_index');

            }

        }
        return $this->render(
            'answer/create.html.twig',
            ['form' => $form->createView()]
        );
    }


    /**
     * Edit action.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request        HTTP request
     * @param \App\Entity\Answer                          $answer      answer entity
     * @param \App\Repository\AnswerRepository            $answerRepository answer repository
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
     *     name="answer_edit",
     * )
     * @IsGranted(
     *     "EDIT",
     *     subject="answer",
     * )
     */
    public function edit(Request $request, Answer $answer): Response
    {
        $form = $this->createForm(AnswerType::class, $answer, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->answerService->save($answer);
            $this->addFlash('success', 'message_updated_successfully');

            return $this->redirectToRoute('answer_index');
        }
        if ($answer->getAuthor() !== $this->getUser()) {
            $this->addFlash('warning', 'message.item_not_found');

            return $this->redirectToRoute('answer_index');
        }
        return $this->render(
            'answer/edit.html.twig',
            [
                'form' => $form->createView(),
                'answer' => $answer,
            ]
        );
    }

    /**
     * Delete action.
    @param \Symfony\Component\HttpFoundation\Request $request        HTTP request
     * @param \App\Entity\Answer                          $answer      answer entity
     * @param \App\Repository\AnswerRepository            $answerRepository answer repository
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Route(
     *     "/{id}/delete",
     *     methods={"GET", "DELETE"},
     *     requirements={"id": "[1-9]\d*"},
     *     name="answer_delete",
     * )
     * @IsGranted(
     *     "ROLE_USER",
     * )
     */
    public function delete(Request $request, Answer $answer): Response
    {


        $form = $this->createForm(FormType::class, $answer, ['method' => 'DELETE']);
        $form->handleRequest($request);

        if ($request->isMethod('DELETE') && !$form->isSubmitted()) {
            $form->submit($request->request->get($form->getName()));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $this->answerService->delete($answer);
            $this->addFlash('success', 'message_deleted_successfully');

            return $this->redirectToRoute('answer_index');
        }
        if ($this->isGranted('ROLE_ADMIN')){
            return $this->render(
                'answer/delete.html.twig',
                [
                    'form' => $form->createView(),
                    'answer' => $answer,
                ]
            );
        }
        if ($this->isGranted('ROLE_USER')) {
            if ($answer->getAuthor() !== $this->getUser()) {
                $this->addFlash('warning', 'message.item_not_found');

                return $this->redirectToRoute('answer_index');
            }

            return $this->render(
                'answer/delete.html.twig',
                [
                    'form' => $form->createView(),
                    'answer' => $answer,
                ]
            );
        }

        return $this->render(
            'answer/delete.html.twig',
            [
                'form' => $form->createView(),
                'answer' => $answer,
            ]
        );
    }


}