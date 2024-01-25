<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AddressRepository;
use App\Repository\AnnonceRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{

    private $annonceRepo;
    private $addressRepo;
    
    public function __construct(AnnonceRepository $annonceRepository, AddressRepository $addressRepository)
    {
        $this->annonceRepo = $annonceRepository;
        $this->addressRepo = $addressRepository;
        
    }
    

    
    #[Route("/accueil", name:"accueil", methods:['POST', 'GET'])]
    public function home(){
       

        return $this->render("home/home.html.twig",[
            //On récupère/trouve toutes les annonces dans la bdd
            "annonces" => $this->annonceRepo->findAllOptimize(),
            
        ]);
    }

     

    


}