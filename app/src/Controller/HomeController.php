<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route("/accueil", name:"accueil", methods:['POST', 'GET'])]
    public function home(){

        return $this->render("home/home.html.twig");
    }


}