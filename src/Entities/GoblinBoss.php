<?php


final class GoblinBoss extends Goblin {

    private int $id;

    public function __construct(int $id, string $nom = "Goblin chef de tribu", int $attaque = 32, int $max_hp = 100, string $img = "./assets/imgs/monstres/goblin-boss.png") {
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