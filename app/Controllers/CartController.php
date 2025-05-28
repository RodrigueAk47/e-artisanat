<?php
namespace App\Controllers;



class CartController
{
    // add to cart with quantity
    public function addToCart(int $id, int $quantity = 1)
    {
        session_start();

        // Initialize cart if not already done
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        // Check if product already exists in cart
        if (isset($_SESSION['cart'][$id])) {
            // If it exists, update the quantity
            $_SESSION['cart'][$id] += $quantity;
        } else {
            // If it doesn't exist, add it to the cart with the specified quantity
            $_SESSION['cart'][$id] = $quantity;
        }
        // Redirect to the cart page
        header('Location: /cart');
        exit();
    }

    // get cart items
    public static function getCartItems()
    {
        
        return $_SESSION['cart'] ?? [];
    }

    // remove item from cart
    public static function removeFromCart(int $id)
    {
        session_start();

        // Check if the cart exists and the item is in the cart
        if (isset($_SESSION['cart'][$id])) {
            // Remove the item from the cart
            unset($_SESSION['cart'][$id]);
        }
        // Redirect to the cart page
        header('Location: /cart');
        exit();
    }

    // 


}
