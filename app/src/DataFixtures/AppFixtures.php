<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Equipement;
use App\Entity\TypeLogement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $equipementType = ['lave-linge', 'lave-vaisselle', 'produits d\'entretien', 'Wifi Rapide', 'Four à micro-ondes' ];
        $logementType = ['appartement', 'chalet', 'cabane','maison','chateau'  ];

        foreach($equipementType as $equip){
            $equipement = new Equipement();
            $equipement->setLabel($equip);
            $manager->persist($equipement);

        }
        foreach($logementType as $log){
            $typeLogement = new TypeLogement();
            $typeLogement ->setLabel($log);
            $manager->persist($typeLogement);
        }


        // $product = new Product();

        $manager->flush();
    }
}
