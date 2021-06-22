<?php
/**
 * Question service.
 */

namespace App\Service;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use App\Repository\TagRepository;
use App\Repository\CategoryRepository;
use App\Service\CategoryService;
use App\Service\TagService;

use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class QuestionService.
 */
class QuestionService
{
    /**
     * Question repository.
     *
     * @var \App\Repository\QuestionRepository
     */
    private $questionRepository;


    /**
     * Paginator.
     *
     * @var \Knp\Component\Pager\PaginatorInterface
     */
    private $paginator;

    /**
     * Category service.
     *
     * @var \App\Service\CategoryService
     */
    private $categoryService;



    /**
     * Tag service.
     *
     * @var \App\Repository\TagRepository
     */
    private $tagRepository;
    /**
     * Category service.
     *
     * @var \App\Repository\CategoryRepository
     */
    private $categoryRepository;

    /**
     * Tag service.
     *
     * @var \App\Service\TagService
     */
    private $tagService;

    /**
     * CategoryService constructor.
     *
     * @param \App\Repository\QuestionRepository      $questionRepository Question repository
     * @param \Knp\Component\Pager\PaginatorInterface $paginator          Paginator
     * @param \App\Service\CategoryService            $categoryService Category service
     * @param \App\Service\TagService                 $tagService      Tag service
     */
    public function __construct(QuestionRepository $questionRepository, PaginatorInterface $paginator, CategoryService $categoryService, TagService $tagService)
    {
        $this->questionRepository = $questionRepository;
        $this->paginator = $paginator;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;

    }
    /**
     * Create paginated list.
     *
     *
     * @param int                                                   $page Page number
     * @param \Symfony\Component\Security\Core\User\UserInterface $user    User entity
     * @param array                                               $filters Filters array
     *
     * @return \Knp\Component\Pager\Pagination\PaginationInterface Paginated list
     */
    public function createPaginatedList_author(int $page, UserInterface $user, array $filters = []): PaginationInterface
    {
        $filters = $this->prepareFilters($filters);

        return $this->paginator->paginate(
            $this->questionRepository->queryByAuthor($user, $filters),
            $page,
            QuestionRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }
    public function createPaginatedList_not_author(int $page, array $filters = []): PaginationInterface
    {
        $filters = $this->prepareFilters($filters);

        return $this->paginator->paginate(
            $this->questionRepository->queryAll($filters),
            $page,
            QuestionRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }
    /**
     * Save category.
     *
     * @param \App\Entity\Question $question Question entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Question $question): void
    {
        $this->questionRepository->save($question);
    }

    /**
     * Delete category.
     *
     * @param \App\Entity\Question $question Question entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Question $question): void
    {
        $this->questionRepository->delete($question);
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
        if (isset($filters['category_id']) && is_numeric($filters['category_id'])) {
            $category = $this->categoryService->findOneById(
                $filters['category_id']
            );
            if (null !== $category) {
                $resultFilters['category'] = $category;
            }
        }

        if (isset($filters['tag_id']) && is_numeric($filters['tag_id'])) {
            $tag = $this->tagService->findOneById($filters['tag_id']);
            if (null !== $tag) {
                $resultFilters['tag'] = $tag;
            }
        }


        return $resultFilters;
    }
    /**
     * Find Question by Id.
     *
     * @param int $id Question Id
     *
     * @return \App\Entity\Question|null Question entity
     */
    public function findOneById(int $id): ?Question
    {
        return $this->questionRepository->findOneById($id);
    }

}