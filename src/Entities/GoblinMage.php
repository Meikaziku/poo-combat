<?php

final class GoblinMage extends Goblin {

    private int $id;

    public function __construct(int $id, string $nom = "Goblin Mage", int $attaque = 10, int $max_hp = 34, string $img = "./assets/imgs/monstres/goblin-mage.png") {
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