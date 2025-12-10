<?php

final class ZombieBrute extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Zombie Brute", int $attaque = 26, int $max_hp = 60, string $img = "./assets/imgs/monstres/zombie-combattant.png") {
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
