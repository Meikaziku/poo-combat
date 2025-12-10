<?php

final class SqueletteBoss extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Seigneur Squelette", int $attaque = 45, int $max_hp = 120, string $img = "./assets/imgs/monstres/squelette-boss.png") {
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
