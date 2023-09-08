<?php
// Database credentials
$host = 'localhost'; // Change this to your database server hostname
$dbname = 'clinic';
$username = 'root'; // Change this to your database username
$password = ''; // Change this to your database password

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
