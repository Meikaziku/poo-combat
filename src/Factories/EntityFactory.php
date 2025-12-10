<?php

class EntityFactory
{
    /**
     * Instancie une classe à partir de son className
     * 
     * @param string $className Le nom de la classe (ex: "GoblinCombattant")
     * @param array $params Les paramètres du constructeur
     * @return object L'instance de la classe
     * @throws Exception Si la classe n'existe pas
     */
    public static function create(string $className, array $params = []): object
    {
        
        if (!class_exists($className)) {
            throw new Exception("Classe '$className' non trouvée");
        }

        return new $className(...$params);
    }

    /**
     * Instancie un Monstre à partir de son className
     */
    public static function createMonster(string $className, int $id, string $nom = ""): Monstre
    {
        if (empty($nom)) {
            $nom = "$className #$id";
        }

        return self::create($className, [$id, $nom]);
    }

    /**
     * Instancie un Donjon à partir de son className
     */
    public static function createDonjon(int $id, string $className, array $monstres, string $bossClass, ?string $backgroundUrl = null): Donjon
    {
        /** @var Donjon $donjon */
        // Try to instantiate the Donjon with the ($monstres, $bossClass) constructor first.
        // Some concrete Donjon classes (e.g. DonjonGoblin) accept no constructor arguments,
        // so if instantiation with args fails we fallback to parameterless construction.

        
        try {
            $donjon = self::create($className, [$id, $monstres, $bossClass]);
        } catch (ArgumentCountError | TypeError | Exception $e) {
            // fallback: try without params
            $donjon = self::create($className, []);
        }

        // if background provided, set it
        if ($backgroundUrl !== null && method_exists($donjon, 'setBackgroundUrl')) {
            $donjon->setBackgroundUrl($backgroundUrl);
        }

        return $donjon;
    }
}