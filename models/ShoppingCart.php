<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class ShoppingCart extends BaseModel
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }

        // Initialize the cart 
        if (!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = [];
        }
    }

    public function addToCart ($productID, $variationID, $quantity, $price)
    {
        $key = $productID . '_' . $variationID;

        if (isset($_SESSION['cart'][$key]))
        {
            // Product already exists in the cart, update quantity
            $_SESSION['cart'][$key]['quantity'] += $quantity;
        } else {
            // Add a new item to the cart
            $_SESSION['cart'][$key] = [
                'productID' => $productID,
                'variationID' => $variationID,
                'quantity' => $quantity,
                'price' => $price,
            ];
        }
    }

    public function updateQuantity ($productID, $variationID, $quantity)
    {
        $key = $productID . '_' . $variationID;

        if (isset($_SESSION['cart'][$key]))
        {
            // Update the quantity for an existing item in the cart
            $_SESSION['cart'][$key]['quantity'] = $quantity;
        }
    }

    public function removeItem ($productID, $variationID)
    {
        $key = $productID . '_' . $variationID;

        if (isset($_SESSION['cart'][$key]))
        {
            // Remove an item from the cart
            unset($_SESSION['cart'][$key]);
        }
    }

    public function getCartContents()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
   
    }

    public function getCartItemsForDisplay()
    {
        $cartItems = $this -> getCartContents();
        $displayItems = [];

        foreach ($cartItems as $item)
        {
            $displayItems[] = $this -> cartItemTemplate($item);
        }

        return $displayItems;
    }

    public function clearCart()
    {
        // C;ear the entire cart
        $_SESSION['cart'] = [];
    }

    public function cartItemTemplate($item)
    {
        return "
        <div class='cart-item'>
            <p>Product ID: {$item['productID']}</p>
            <p>Variation ID: {$item['variationID']}</p>
            <p>Quantity: {$item['quantity']}</p>
            <p>Price: {$item['price']}</p>
        </div>
    ";
    }
}
?>