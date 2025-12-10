<?php

final class DragonWhelp extends Monstre {

    private int $id;

    public function __construct(int $id, string $nom = "Dragon Whelp", int $attaque = 35, int $max_hp = 60, string $img = "./assets/imgs/monstres/dragon-inter.png") {
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
