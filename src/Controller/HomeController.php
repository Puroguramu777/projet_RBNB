<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AddressRepository;
use App\Repository\AnnonceRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


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

    #[Route('detail/{id}', name: 'app_annonce_show', methods: ['GET'])]
    public function show(int $id, Annonce $annonce, AnnonceRepository $annonceRepository): Response
    {
        $annonce = $annonceRepository->findbyIdWithEquipement($id);
        $equipements = $annonceRepository->getEquipementByAnnonce($id);
        
        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
            'equipements'=> $equipements
        ]);
    }
    

    

     

    


}