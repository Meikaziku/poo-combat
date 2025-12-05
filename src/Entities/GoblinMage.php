<?php

final class GoblinMage extends Goblin {

    private int $id;

    public function __construct(int $id, string $nom, int $attaque = 35, int $max_hp = 45, string $img = "./assets/imgs/monstres/goblin.avif") {
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