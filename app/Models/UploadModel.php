<?php

namespace App\Models;
use Core\Database;
use PDO;

class UploadModel
{

    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function uploadFile(string $filePath, string $fileName, int $authorId): bool
    {
        $sql = "INSERT INTO uploads (file_url, title, author_id) VALUES (:file_url, :title, :author_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':file_url', $filePath);
        $stmt->bindParam(':title', $fileName);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getUploadsByAuthorId(int $authorId): array
    {
        $sql = "SELECT * FROM uploads WHERE author_id = :author_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}