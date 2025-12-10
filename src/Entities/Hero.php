<?php

final class Hero extends Character {

    private int $id;

    public function __construct(int $id, string $nom, int $hp = 170, int $attaque = 200, int $max_hp = 160, string $img = "") {
        $this->id = $id;
        parent::__construct($nom, $hp, $attaque, $max_hp, $img);
        
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}