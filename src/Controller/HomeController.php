<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
class HomeController extends AbstractController
{

    #[Route('home')]
    public function Home()
    {
        return $this->render('base.html.twig');
    }
}
