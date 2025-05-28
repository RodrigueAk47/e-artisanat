<?php

namespace App\Models;
use Core\Database;
use PDO;

class ProductsModel
{

    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    // Get all products by category id
    public function getAllProductsByCategoryId(int $categoryId): array
    {
        $sql = "SELECT p.*, u.file_url as img_url FROM products p INNER JOIN uploads u ON p.img_id = u.id WHERE p.category_id = :category_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get product by id
    public function getProductById(int $id): array
{
    $sql = "SELECT p.*, u.file_url as img_url
            FROM products p
            INNER JOIN uploads u ON p.img_id = u.id
            WHERE p.id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result !== false ? $result : []; 
}


    // get authorNameAndIdByProductId
    public function getAuthorNameAndIdByProductId(int $productId): array
    {
        $sql = "SELECT u.id, u.first_name, u.last_name FROM users u INNER JOIN products p ON u.id = p.author_id WHERE p.id = :product_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // get all products by author id
    public function get(int $authorId): array
    {
        $sql = "SELECT p.*, u.file_url as img_url FROM products p INNER JOIN uploads u ON p.img_id = u.id WHERE p.author_id = :author_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get all products and categories by author id
    public function getAllProductsAndCategoriesByAuthorId(int $authorId): array
    {
        $sql = "SELECT p.id, p.name, p.price, p.stock, c.name AS category_name, u.file_url as img_url FROM products p INNER JOIN products_categories c ON p.category_id = c.id INNER JOIN uploads u ON p.img_id = u.id WHERE p.author_id = :author_id ORDER BY p.id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':author_id', $authorId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // edit product by id
    public function editProductById(int $id, array $data): bool
    {
        $sql = "UPDATE products SET name = :name, category_id = :category_id, price = :price, stock = :stock, description = :description WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':category_id', $data['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // delete product by id
    public function deleteProductById(int $id): bool
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // add new product
    public function addProduct(array $data): bool
    {
        $sql = "INSERT INTO products (name, category_id, price, stock, description, author_id, img_id, dimensions, origin, material
                ) VALUES (
                    :name, :category_id, :price, :stock, :description, :author_id, :img_id, :dimensions, :origin, :material
                )";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':category_id', $data['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $data['price'], PDO::PARAM_STR);
        $stmt->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':author_id', $data['author_id'], PDO::PARAM_INT);
        $stmt->bindParam(':img_id', $data['img_id'], PDO::PARAM_INT);
        $stmt->bindParam(':dimensions', $data['dimensions']);
        $stmt->bindParam(':origin', $data['origin']);
        $stmt->bindParam(':material', $data['material']);
        return $stmt->execute();
    }

    // get products by array key
    public function getProductsByArrayKey(array $ids): array
    {
        if (empty($ids)) {
            return [];
        }
        $placeholders = rtrim(str_repeat('?,', count($ids)), ',');
        $sql = "SELECT p.*, u.file_url as img_url, a.last_name as artisan_last_name, a.first_name as artisan_first_name, a.id as artisan_id FROM products p INNER JOIN uploads u ON p.img_id = u.id INNER JOIN users a ON p.author_id = a.id WHERE p.id IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($ids);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}