<?php
/**
 * Answer fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class AnswerFixtures.
 */
class AnswerFixture extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(50, 'answers', function ($i) {
            $answer = new Answer();
            $answer->setTitle($this->faker->sentence);
            $answer->setContent($this->faker->sentence);
            $answer->setDate($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $answer->setIndication($this->faker->boolean());
            //$answer->setAuthorName($this->faker->name);
            $answer->setQuestion($this->getRandomReference('questions'));
            $answer->setAuthor($this->getRandomReference('users'));

            return $answer;
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
        return [QuestionFixture::class, UserFixtures::class];
    }
}
