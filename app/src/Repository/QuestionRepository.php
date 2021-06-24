<?php

namespace App\Repository;

use App\Entity\Question;
use App\Entity\Answer;
use App\Entity\User;
use App\Service\UserInterface;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;
use App\Entity\Category;
use App\Entity\Tag;

/**
 * @method Question|null find($id, $lockMode = null, $lockVersion = null)
 * @method Question|null findOneBy(array $criteria, array $orderBy = null)
 * @method Question[]    findAll()
 * @method Question[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionRepository extends ServiceEntityRepository
{
    /**
     * Items per page.
     *
     * Use constants to define configuration options that rarely change instead
     * of specifying them in app/config/config.yml.
     * See https://symfony.com/doc/current/best_practices.html#configuration
     *
     * @constant int
     */
    const PAGINATOR_ITEMS_PER_PAGE = 10;


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    /**
     * Save record.
     *
     * @param \App\Entity\Question $question Question entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Question $question): void
    {
        $this->_em->persist($question);
        $this->_em->flush();
    }

    /**
     * Delete record.
     *
     * @param \App\Entity\Question $question Question entity
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Question $question): void
    {
            $this->_em->remove($question);
            $this->_em->flush();

    }
    /**
     * Query all records.
     *
     * @param array $filters Filters array
     *
     * @return \Doctrine\ORM\QueryBuilder Query builder
     */
    public function queryAll(array $filters = []): QueryBuilder
    {
        $queryBuilder = $this->getOrCreateQueryBuilder()
            ->select(
                'partial question.{id, date, content, title}',
                'partial category.{id, name}',
                'partial tags.{id, title}',

            )

            ->join('question.category', 'category')
            ->leftJoin('question.tags', 'tags')
            ->orderBy('question.date', 'DESC');
        $queryBuilder = $this->applyFiltersToList($queryBuilder, $filters);

        return $queryBuilder;
    }
    private function getOrCreateQueryBuilder(QueryBuilder $queryBuilder = null ): QueryBuilder
    {
        return $queryBuilder ?? $this->createQueryBuilder('question');
    }


    /**
     * Query questions by author.
     *
     * @param \App\Entity\User $user User entity
     * @param array $filters
     * @return \Doctrine\ORM\QueryBuilder Query builder
     */
    public function queryByAuthor(User $user, array $filters = []): QueryBuilder
    {
        $queryBuilder = $this->queryAll($filters);

        $queryBuilder->andWhere('question.author = :author')
            ->setParameter('author', $user);

        return $queryBuilder;
    }
    /**
     * Apply filters to paginated list.
     *
     * @param \Doctrine\ORM\QueryBuilder $queryBuilder Query builder
     * @param array                      $filters      Filters array
     *
     * @return \Doctrine\ORM\QueryBuilder Query builder
     */
    private function applyFiltersToList(QueryBuilder $queryBuilder, array $filters = []): QueryBuilder
    {
        if (isset($filters['category']) && $filters['category'] instanceof Category) {
            $queryBuilder->andWhere('category = :category')
                ->setParameter('category', $filters['category']);
        }

        if (isset($filters['tag']) && $filters['tag'] instanceof Tag) {
            $queryBuilder->andWhere('tags IN (:tag)')
                ->setParameter('tag', $filters['tag']);
        }

        return $queryBuilder;
    }

    // /**
    //  * @return Question[] Returns an array of Question objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Question
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}