<?php

final class ZombieWalker extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Zombie Errant", int $attaque = 20, int $max_hp = 40, string $img = "./assets/imgs/monstres/zombie3.png") {
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
