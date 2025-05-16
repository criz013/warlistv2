<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
class HomeController extends AbstractController
{
    #[Route('home', name: 'home_home')]
    public function Home()
    {
        return $this->render('base.html.twig');
    }
    #[Route('list', name: 'home_list')]
    public function datatable()
    {
        // Remplacez ceci par votre logique pour récupérer les données
        $json =[
           ["Commandant en Exo-armure Crisis", 10, 5, "3+", 5, "7+", 2, "4+"],
           ["Commandant en Exo-armure Crisis", 10, 5, "3+", 5, "7+", 2, "4+"],
           ["Commandant en Exo-armure Crisis", 10, 5, "3+", 5, "7+", 2, "4+"],
           ["Commandant en Exo-armure Crisis", 10, 5, "3+", 5, "7+", 2, "4+"]
        ];

        $json = json_encode($json);
        return  $this->render('warlist/datatableArmyList.html.twig', [
            'data'    => $json
        ]);
    }
    #[Route('connection', name: 'connection')]
    public function con()
    {
        return  $this->render('register/login.html.twig');
    }
}

