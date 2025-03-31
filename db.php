<?php
// db.php
$host = 'localhost'; 
$dbname = 'onlinevotingsystem2';
$username = 'root'; 
$password = ''; 
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
