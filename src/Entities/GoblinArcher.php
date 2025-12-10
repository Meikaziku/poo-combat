<?php


final class GoblinArcher extends Goblin {

    private int $id;

    public function __construct(int $id, string $nom = "Goblin Archer", int $attaque = 6, int $max_hp = 35, string $img = "./assets/imgs/monstres/goblin-archer.png") {
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