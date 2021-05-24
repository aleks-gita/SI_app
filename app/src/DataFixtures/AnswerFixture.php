<?php
/**
 * Answer fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Persistence\ObjectManager;

/**
 * Class AnswerFixtures.
 */
class AnswerFixture extends AbstractBaseFixtures
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
            $answer->setContent($this->faker->sentence);
            $answer->setDate($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $answer->setIndication($this->faker->boolean());

            return $answer;
        });

        $manager->flush();
    }
}
