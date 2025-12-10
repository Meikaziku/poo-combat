<?php

final class DragonElder extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Dragon Ancien", int $attaque = 60, int $max_hp = 130, string $img = "./assets/imgs/monstres/dragon-elder.png") {
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
