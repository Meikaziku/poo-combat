<?php

abstract class Donjon
{

    private int $id;
    private string $nom;
    private array $monstres;
    private string $bossClass;
    private ?string $backgroundUrl = null;
    private int $currentFight;

    public function __construct(int $id, string $nom, array $monstres, string $bossClass)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->monstres = $monstres;
        $this->bossClass = $bossClass;
        $this->currentFight = 1;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of monstres
     */
    public function getMonstres()
    {
        return $this->monstres;
    }

    public function getNextMonster(): ?Monstre
    {

        if ($this->currentFight <= 6) {
            $monsterClass = $this->monstres[array_rand($this->monstres)];
            $monster = new $monsterClass($this->currentFight);
            $this->currentFight++;
            return $monster;
        }

        if ($this->currentFight === 7) {
            $this->currentFight++;
            return new $this->bossClass(999);
        }

        // Donjon terminé
        return null;
    }

    /**
     * Set the current fight number (used to restore progress from session)
     */
    public function setCurrentFight(int $n): void
    {
        $this->currentFight = max(0, $n);
    }

    /**
     * Get the current fight number
     */
    public function getCurrentFight(): int
    {
        return $this->currentFight;
    }

    /**
     * Set background image URL for the donjon
     */
    public function setBackgroundUrl(?string $url): void
    {
        $this->backgroundUrl = $url;
    }

    /**
     * Get background image URL for the donjon
     */
    public function getBackgroundUrl(): ?string
    {
        return $this->backgroundUrl;
    }

    // public function getNextDonjon(): ?Monstre

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }
}
