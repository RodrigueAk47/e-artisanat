<?php
namespace App\Models;
use Core\Database;
use PDO;

class CommentsModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addComment(int $userId, int $productId, string $content): bool {
        $sql = "INSERT INTO comments (user_id, product_id, content) VALUES (:user_id, :product_id, :content)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    public function getCommentsByProduct(int $productId): array {
        $sql = "SELECT c.*, u.first_name, u.last_name FROM comments c 
                JOIN users u ON c.user_id = u.id 
                WHERE c.product_id = :product_id 
                ORDER BY c.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
