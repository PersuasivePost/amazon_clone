<?php
$conn = new mysqli('localhost', 'root', '', 'amazon_clone');
$conn->query("DELETE FROM cart");
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Success</title>
  <style>
    body {
      font-family: Arial;
      background: #e3e6e6;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      text-align: center;
    }
    .success-box {
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    .success-box h2 {
      color: green;
    }
    .success-box a {
      display: inline-block;
      margin-top: 20px;
      background-color: #ffa41c;
      color: white;
      text-decoration: none;
      padding: 10px 25px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="success-box">
    <h2>✅ Transaction Successful!</h2>
    <p>Your payment has been received.</p>
    <a href="index.php">Continue Shopping</a>
  </div>
</body>
</html>
