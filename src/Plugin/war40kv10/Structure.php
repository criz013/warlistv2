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
            ['name'=>'','designation'=>'','categorie'=>'keyWordProfil'],
            ['name'=>'','designation'=>'','categorie'=>'keywordWeapon']
        ];
    }
}
