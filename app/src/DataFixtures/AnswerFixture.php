<?php

namespace App\DataFixtures;


use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AnswerFixture extends Fixture
{
    protected  \Faker\Generator $faker;

    protected ObjectManager $manager;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();
        $this->manager =$manager;

        for($i=0; $i<10; ++$i){
            $answer = new Answer();
            $answer->setContent($this->faker->sentence);
            $answer->setDate($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $answer->setIndication($this->faker->boolean());
            $this->manager->persist($answer);
        }

        $this->manager->flush();
    }
}
