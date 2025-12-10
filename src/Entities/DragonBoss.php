<?php

final class DragonBoss extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Dragon Roi", int $attaque = 90, int $max_hp = 300, string $img = "./assets/imgs/monstres/dragon-boss.png") {
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
