<?php
// add_to_cart.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

$mysqli = new mysqli('localhost', 'root', '', 'amazon_clone');
if ($mysqli->connect_errno) {
    http_response_code(500);
    exit('DB connect error: ' . $mysqli->connect_error);
}

$product_id   = $_POST['product_id']   ?? '';
$product_name = $_POST['product_name'] ?? '';
$price        = (float) ($_POST['price'] ?? 0);
$quantity     = (int)   ($_POST['quantity'] ?? 1);

// Check if product already exists in the cart
$check = $mysqli->prepare("SELECT quantity FROM cart WHERE product_id = ?");
$check->bind_param("s", $product_id);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    // If it exists, update the quantity
    $update = $mysqli->prepare("UPDATE cart SET quantity = quantity + ? WHERE product_id = ?");
    $update->bind_param("is", $quantity, $product_id);
    if ($update->execute()) {
        echo "🛒 Quantity updated in cart";
    } else {
        http_response_code(500);
        echo "❌ Update failed: " . $update->error;
    }
    $update->close();
} else {
    // Else, insert it as new
    $insert = $mysqli->prepare("INSERT INTO cart (product_id, product_name, price, quantity) VALUES (?, ?, ?, ?)");
    $insert->bind_param("ssdi", $product_id, $product_name, $price, $quantity);
    if ($insert->execute()) {
        echo "✅ Added to cart";
    } else {
        http_response_code(500);
        echo "❌ Insert failed: " . $insert->error;
    }
    $insert->close();
}

$check->close();
$mysqli->close();
