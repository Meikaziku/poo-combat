<?php

abstract class Monstre extends Character {

    public function __construct(string $nom, int $hp, int $attaque, int $max_hp, string $img = "") {
        parent::__construct($nom, $hp, $attaque, $max_hp, $img);
        
    }
}