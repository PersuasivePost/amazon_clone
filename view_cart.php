<?php
$conn = new mysqli('localhost', 'root', '', 'amazon_clone');
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM cart");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart – Amazon Clone</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #e3e6e6;
    }
    .cart-container {
      width: 80%;
      margin: 30px auto;
      background: white;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }
    th {
      background-color: #232f3e;
      color: white;
    }
    .total {
      font-weight: bold;
    }
    .remove-btn {
      background-color: #c45500;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 4px;
      cursor: pointer;
    }
    .nav-logo {
      height: 50px;
      width: 100px;
      display: flex;
      align-items: center;
    }
    .amazon-logo {
      max-height: 100%;
      max-width: 100%;
      object-fit: contain;
    }
    footer {
      background-color: #232f3e;
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 30px;
      font-size: 12px;
    }
    a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>
<body>

<!-- Header -->
<header>
  <div class="navbar">
    <div class="nav-logo border">
      <a href="index.php">
        <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Emblem.jpg" alt="Amazon Logo" class="amazon-logo">
      </a>
    </div>

    <div class="nav-address border">
      <p class="add-first">Deliver to</p>
      <div class="add-icon">
        <i class="fa-solid fa-location-dot"></i>
        <p class="add-sec">India</p>
      </div>
    </div>

    <div class="nav-search">
      <select class="search-select">
        <option>All</option>
      </select>
      <input placeholder="Search Amazon" class="search-input">
      <div class="search-icon">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>

    <div class="nav-signin border">
      <p><span>Hello, sign in</span></p>
      <p class="nav-second">Account & Lists</p>
    </div>

    <div class="nav-return border">
      <p><span>Returns</span></p>
      <p class="nav-second">& Orders</p>
    </div>

    <a href="view_cart.php" class="nav-cart border">
      <i class="fa-solid fa-cart-shopping"></i>
      Cart
    </a>
  </div>

  <div class="panel">
    <div class="panel-all border">
      <i class="fa-solid fa-bars"></i>
      All
    </div>
    <div class="panel-ops">
      <a href="index.php"><p>Home</p></a>
      <a href="clothes.php"><p>Clothes</p></a>
      <p>Customer Service</p>
      <p>Registry</p>
      <p>Gift Cards</p>
      <p>Sell</p>
    </div>
    <div class="panel-deals border">
      Shop deals in Clothing
    </div>
  </div>
</header>

<!-- Cart Content -->
<div class="cart-container">
  <h2>Your Cart</h2>
  <table>
    <tr>
      <th>Product Name</th>
      <th>Price (₹)</th>
      <th>Quantity</th>
      <th>Total</th>
      <th>Action</th>
    </tr>

    <?php
    $grandTotal = 0;
    if ($result->num_rows > 0):
      while ($row = $result->fetch_assoc()):
        $total = $row['price'] * $row['quantity'];
        $grandTotal += $total;
    ?>
    <tr>
      <td><?= htmlspecialchars($row['product_name']) ?></td>
      <td><?= number_format($row['price'], 2) ?></td>
      <td>
        <form method="POST" action="update_cart.php" style="display:flex; justify-content:center; gap:5px;">
          <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
          <select name="quantity" onchange="this.form.submit()">
            <?php for ($i = 1; $i <= 10; $i++): ?>
              <option value="<?= $i ?>" <?= $i == $row['quantity'] ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
          </select>
          <input type="hidden" name="update" value="1">
        </form>
      </td>
      <td><?= number_format($total, 2) ?></td>
      <td>
        <form method="POST" action="update_cart.php">
          <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
          <button type="submit" name="remove" class="remove-btn">Remove</button>
        </form>
      </td>
    </tr>
    <?php endwhile; ?>
    <tr class="total">
      <td colspan="3">Grand Total</td>
      <td colspan="2">₹<?= number_format($grandTotal, 2) ?></td>
    </tr>
    <?php else: ?>
    <tr><td colspan="5">🛒 Your cart is empty!</td></tr>
    <?php endif; ?>
  </table>

  <?php if ($result->num_rows > 0): ?>
    <form action="payment_gateway.php" method="post" style="text-align: center; margin-top: 20px;">
  <input type="hidden" name="grandTotal" value="<?= $grandTotal ?>">
  <button type="submit" style="
    background-color: #ffa41c;
    color: white;
    border: none;
    padding: 12px 30px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
  ">
    Proceed to Pay ₹<?= number_format($grandTotal, 2) ?>
  </button>
</form>
<?php endif; ?>

</div>

<!-- Footer -->
<footer>
  &copy; 2025 Amazon Clone. All rights reserved.
</footer>

</body>
</html>
