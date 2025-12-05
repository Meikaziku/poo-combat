<?php

class HeroRepository
{

    private PDO $db;
    private HeroMapper $mapper;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->mapper = new HeroMapper();
    }

    public function insertHero(Hero $hero): bool
    {
        $heroExist = $this->findHeroByname($hero->getNom());
        if ($heroExist) {
            return false;
        }

        $request = $this->db->prepare('INSERT INTO `hero` (nom, hp, attaque, max_hp, img) VALUES (:nom, :hp, :attaque, :max_hp, :img)');
        return $request->execute([
            'nom' => $hero->getNom(),
            'hp' => $hero->getHp(),
            'attaque' => $hero->getAttaque(),
            'max_hp' => $hero->getMax_hp(),
            'img' => $hero->getImg(),


        ]);
    }

    public function findHeroByname(string $nom): ?Hero
    {
        $request = $this->db->prepare('SELECT * FROM `hero` WHERE nom = :nom');
        $request->execute(['nom' => $nom]);
        $userData = $request->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            return null;
        }

        return $this->mapper->mapToObject($userData);
    }

    public function findHeroById(int $id): ?Hero
    {
        $request = $this->db->prepare('SELECT * FROM `hero` WHERE id = :heroId');
        $request->execute(['heroId' => $id]);
        $heroData = $request->fetch(PDO::FETCH_ASSOC);

        if ($heroData === false) {
            return null;
        }

        return $this->mapper->mapToObject($heroData);
    }

    public function findAllHero(): array
    {
        $request = $this->db->prepare('SELECT * FROM `hero`');
        $request->execute();
        $heroDatas = $request->fetchAll(PDO::FETCH_ASSOC);
        return $heroDatas;
    }

    public function saveStats(Hero $hero): ?Hero
    {
        $request = $this->db->prepare(
            'UPDATE `hero` 
         SET `nom`= :nom, `hp`= :hp, `attaque`= :attaque, `max_hp`= :max_hp
         WHERE id = :id'
        );

        $request->execute([
            'id' => $hero->getId(),
            'nom' => $hero->getNom(),
            'hp' => $hero->getHp(),
            'attaque' => $hero->getAttaque(),
            'max_hp' => $hero->getMax_hp(),
        ]);

        return $hero; 
    }
}
