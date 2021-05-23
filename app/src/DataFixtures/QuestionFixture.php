<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TaskFixtures.
 */
class QuestionFixture extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(50, 'questions', function ($i) {
            $question = new Question();
            $question->setContent($this->faker->sentence);
            $question->setDate($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $this->manager->persist($question);
            $question->setCategory($this->getRandomReference('categories'));

            return $question;
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [CategoryFixture::class];
    }
}