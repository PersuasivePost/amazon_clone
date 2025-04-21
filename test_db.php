<?php
// test_db.php
$host   = 'localhost';
$db     = 'amazon_clone';    // ← your database name
$user   = 'root';            // ← your DB username
$pass   = '';                // ← your DB password (often blank on XAMPP)
$charset= 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo "✅ Connected to MySQL successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
