<?php

final class SqueletteArcher extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Squelette Archer", int $attaque = 20, int $max_hp = 30, string $img = "./assets/imgs/monstres/squelette-archer.png") {
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
