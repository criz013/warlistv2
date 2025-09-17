<?php

namespace App\Controller;

use App\Entity\Datasheet;
use App\Form\DatasheetForm;
use App\Form\DynamicJsonFormType;
use App\Repository\DatasheetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/datasheet')]
final class DatasheetController extends AbstractController
{
    #[Route(name: 'app_datasheet_index', methods: ['GET'])]
    public function index(DatasheetRepository $datasheetRepository): Response
    {
        return $this->render('datasheet/index.html.twig', [
            'datasheets' => $datasheetRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_datasheet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $datasheet = new Datasheet();
        $form = $this->createForm(DatasheetForm::class, $datasheet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($datasheet);
            $entityManager->flush();

            return $this->redirectToRoute('app_datasheet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('datasheet/new.html.twig', [
            'datasheet' => $datasheet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_datasheet_show', methods: ['GET'])]
    public function show(Datasheet $datasheet): Response
    {
        return $this->render('datasheet/show.html.twig', [
            'datasheet' => $datasheet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_datasheet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Datasheet $datasheet, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DatasheetForm::class, $datasheet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_datasheet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('datasheet/edit.html.twig', [
            'datasheet' => $datasheet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_datasheet_delete', methods: ['POST'])]
    public function delete(Request $request, Datasheet $datasheet, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$datasheet->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($datasheet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_datasheet_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/test', name: 'app_datasheet_test')]
    public function dynamique(Request $request): Response
    {
        $jsonSchema = <<<JSON
{
    "name":"",
    "keyword":[],
    "cout":[{}],
    "caracteristiques": {
        "movement": "",
        "toughness": "",
        "save": "",
        "wounds": "",
        "leadership": "",
        "objective_control": "",
        "invulnerable_save": ""
    },
    "weapons": [{
        "name": "",
        "range": "",
        "attacks": "",
        "ballistic_skill": "",
        "strength": "",
        "armor_penetration": "",
        "damage": "",
        "keywords": []
    }],
    "aptitude": {
        "base": [],
        "advance": [],
        "equipement": []
    },
    "weapon": [
        [
            "",
            {
                "m": "",
                "A": "",
                "CT": "",
                "F": "",
                "PA": "",
                "D": "",
                "keywords": []
            }
        ]
    ],
    "abilities": {
        "base": [],
        "faction": "",
        "special": [
            {
                "name": "",
                "effect": ""
            }
        ]
    },
    "equipment": [
        {
            "name": "",
            "effect": ""
        }
    ],
    "unit_composition": [
        {
            "name": "",
            "type": ""
        }
    ],
    "equipment_options": [
        {
            "option": "",
            "choices": []
        }
    ],
    "leader_rule": "",
    "keywords": [],
    "faction_keywords": []
}
JSON;

        $structure = json_decode($jsonSchema, true);

        $form = $this->createForm(DynamicJsonFormType::class, null, [
            'structure' => $structure
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // Tu peux l'enregistrer dans une entité ou afficher le JSON
            dd($data);
        }

        return $this->render('datasheet/test.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
