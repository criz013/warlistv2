<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/profil')]
class backController extends AbstractController
{
    #[Route('/', name: 'profil_show', methods: ['GET', 'POST'])]
    public function showProfil() {

        return $this->render('back/profile.html.twig');
    }
}
