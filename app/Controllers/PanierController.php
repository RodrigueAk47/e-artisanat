<?php

namespace App\Controllers;
use App\Models\CartModel;
use App\Models\ProductsModel;

class PanierController
{
    public function panier(string $title)
    {
        session_start();

        $cartItemKeys = array_keys(CartController::getCartItems());
        $cartItems = CartController::getCartItems();
        
        $productModel = new ProductsModel();
        $cartItems = $productModel->getProductsByArrayKey($cartItemKeys);
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'];
        }

        require_once __DIR__ . '/../Views/layouts/layouts_header_part.php';
        require_once __DIR__ .'/../Views/panier.php';
        require_once __DIR__ . '/../Views/layouts/layouts_footer_part.php';
    }

    public function removeFromCart()
    {
        CartController::removeFromCart((int)$_GET['id']);
        header('Location: /cart');
        exit();
    }
}