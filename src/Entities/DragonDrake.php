<?php

final class DragonDrake extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Dragon Drake", int $attaque = 45, int $max_hp = 90, string $img = "./assets/imgs/monstres/dragon-basique.png") {
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
