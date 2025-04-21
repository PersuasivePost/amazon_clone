<?php
session_start();
$error = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to DB
    $conn = new mysqli("localhost", "root", "", "amazon_clone");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Incorrect email or password.";
        }
    } else {
        $error = "Incorrect email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login – Amazon Clone</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .logo {
      margin: 20px 0;
    }
    .logo img {
      height: 40px;
    }
    .login-container {
      background-color: white;
      border: 1px solid #ddd;
      padding: 30px;
      width: 300px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .login-container h2 {
      margin-bottom: 20px;
    }
    .login-container label {
      display: block;
      margin: 10px 0 5px;
    }
    .login-container input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
    }
    .login-container button {
      width: 100%;
      padding: 10px;
      background-color: #f0c14b;
      border: 1px solid #a88734;
      cursor: pointer;
    }
    .login-container .small-text {
      font-size: 12px;
      margin-top: 10px;
    }
    .error-msg {
      color: red;
      font-size: 14px;
    }
    footer {
      margin-top: 40px;
      text-align: center;
      font-size: 12px;
      color: #555;
    }
    .footer-links a {
      margin: 0 10px;
      color: #007185;
      text-decoration: none;
    }
    .footer-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="logo">
    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon Clone Logo">
  </div>

  <div class="login-container">
    <form method="post" action="">
      <h2>Sign-In</h2>
      <?php if ($error): ?>
        <p class="error-msg"><?= $error ?></p>
      <?php endif; ?>
      <label>Email</label>
      <input type="email" name="email" required>
      
      <label>Password</label>
      <input type="password" name="password" required>

      <button type="submit" name="login">Continue</button>

      <p class="small-text">
        By continuing, you agree to Amazon Clone’s <a href="#">Conditions of Use</a> and <a href="#">Privacy Notice</a>.
      </p>
    </form>
    <hr>
    <p class="small-text">New to Amazon Clone?</p>
    <a href="register.php">
      <button>Create your Amazon Clone account</button>
    </a>
  </div>

  <footer>
    <div class="footer-links">
      <a href="#">Conditions of Use</a>
      <a href="#">Privacy Notice</a>
      <a href="#">Help</a>
    </div>
    <p>&copy; 2025, Amazon Clone</p>
  </footer>
</body>
</html>
