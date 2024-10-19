
<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $max_numeros = $_POST['max_numeros'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $imagen_portada = $_POST['imagen_portada'];

    $stmt = $pdo->prepare("UPDATE rifas SET titulo=:titulo, descripcion=:descripcion, precio=:precio, max_numeros=:max_numeros, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, imagen_portada=:imagen_portada WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':max_numeros', $max_numeros);
    $stmt->bindParam(':fecha_inicio', $fecha_inicio);
    $stmt->bindParam(':fecha_fin', $fecha_fin);
    $stmt->bindParam(':imagen_portada', $imagen_portada);

    if ($stmt->execute()) {
        echo "Rifa actualizada exitosamente.";
    } else {
        echo "Error al actualizar la rifa.";
    }
}
?>
