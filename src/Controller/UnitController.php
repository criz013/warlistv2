<?php

namespace App\Controller;

use App\Form\UnitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UnitController extends AbstractController
{
    #[Route('/unit/new', name: 'unit_new')]
    public function new(Request $request): Response
    {
        // Création du formulaire
        $form = $this->createForm(UnitType::class, []);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $unit = $form->getData();

            // 🔥 Ici tu peux persister en base si tu as une entité
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($unitEntity);
            // $entityManager->flush();

            // Pour le moment, on dump le résultat
            dd($unit);
        }

        return $this->render('unit/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
