<?php

final class ZombieBoss extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Nécro Zombie", int $attaque = 50, int $max_hp = 140, string $img = "./assets/imgs/monstres/zombie-boss.png") {
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
