<?php
/**
 * Answer service.
 */

namespace App\Service;

use App\Entity\Answer;
use App\Repository\AnswerRepository;
use App\Repository\QuestionRepository;
use App\Service\QuestionService;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class AnswerService.
 */
class AnswerService
{
    /**
     * Answer repository.
     *
     * @var \App\Repository\AnswerRepository
     */
    private $answerRepository;

    /**
     * Paginator.
     *
     * @var \Knp\Component\Pager\PaginatorInterface
     */
    private $paginator;

    /**
     * Question service.
     *
     * @var \App\Service\QuestionService
     */
    private $questionService;

    /**
     * Question service.
     *
     * @var \App\Repository\QuestionRepository
     */
    private $questionRepository;

    /**
     * AnswerService constructor.
     *
     * @param \App\Repository\AnswerRepository      $answerRepository Answer repository
     * @param \Knp\Component\Pager\PaginatorInterface $paginator          Paginator
     * @param \App\Service\QuestionService            $questionService Question service
     */
    public function __construct(AnswerRepository $answerRepository, PaginatorInterface $paginator,QuestionService $questionService)
    {
        $this->answerRepository = $answerRepository;
        $this->paginator = $paginator;
        $this->questionService = $questionService;
    }
    /**
     * Create paginated list.
     *
     * @param int $page Page number
     *
     * @return \Knp\Component\Pager\Pagination\PaginationInterface Paginated list
     * @param \Symfony\Component\Security\Core\User\UserInterface $user    User entity
     * @param array                                               $filters Filters array
     *
     * @return \Knp\Component\Pager\Pagination\PaginationInterface Paginated list
     */
    public function createPaginatedList_author(int $page, UserInterface $user, array $filters = []): PaginationInterface
    {
            $filters = $this->prepareFilters($filters);

            return $this->paginator->paginate(
            $this->answerRepository->queryByAuthor($user, $filters),
            $page,
            AnswerRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }
    public function createPaginatedList_not_author(int $page, array $filters = []): PaginationInterface
    {
        $filters = $this->prepareFilters($filters);

        return $this->paginator->paginate(
            $this->answerRepository->queryAll($filters),
            $page,
            AnswerRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }
    /**
     * Save Answer.
     *
     * @param \App\Entity\Answer $answer Answer entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Answer $answer): void
    {
        $this->answerRepository->save($answer);
    }

    /**
     * DeleteAnswer.
     *
     * @param \App\Entity\Answer $answer Answer entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Answer $answer): void
    {
        $this->answerRepository->delete($answer);
    }
    /**
     * Prepare filters for the tasks list.
     *
     * @param array $filters Raw filters from request
     *
     * @return array Result array of filters
     */

    private function prepareFilters(array $filters): array
    {
        $resultFilters = [];

        if (isset($filters['question_id']) && is_numeric($filters['question_id'])) {
            $question = $this->questionService->findOneById($filters['question_id']);
            if (null !== $question) {
                $resultFilters['question'] = $question;
            }
        }


        return $resultFilters;
    }
}