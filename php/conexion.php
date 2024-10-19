// db.php
<?php
$host = 'localhost';
$db = 'rifaweb';  // Nombre de la base de datos
$user = 'root';     // Usuario de la base de datos
$pass = '';         // Contraseña del usuario

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
