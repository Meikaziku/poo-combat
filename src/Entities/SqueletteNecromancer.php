<?php

final class SqueletteNecromancer extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Nécromancien Squelette", int $attaque = 22, int $max_hp = 32, string $img = "./assets/imgs/monstres/squelette-necromancien.png") {
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
