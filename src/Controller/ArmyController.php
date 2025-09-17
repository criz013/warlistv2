<?php

namespace App\Controller;

use App\Entity\Army;
use App\Form\ArmyForm;
use App\Repository\ArmyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/army')]
final class ArmyController extends AbstractController
{
    #[Route(name: 'app_army_index', methods: ['GET'])]
    public function index(ArmyRepository $armyRepository): Response
    {
        return $this->render('army/index.html.twig', [
            'armies' => $armyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_army_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $army = new Army();
        $form = $this->createForm(ArmyForm::class, $army);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($army);
            $entityManager->flush();

            return $this->redirectToRoute('app_army_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('army/new.html.twig', [
            'army' => $army,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_army_show', methods: ['GET'])]
    public function show(Army $army): Response
    {
        return $this->render('army/show.html.twig', [
            'army' => $army,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_army_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Army $army, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArmyForm::class, $army);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_army_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('army/edit.html.twig', [
            'army' => $army,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_army_delete', methods: ['POST'])]
    public function delete(Request $request, Army $army, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$army->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($army);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_army_index', [], Response::HTTP_SEE_OTHER);
    }
}
