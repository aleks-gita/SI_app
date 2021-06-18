<?php
/**
 * Category fixture.
 */

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class CategoryFixtures.
 */
class CategoryFixture extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'categories', function ($i) {
            $category = new Category();
            $category->setName($this->faker->word);
            $category->setAuthor($this->getRandomReference('users'));
            return $category;
        });


        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}