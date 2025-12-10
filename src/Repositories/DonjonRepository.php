<?php

class DonjonRepository
{
    private PDO $db;
    private bool $hasBackgroundColumn = false;

    public function __construct(PDO $db)
    {
        $this->db = $db;
        
        // Détecter si la colonne backgroundUrl existe dans la table `donjon`
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'donjon' AND COLUMN_NAME = 'backgroundUrl'");
            $stmt->execute();
            $count = (int)$stmt->fetchColumn();
            $this->hasBackgroundColumn = $count > 0;
        } catch (Exception $e) {
            // En cas d'erreur (par ex. permissions), on suppose que la colonne n'existe pas
            $this->hasBackgroundColumn = false;
        }
    }

    /**
     * Récupère un donjon avec tous ses monstres et son boss
     */
    public function findDonjonById(int $id): ?array
    {
        $selectCols = 'd.id, d.className' . ($this->hasBackgroundColumn ? ', d.backgroundUrl' : '');
        $request = $this->db->prepare(
            "SELECT $selectCols
             FROM `donjon` d
             WHERE d.id = :id
             LIMIT 1"
        );
        $request->execute(['id' => $id]);
        $donjon = $request->fetch(PDO::FETCH_ASSOC);

        if (!$donjon) {
            return null;
        }

        // Récupérer les monstres du donjon
        $donjon['monstres'] = $this->getMonstresByDonjon($donjon['id']);

        // Récupérer le boss du donjon
        $donjon['boss'] = $this->getBossByDonjon($donjon['id']);

        return $donjon;
    }

    /**
     * Récupère tous les monstres d'un donjon
     */
    private function getMonstresByDonjon(int $donjonId): array
    {
        $request = $this->db->prepare(
            'SELECT DISTINCT m.id, m.className
             FROM `monstre` m
             INNER JOIN `donjon_monstre` dm ON m.id = dm.monstre_id
             WHERE dm.donjon_id = :donjon_id'
        );
        $request->execute(['donjon_id' => $donjonId]);

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère le boss d'un donjon
     */
    private function getBossByDonjon(int $donjonId): ?array
    {
        $request = $this->db->prepare(
            'SELECT b.id, b.className
             FROM `boss` b
             WHERE b.donjon_id = :donjon_id
             LIMIT 1'
        );
        $request->execute(['donjon_id' => $donjonId]);

        return $request->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Récupère le premier donjon (pour débuter l'aventure)
     */
    public function findFirstDonjon(): ?array
    {
        $selectCols = 'd.id, d.className' . ($this->hasBackgroundColumn ? ', d.backgroundUrl' : '');
        $request = $this->db->prepare(
            "SELECT $selectCols
             FROM `donjon` d
             ORDER BY d.id ASC
             LIMIT 1"
        );
        $request->execute();

        $donjon = $request->fetch(PDO::FETCH_ASSOC);
        if (!$donjon) {
            return null;
        }

        $donjon['monstres'] = $this->getMonstresByDonjon($donjon['id']);
        $donjon['boss'] = $this->getBossByDonjon($donjon['id']);

        return $donjon;
    }

    /**
     * Récupère le donjon suivant en fonction de l'id actuel (ORDER BY id ASC)
     */
    public function findNextDonjonId(int $currentId): ?array
    {
        $request = $this->db->prepare(
            'SELECT d.id, d.className
             FROM `donjon` d
             WHERE d.id > :currentId
             ORDER BY d.id ASC
             LIMIT 1'
        );
        $request->execute(['currentId' => $currentId]);
        $row = $request->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }
}