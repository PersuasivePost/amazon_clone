<?php
$conn = new mysqli('localhost', 'root', '', 'amazon_clone');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = $_POST['product_id'];

if (isset($_POST['update'])) {
    $quantity = max(1, (int)$_POST['quantity']);
    $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE product_id = ?");
    $stmt->bind_param("is", $quantity, $product_id);
    $stmt->execute();
    $stmt->close();
} elseif (isset($_POST['remove'])) {
    $stmt = $conn->prepare("DELETE FROM cart WHERE product_id = ?");
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
header("Location: view_cart.php");
exit();
