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
        //On crée les tableau contenant nos différent type d'équipement et type de logement disponible
        $equipementType = ['lave-linge', 'lave-vaisselle', 'produits d\'entretien', 'Wifi Rapide', 'Four à micro-ondes' ];
        $logementType = ['appartement', 'chalet', 'cabane','maison','chateau'  ];

        //On bloucle pour implémenter dans la bdd chaque type d'équipement
        foreach($equipementType as $equip){
            //Création d'un nouveau équipements
            $equipement = new Equipement();
            //On lui attribut une valeur du tableau
            $equipement->setLabel($equip);
            //puis on persist
            $manager->persist($equipement);

        }
        //On bloucle pour implémenter dans la bdd chaque type de logement
        foreach($logementType as $log){
            //Création d'un nouveau type de logement
            $typeLogement = new TypeLogement();
            //On lui attribut une valeur du tableau
            $typeLogement ->setLabel($log);
            //puis on persist
            $manager->persist($typeLogement);
        }


        

        $manager->flush();
    }
}
