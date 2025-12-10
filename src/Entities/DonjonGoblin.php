<?php 


final class DonjonGoblin extends Donjon {

    public function __construct(int $id, ?array $monstres = null, ?string $bossClass = null, ?string $backgroundUrl = "./assets/imgs/decors-jeu-combat-041.gif") {
        // allow optional override of monsters/boss when factory passes them,
        // otherwise use default goblin monsters
        $monstres = $monstres ?? [
            "GoblinCombattant",
            "GoblinArcher",
            "GoblinMage",
        ];
        $bossClass = $bossClass ?? "GoblinBoss";

        parent::__construct($id, "Donjon Gobelin", $monstres, $bossClass);
        // apply default/background URL to the Donjon instance so front can read it
        if ($backgroundUrl !== null && method_exists($this, 'setBackgroundUrl')) {
            $this->setBackgroundUrl($backgroundUrl);
        }
    }


}