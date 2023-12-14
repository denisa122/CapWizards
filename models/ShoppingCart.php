<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

use models\BaseModel;

class ShoppingCart extends BaseModel
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Initialize the cart 
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addToCart($productID, $productName, $variationID, $quantity, $price, $imgUrl)
    {
        $key = $productID . '_' . $variationID;

        if (isset($_SESSION['cart'][$key])) {
            // Product already exists in cart, update quantity
            $_SESSION['cart'][$key]['quantity'] += $quantity;
        } else {
            // Add new item to the cart
            $_SESSION['cart'][$key] = [
                'productID' => $productID,
                'productName' => $productName,
                'variationID' => $variationID,
                'quantity' => $quantity,
                'price' => $price,
                'imgUrl' => $imgUrl,
            ];
        }
    }

    public function updateQuantity($productID, $variationID, $quantity)
    {
        $key = $productID . '_' . $variationID;

        if (isset($_SESSION['cart'][$key])) {
            // Update the quantity for an existing item in the cart
            $_SESSION['cart'][$key]['quantity'] = $quantity;
        }
    }

    public function removeItem($productID, $variationID)
    {
        $key = $productID . '_' . $variationID;

        if (isset($_SESSION['cart'][$key])) {
            unset($_SESSION['cart'][$key]);
        }
    }

    public function getCartContents()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public function getCartItemsForDisplay()
    {
        $cartItems = $this->getCartContents();
        $displayItems = [];

        foreach ($cartItems as $item) {
            $displayItems[] = $this->cartItemTemplate($item);
        }

        return $displayItems;
    }

    public function clearCart()
    {
        $_SESSION['cart'] = [];
    }

    public function cartItemTemplate($item)
    {
        $baseURL = BASE_URL;

        return "
        <article class='product-w gap-50 margin-100' style='margin-left:100px; display:flex; flex-direction: row; width:800px;'>
        <img class='img-150 margin-30' src='{$item['imgUrl']}' style='margin-right:50px'>
        <a class='text-decoration-none product-card' href=''>
            <h2 class='h2-black margin-15'>{$item['productName']}</h2>
            <h3 class='h2-black margin-15'>Quantity: {$item['quantity']}</h3>
            <h3 class='font-weight-bold gap-50'>Price per item:{$item['price']} DKK </h3>
        </a>
        </article>
    ";
    }
}
