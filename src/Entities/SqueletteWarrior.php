<?php

final class SqueletteWarrior extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Squelette Guerrier", int $attaque = 18, int $max_hp = 35, string $img = "./assets/imgs/monstres/squelette-combattant.png") {
        $this->id = $id;
        parent::__construct($nom, $max_hp, $attaque, $max_hp, $img);
        
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}
