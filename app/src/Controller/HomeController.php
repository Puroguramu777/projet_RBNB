<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $annonceRepo;
    public function __construct(AnnonceRepository $bookRepository)
    {
        $this->annonceRepo = $bookRepository;
    }

    #[Route("/accueil", name:"accueil", methods:['POST', 'GET'])]
    public function home(){

        return $this->render("home/home.html.twig");
    }

    


}