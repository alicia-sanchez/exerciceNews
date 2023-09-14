<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
  private const NB_ARTICLES = 120;
  public function load(ObjectManager $manager): void
  {
    $faker = Factory::create("zh_TW");

    for ($i = 1; $i <= self::NB_ARTICLES; $i++) {
      $article = new Article();
      $article
        // ->setTitle($faker->realTextBetween(20, 40))
        ->setTitle($faker->words($faker->numberBetween(3, 7), true))
        ->setContent($faker->realText(600))
        ->setDateCreated($faker->dateTimeBetween('-2 years'))
        ->setVisible($faker->boolean(80));

      $manager->persist($article);
    }

    $manager->flush();
  }
}
