<?php
namespace App\Models;

use Core\Database;
use PDO;

class MessageModel
{
    private PDO $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // Enregistrer un message / offre
    public function send(int $productId, int $senderId, int $receiverId, string $content, ?float $offer = null): bool
    {
        $sql = "INSERT INTO messages 
                (product_id, sender_id, receiver_id, content, offer)
                VALUES (:pid, :sid, :rid, :content, :offer)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':pid'     => $productId,
            ':sid'     => $senderId,
            ':rid'     => $receiverId,
            ':content' => $content,
            ':offer'   => $offer
        ]);
    }

    // Récupérer tout le fil pour un produit entre deux utilisateurs
    public function getConversation(int $productId, int $userA, int $userB): array
    {
        $sql = "SELECT m.*, 
                       u1.first_name AS sender_first, u1.last_name AS sender_last, 
                       u2.first_name AS recv_first,   u2.last_name   AS recv_last
                FROM messages m
                JOIN users u1 ON m.sender_id   = u1.id
                JOIN users u2 ON m.receiver_id = u2.id
                WHERE m.product_id = :pid
                  AND ((m.sender_id = :a AND m.receiver_id = :b)
                    OR (m.sender_id = :b AND m.receiver_id = :a))
                ORDER BY m.created_at ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':pid' => $productId,
            ':a'   => $userA,
            ':b'   => $userB
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Pour l’auteur : récupérer tous les produits et dernières n messages pour chaque
    public function getInboxForAuthor(int $authorId): array
{
    $sql = "
        SELECT DISTINCT ON (
            m.product_id,
            least(m.sender_id, m.receiver_id),
            greatest(m.sender_id, m.receiver_id)
        )
            m.product_id,
            p.name AS product_name,
            CASE 
              WHEN m.sender_id = :aid THEN m.receiver_id 
              ELSE m.sender_id 
            END AS correspondent_id,
            u.first_name || ' ' || u.last_name AS correspondent,
            m.content,
            m.offer,
            m.created_at
        FROM messages m
        JOIN products p ON p.id = m.product_id
        JOIN users u    ON u.id = CASE 
                                    WHEN m.sender_id = :aid THEN m.receiver_id 
                                    ELSE m.sender_id 
                                  END
        WHERE p.author_id = :aid
        ORDER BY
            m.product_id,
            least(m.sender_id, m.receiver_id),
            greatest(m.sender_id, m.receiver_id),
            m.created_at DESC
    ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':aid', $authorId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
