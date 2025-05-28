<?php
namespace App\Controllers;

use App\Models\MessageModel;

class MessageController
{
    // Page de négociation pour un produit
    public function negotiate_view()
    {
        session_start();
        // 1. Valider le paramètre product_id
    $productId = isset($_GET['product_id']) && ctype_digit($_GET['product_id'])
               ? (int) $_GET['product_id']
               : 0;
    if ($productId <= 0) {
        header('Location: /'); // ou /404
        exit;
    }

    // 2. Charger le produit et vérifier qu'il existe
    $prodModel = new \App\Models\ProductsModel();
    $prod = $prodModel->getProductById($productId);
    if (empty($prod)) {
        header('Location: /'); // produit introuvable
        exit;
    }

    $receiverId = $prod['author_id'];
        $userId    = $_SESSION['user']['id'] ?? null;
        $productId = (int)($_GET['product_id'] ?? 0);

        // Récupérer auteur du produit
        $prodModel = new \App\Models\ProductsModel();
        $prod      = $prodModel->getProductById($productId);
        $receiverId = $prod['author_id'];

        $msgModel  = new MessageModel();

        // Envoi du message si POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = trim($_POST['content'] ?? '');
            $offer   = $_POST['offer'] !== '' ? (float)$_POST['offer'] : null;
            if ($content !== '') {
                $msgModel->send($productId, $userId, $receiverId, $content, $offer);
                header("Location: /negocier?product_id=$productId");
                exit;
            }
        }

        // Charger la conversation
        $conversation = $msgModel->getConversation($productId, $userId, $receiverId);

        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/messages/negotiate_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    // Boîte de réception de l’auteur
    public function inbox_view()
    {
        session_start();
        $authorId = $_SESSION['user']['id'] ?? null;
        $msgModel = new MessageModel();
        $inbox    = $msgModel->getInboxForAuthor($authorId);

        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ . '/../Views/authors/messages/inbox_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
}
