<?php

namespace App\DataFixtures;


use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class QuestionFixture extends Fixture
{
    protected  \Faker\Generator $faker;

    protected ObjectManager $manager;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();
        $this->manager =$manager;

        for($i=0; $i<10; ++$i){
            $question = new Question();
            $question->setContent($this->faker->sentence);
            $question->setDate($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $this->manager->persist($question);
        }

       $this->manager->flush();
    }
}
