<?php
/**
 * Tag fixture.
 */

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TagFixtures.
 */
class TagFixture extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'tags', function ($i) {
            $tag = new Tag();
            $tag->setTitle($this->faker->word);
            $tag->setDate($this->faker->dateTimeBetween('-100 days', '-1 days'));

            return $tag;
        });


        $manager->flush();
    }
}