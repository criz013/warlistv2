<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $json = '{
            "name": "Commandant en Exo-armure Crisis",
            "movement": 10,
            "toughness": 5,
            "save": "3+",
            "wounds": 5,
            "leadership": "7+",
            "objective_control": 2,
            "invulnerable_save": "4+",
            "ranged_weapons": [
                {
                    "name": "Lanceur de charges à dispersion",
                    "range": "24\"",
                    "attacks": "D6",
                    "ballistic_skill": "3+",
                    "strength": 3,
                    "armor_penetration": 0,
                    "damage": 1,
                    "keywords": ["Déflagration", "Tir Indirect"]
                }
                // ... autres armes ici
            ],
            "melee_weapons": [
                {
                    "name": "Poings d’exo-armure",
                    "range": "Mêlée",
                    "attacks": "3",
                    "weapon_skill": "4+",
                    "strength": 5,
                    "armor_penetration": 0,
                    "damage": 1
                }
            ],
            "abilities": {
                "base": ["Frappe en Profondeur", "Meneur"],
                "faction": "Pour le Bien Suprême",
                "special": [
                    {
                        "name": "Commandant Crisis",
                        "effect": "Tant que cette figurine mène une unité, à chaque attaque de tir d’une figurine de cette unité, relancez tout jet de Touche de 1."
                    }
                ],
                "equipment": [
                    {
                        "name": "Système d’Appui d’Exo-armure",
                        "effect": "L’unité du porteur est éligible pour tirer à un tour où elle a Battu en Retraite, mais ne peut cibler que les unités à 6\"."
                    }
                ]
            },
            "unit_composition": [
                {
                    "name": "Commandant en Exo-armure Crisis",
                    "type": "Personnage"
                }
            ],
            "leader_rule": "Cette figurine peut être attachée à une unité d’Exo-armures Crisis.",
            "equipment_options": [],
            "keywords": ["Personnage", "Exo-armure"],
            "faction_keywords": ["Empire T\'au"]
        }';

        return  $this->render('warlist/datatableArmyList.html.twig', ['json' => $json]);
    }
    #[Route('connection', name: 'connection')]
    public function con()
    {
        return  $this->render('register/login.html.twig');
    }
}

