<?php

class FightManager
{

    private HeroRepository $heroRepository;

    public function __construct(PDO $db)
    {
        $this->heroRepository = new HeroRepository($db);
    }

    public function fightCreation(): Monstre
    {
        $monsters = [
            new GoblinCombattant(1, "Goblin combattant"),
            new GoblinArcher(2, "Goblin archer"),
            new GoblinMage(3, "Goblin mage"),
        ];

        
        return $monsters[array_rand($monsters)];
    }

    public function fight(Hero $hero, Monstre $monstre): array
    {
        $combatLogs = [];

        while ($hero->getHp() > 0 && $monstre->getHp() > 0) {


            $combatLogs[] = $hero->attaque($monstre, $combatLogs);

            if ($monstre->getHp() <= 0) {
                break;
            }

            $combatLogs[] = $monstre->attaque($hero, $combatLogs);
        }


        $combatLog = new CombatLog();

        if ($hero->getHp() <= 0) {
            $combatLog->setMessage("Le vainqueur est " . $monstre->getNom());
            $combatLog->setColor("red");
        } else {
            $combatLog->setMessage("Le vainqueur est " . $hero->getNom());
            $combatLog->setColor("blue");
        }

        $combatLogs[] = $combatLog;

        return $combatLogs;
    }
}
