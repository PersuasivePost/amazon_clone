<?php
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    }
    // Validate password
    elseif (strlen($password) < 6 || !preg_match('/\d/', $password)) {
        $error = "Password must be at least 6 characters long and contain at least one number.";
    } else {
        $conn = new mysqli("localhost", "root", "", "amazon_clone");

        if ($conn->connect_error) {
            die("DB Connection failed: " . $conn->connect_error);
        }

        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $error = "Email already registered.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $hashed);
            if ($stmt->execute()) {
                header("Location: index.php");
                exit;
            } else {
                $error = "Registration failed.";
            }
        }
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register – Amazon Clone</title>
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
    .register-container {
      background-color: white;
      border: 1px solid #ddd;
      padding: 30px;
      width: 300px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .register-container h2 {
      margin-bottom: 20px;
    }
    .register-container label {
      display: block;
      margin: 10px 0 5px;
    }
    .register-container input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
    }
    .register-container button {
      width: 100%;
      padding: 10px;
      background-color: #f0c14b;
      border: 1px solid #a88734;
      cursor: pointer;
    }
    .register-container .small-text {
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

  <div class="register-container">
    <form method="post" action="">
      <h2>Create account</h2>
      <?php if ($error): ?>
        <p class="error-msg"><?= $error ?></p>
      <?php endif; ?>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <button type="submit">Create your account</button>

      <p class="small-text">
        By creating an account, you agree to Amazon Clone’s <a href="#">Conditions of Use</a> and <a href="#">Privacy Notice</a>.
      </p>
    </form>
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
