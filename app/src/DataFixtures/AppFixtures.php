<?php

namespace App\DataFixtures;

use App\Entity\Equipement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $equipementType = ['lave-linge', 'lave-vaisselle', 'produits d\'entretien', 'Wifi Rapide', 'Four à micro-ondes' ];

        $equipement = new Equipement();
        $equipement->setLabel($equipementType[rand(0, count($equipementType) -1)]);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
