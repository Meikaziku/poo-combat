<?php

final class DonjonSquelette extends Donjon {
    public function __construct(int $id, array $monstreClasses, string $bossClass, ?string $backgroundUrl = "./assets/imgs/decors-jeu-combat-085.gif") {
        parent::__construct($id, "Donjon des Squelettes", $monstreClasses, $bossClass);
        if ($backgroundUrl !== null && method_exists($this, 'setBackgroundUrl')) {
            $this->setBackgroundUrl($backgroundUrl);
        }
    }
}
