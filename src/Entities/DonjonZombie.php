<?php

final class DonjonZombie extends Donjon {
    public function __construct(int $id, array $monstreClasses, string $bossClass, ?string $backgroundUrl = "./assets/imgs/decors-jeu-combat-118.gif") {
        parent::__construct($id, "Donjon des Zombies", $monstreClasses, $bossClass);
        if ($backgroundUrl !== null && method_exists($this, 'setBackgroundUrl')) {
            $this->setBackgroundUrl($backgroundUrl);
        }
    }
}
