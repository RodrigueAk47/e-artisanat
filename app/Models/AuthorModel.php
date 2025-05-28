<?php

namespace App\Models;

use Core\Database;
use PDO;

class AuthorModel extends UserModel
{
   // get author by id
   public function get_author_by_id($id): array
   {
       $sql = "SELECT * FROM authors WHERE user_id = :id";
       $stmt = $this->db->prepare($sql);
       $stmt->execute([':id' => $id]);
       return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   // isAuthor
    public function isAuthor($id): bool
    {
         $sql = "SELECT * FROM authors WHERE user_id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->execute([':id' => $id]);
         return $stmt->rowCount() > 0;
    }

    public function countProducts(int $authorId): int
    {
        $sql = "SELECT COUNT(*) FROM products WHERE author_id = :aid";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':aid' => $authorId]);
        return (int)$stmt->fetchColumn();
    }

    public function getRecentProducts(int $authorId, int $limit = 5): array
    {
        $sql = "SELECT p.id, p.name, pc.name AS category_name, p.price, p.stock
                FROM products p
                JOIN products_categories pc ON p.category_id = pc.id
                WHERE p.author_id = :aid
                ORDER BY p.created_at DESC
                LIMIT :lim";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':aid', $authorId, PDO::PARAM_INT);
        $stmt->bindValue(':lim', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Nombre total de commandes reçues pour un auteur
    public function countOrders(int $authorId): int
    {
        $sql = "SELECT COUNT(*) 
                FROM commandes c
                JOIN ligne_commandes lc ON lc.commande_id = c.id
                JOIN products p ON p.id = lc.product_id
                WHERE p.author_id = :aid";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':aid' => $authorId]);
        return (int)$stmt->fetchColumn();
    }

    // Récupérer les dernières commandes reçues (limit)
    public function getRecentOrders(int $authorId, int $limit = 5): array
    {
        $sql = "SELECT DISTINCT c.id, u.first_name || ' ' || u.last_name AS client,
                        c.total, c.statut, c.date_commande
                FROM commandes c
                JOIN users u ON u.id = c.user_id
                JOIN ligne_commandes lc ON lc.commande_id = c.id
                JOIN products p ON p.id = lc.product_id
                WHERE p.author_id = :aid
                ORDER BY c.date_commande DESC
                LIMIT :lim";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':aid', $authorId, PDO::PARAM_INT);
        $stmt->bindValue(':lim', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}