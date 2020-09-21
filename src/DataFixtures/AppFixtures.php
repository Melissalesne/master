<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $category = new Category();
        $category->setName('Smartphone');
        $manager->persist($category);

        for ($i = 0; $i < 100; ++$i) { // On génére 100 produits de manière aléatoire
        $product = new Product();
        $product->setName($faker->text(5));
        $product->setDescription($faker->text);
        $product->setPrice($faker->numberBetween(10, 1000) * 100);
        $product->setCategory($category);
        $manager->persist($product);
      
        }
        $manager->flush();
    }
}
