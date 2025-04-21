<?php
session_start();
$_SESSION['pay_amount'] = $_POST['grandTotal'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mock Payment – Amazon Clone</title>
  <style>
    body {
      font-family: Arial;
      background: #f2f2f2;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .payment-box {
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    button {
      background-color: #ffa41c;
      border: none;
      padding: 10px 25px;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="payment-box">
    <h2>Payment Gateway</h2>
    <p>Pay using UPI / Netbanking / Card</p>
    <p><strong>Total: ₹<?= number_format($_SESSION['pay_amount'], 2) ?></strong></p>
    <form action="payment_success.php" method="post">
      <button type="submit">Confirm Payment</button>
    </form>
  </div>
</body>
</html>
