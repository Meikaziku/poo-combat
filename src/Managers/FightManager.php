<?php

class FightManager
{
    private DonjonManager $donjonManager;
    private Donjon $currentDonjon;

    public function __construct(PDO $db)
    {
        $this->donjonManager = new DonjonManager($db);
    }

    /**
     * Initialise le donjon du héros (premier donjon)
     */
    public function initializeHeroDonjon(): ?Donjon
    {

        // Si un donjon courant est présent en session (id), on le charge, sinon on charge le premier
        if (isset($_SESSION['donjon'])) {
            $donjon = $_SESSION['donjon'];
            $this->currentDonjon = $donjon;
            return $this->currentDonjon;

            // si impossible de charger, on tombera sur le premier
        }

        $first = $this->donjonManager->getFirstDonjonWithId();

        if ($first === null) {
            return null;
        }

        $this->currentDonjon = $first['donjon'];
        $this->currentDonjon->setCurrentFight(0);

        return $this->currentDonjon;
    }

    /**
     * Crée un monstre pour le combat suivant
     */
    public function fightCreation(): Monstre
    {
        if (!$this->currentDonjon) {
            throw new Exception("Aucun donjon initialisé");
        }

        // create next monster for the current donjon
        $monstre = $this->currentDonjon->getNextMonster();


        // Si le donjon est terminé (null), tente de passer au donjon suivant
        if ($monstre === null) {
            $currentId = $_SESSION['donjon']->getId() ?? null;
            if ($currentId === null) {
                throw new Exception("Donjon terminé et id introuvable");
            }

            $next = $this->donjonManager->getDonjonAfterWithId((int)$currentId);
            if ($next === null) {
                unset($_SESSION['donjon']);
                header('location: ../../public/perso_selection.php');
                exit();
            }



            $_SESSION['donjon'] = $next;

            // récupérer le premier monstre du nouveau donjon
            $monstre = $this->currentDonjon->getNextMonster();
            if ($monstre === null) {
                throw new Exception("Le donjon suivant ne contient pas de monstre");
            }
        }

        return $monstre;
    }

    // public function fightCreation(): ?Monstre
    // {

    //     if (!isset($_SESSION['donjon'])) {
    //         $_SESSION['donjon'] = new DonjonGoblin();
    //     }

    //     /** @var Donjon $donjon */
    //     $donjon = $_SESSION['donjon'];


    //     $monstre = $donjon->getNextMonster();


    //     if ($monstre === null) {
    //         unset($_SESSION['donjon']);
    //         unset($_SESSION['fight_number']);
    //     }

    //     return $monstre;
    // }
}
