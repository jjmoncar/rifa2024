
<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $max_numeros = $_POST['max_numeros'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $imagen_portada = $_POST['imagen_portada'];

    $stmt = $pdo->prepare("INSERT INTO rifas (titulo, descripcion, precio, max_numeros, fecha_inicio, fecha_fin, imagen_portada) 
                           VALUES (:titulo, :descripcion, :precio, :max_numeros, :fecha_inicio, :fecha_fin, :imagen_portada)");
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':max_numeros', $max_numeros);
    $stmt->bindParam(':fecha_inicio', $fecha_inicio);
    $stmt->bindParam(':fecha_fin', $fecha_fin);
    $stmt->bindParam(':imagen_portada', $imagen_portada);

    if ($stmt->execute()) {
        echo "Rifa creada exitosamente.";
    } else {
        echo "Error al crear la rifa.";
    }
}
?>
