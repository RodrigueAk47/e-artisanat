<?php

namespace App\Controllers;

use App\Models\CommandeModel;
use Exception;

class OrdersController
{
    public function orders_view(string $title)
    {
        session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: /connexion");
        exit;
    }

    $userId = $_SESSION['user']['id'];

    $model = new \App\Models\CommandeModel();
    $commandes = $model->getOrdersByUserId($userId);

    require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
    require_once __DIR__ .'/../Views/orders_view.php';
    require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function orders_detail_view(string $title)
    {
        session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: /connexion");
        exit;
    }

    if (!isset($_GET['id'])) {
        echo "Identifiant de commande manquant.";
        return;
    }

    $commandeId = intval($_GET['id']);

    $model = new \App\Models\CommandeModel();
    try {
        $data = $model->getCommandeDetails($commandeId);
    } catch (Exception $e) {
        echo $e->getMessage();
        return;
    }

    $commande = $data['commande'];
    $articles = $data['articles'];
        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/orders_detail.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    

    public function order_confirmed_view(string $title)

    {
        session_start();

        if (empty($_SESSION['user']) || empty($_SESSION['cart'])) {
            header('Location: /cart');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $cart = $_SESSION['cart'];

        $orderModel = new CommandeModel();
        $commandeId = $orderModel->addOrderFromSession($userId, $cart);

        // Vider le panier après confirmation
        unset($_SESSION['cart']);

        // Rediriger vers page de confirmation
      

        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/buy_view.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }
}