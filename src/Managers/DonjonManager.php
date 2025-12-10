<?php

class DonjonManager
{
    private DonjonRepository $donjonRepository;

    public function __construct(PDO $db)
    {
        $this->donjonRepository = new DonjonRepository($db);
    }

    /**
     * Instancie un donjon complet avec tous ses monstres et boss
     */
    public function initializeDonjon(int $donjonId): ?Donjon
    {
        $donjonData = $this->donjonRepository->findDonjonById($donjonId);

        if (!$donjonData) {
            return null;
        }

        return $this->buildDonjon($donjonData);
    }

    /**
     * Récupère le premier donjon et l'instancie
     */
    public function getFirstDonjon(): ?Donjon
    {
        $donjonData = $this->donjonRepository->findFirstDonjon();

        if (!$donjonData) {
            return null;
        }

        return $this->buildDonjon($donjonData);
    }

    /**
     * Récupère le premier donjon et retourne un tableau ['id'=>int, 'donjon'=>Donjon]
     */
    public function getFirstDonjonWithId(): ?array
    {
        $donjonData = $this->donjonRepository->findFirstDonjon();

        if (!$donjonData) {
            return null;
        }

        return ['donjon' => $this->buildDonjon($donjonData)];
    }

    /**
     * Récupère le donjon suivant après l'id fourni et retourne ['id'=>int, 'donjon'=>Donjon] ou null
     */
    public function getDonjonAfterWithId(int $currentId): ?Donjon
    {
        $next = $this->donjonRepository->findNextDonjonId($currentId);
        if (!$next) {
            return null;
        }

        $donjonData = $this->donjonRepository->findDonjonById((int)$next['id']);
        if (!$donjonData) {
            return null;
        }
        

        return $this->buildDonjon($donjonData);
    }

    /**
     * Récupère et instancie le donjon suivant après l'id fourni.
     * Retourne null si aucun donjon suivant.
     */
    public function getDonjonAfterId(int $currentId): ?Donjon
    {
        $next = $this->donjonRepository->findNextDonjonId($currentId);
        if (!$next) {
            return null;
        }

        return $this->initializeDonjon((int)$next['id']);
    }

    /**
     * Construit l'instance Donjon à partir des données BDD
     */
    private function buildDonjon(array $donjonData): Donjon
    {

        
        $monstres = $donjonData['monstres'];
        $boss = $donjonData['boss'];        

        // Extraire les classNames des monstres
        $monstreClassNames = array_map(fn($m) => $m['className'], $monstres);

        // Récupérer le className du boss
        $bossClassName = $boss['className'] ?? 'GoblinBoss';

       
        // Instancier le donjon via la Factory
        return EntityFactory::createDonjon(
            $donjonData['id'],
            $donjonData['className'],
            $monstreClassNames,
            $bossClassName
        );
    }
}