<?php
// db.php
$host = 'localhost'; // or your database host
$dbname = 'onlinevotingsystem2';
$username = 'root'; // your database username
$password = ''; // your database password (often empty by default in XAMPP)
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
