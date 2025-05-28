<?php

namespace App\Models;

use Core\Database;
use PDO;
use Exception;

class CommandeModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // ✅ Créer une commande à partir du panier en session
    public function addOrderFromSession(int $userId, array $panier, ?string $adresseLivraison = null): int
    {
        $ids = array_keys($panier);
        if (empty($ids)) {
            throw new Exception("Panier vide");
        }

        // 1. Récupération des produits
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "SELECT id, price FROM products WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($ids);
        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 2. Calcul du total
        $total = 0;
        foreach ($produits as $prod) {
            $id = $prod['id'];
            $qte = $panier[$id];
            $prix = $prod['price'];
            $total += $prix * $qte;
        }

        // 3. Création de la commande
        $sqlCommande = "INSERT INTO commandes (user_id, statut, total, adresse_livraison)
                        VALUES (:uid, 'En attente', :total, :adresse) RETURNING id";
        $stmt = $this->db->prepare($sqlCommande);
        $stmt->execute([
            ':uid' => $userId,
            ':total' => $total,
            ':adresse' => $adresseLivraison ?? 'Non précisée'
        ]);
        $commandeId = $stmt->fetchColumn();

        // 4. Ajout des lignes de commande
        $sqlLigne = "INSERT INTO ligne_commandes (commande_id, product_id, quantite, prix_unitaire)
                     VALUES (:cid, :pid, :qte, :prix)";
        $stmtLigne = $this->db->prepare($sqlLigne);

        foreach ($produits as $prod) {
            $id = $prod['id'];
            $qte = $panier[$id];
            $prix = $prod['price'];

            $stmtLigne->execute([
                ':cid' => $commandeId,
                ':pid' => $id,
                ':qte' => $qte,
                ':prix' => $prix
            ]);
        }

        return $commandeId;
    }

    // ✅ Dernières commandes d'un utilisateur
    public function getOrdersByUserId(int $userId): array
{
    $sql = "SELECT * FROM commandes WHERE user_id = :id ORDER BY date_commande DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // ✅ Obtenir le détail d'une commande
    public function getOrderDetails(int $orderId): array
    {
        $sql = "SELECT * FROM commandes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $orderId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Obtenir les lignes de la commande
    public function getOrderLines(int $orderId): array
    {
        $sql = "SELECT lc.*, p.name, u.file_url
                FROM ligne_commandes lc
                JOIN products p ON lc.product_id = p.id
                JOIN uploads u ON p.img_id = u.id
                WHERE lc.commande_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $orderId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommandeDetails(int $commandeId): array
{
    // Infos générales de la commande
    $sql1 = "SELECT c.*, u.phone_number, u.address
             FROM commandes c
             JOIN users u ON u.id = c.user_id
             WHERE c.id = :id";
    $stmt1 = $this->db->prepare($sql1);
    $stmt1->execute([':id' => $commandeId]);
    $commande = $stmt1->fetch(PDO::FETCH_ASSOC);

    if (!$commande) {
        throw new Exception("Commande introuvable");
    }

    // Articles commandés
    $sql2 = "SELECT p.name, p.description, p.price AS prix_unitaire, l.quantite, u.file_url AS img_url
             FROM ligne_commandes l
             JOIN products p ON l.product_id = p.id
             JOIN uploads u ON u.id = p.img_id
             WHERE l.commande_id = :id";
    $stmt2 = $this->db->prepare($sql2);
    $stmt2->execute([':id' => $commandeId]);
    $articles = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    return ['commande' => $commande, 'articles' => $articles];
}

    /**
     * Récupère toutes les lignes de commandes pour les produits d'un auteur
     * @param int $authorId
     * @return array
     */
    public function getOrdersByAuthorId(int $authorId): array
    {
        $sql = "
            SELECT
                c.id AS commande_id,
                c.date_commande,
                p.name           AS produit,
                lc.quantite,
                (lc.quantite * lc.prix_unitaire) AS total_ligne,
                c.statut
            FROM ligne_commandes lc
            JOIN products p     ON lc.product_id = p.id
            JOIN commandes c    ON lc.commande_id = c.id
            WHERE p.author_id = :aid
            ORDER BY c.date_commande DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':aid', $authorId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
