<?php

namespace App\Plugin\war40kv10;

class Structure
{
    public function construct() {}

    public function defaultValueGame():array {
        return [
            'name'       => 'Warhammer 40k',//Warhammer 40k
            'version'    => '10',//10
            'editeur'    => 'GamesWork Shop',//GamesWork Shop
            'logoGame'   => '',//logo_War10.png
            'logoEditor' => ''//logo_Gamesworkshop
        ];
    }
    public function defaultValueArmy():array {
        return [
            ['name' => 'Space Marine', 'abreviation' => 'SM', 'description' => '', 'img' => ''],
            ['name' => 'T\'au', 'abreviation' => '', 'description' => '', 'img' => ''],
            ['name' => 'Adepta sororitas', 'abreviation' => 'AS', 'description' => '', 'img' => ''],
        ];
    }
    public function structureAnother():array {
        return [

        ];
    }
    public function structureDatasheet():array {
        return [
            'characterProfils' => [
                'caract' => ['M', 'T', 'SV', 'W', 'LD', 'OC'],
                'keyWordProfil' => [],
                'compositiongit' => [],
                'optionStuff' => []
            ],
            'weaponProfil'     => ['weaponName','Range','A','BS','S','AP','D',"keywordWeapon","default"],
            'aptitudes'        => ['sauvegardeInvulnérable','base','other']
        ];
    }

    public function structureKeyWord():array {
        return [
            ['name'=>'Infanterie','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Vol','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Personnage','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Héros Épique','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Exo-armure','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Grenades','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Désignateur Laser','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Équipe de Cibleurs','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Véhicule','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'Marcheur','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'ASSAUT','designation'=>'On peut tirer même si l’unité du porteur a Avancé.','categorie'=>'keywordWeapon'],
            ['name'=>'PISTOLET','designation'=>'On peut tirer même si l’unité du porteur est à Portée d’Engagement d’unités ennemies, mais il faut alors cibler une de ces unités ennemies.On ne peut pas tirer avec des Pistolets et avec d’autres armes n’étant pas des Pistolets (sauf s’il s’agit d’un Monstre ou d’un Véhicule).','categorie'=>'keywordWeapon'],
            ['name'=>'TIR RAPIDE','designation'=>'[TIR RAPIDE X] : On augmente les Attaques de “x” quand on cible des unités à mi-portée.','categorie'=>'keywordWeapon']
        ];
    }
}
