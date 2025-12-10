<?php

final class ZombieShaman extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Zombie Chaman", int $attaque = 30, int $max_hp = 45, string $img = "./assets/imgs/monstres/zombie2.png") {
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
