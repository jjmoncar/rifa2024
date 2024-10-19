<?php
include 'db.php';

// Verificar si se ha recibido un ID válido por GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos de la rifa desde la base de datos
    $stmt = $pdo->prepare("SELECT * FROM rifas WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $rifa = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si la rifa existe
    if ($rifa) {
        // Si la rifa existe, mostrar el formulario con los datos actuales prellenados
    } else {
        echo "Rifa no encontrada.";
        exit;
    }
} else {
    echo "ID no válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rifa</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Rifa</h2>
        <form action="editar_rifa.php" method="POST">
            <!-- Campo oculto para enviar el ID de la rifa -->
            <input type="hidden" name="id" value="<?php echo $rifa['id']; ?>">

            <div class="form-group">
                <label for="titulo">Título de la rifa:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $rifa['titulo']; ?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required><?php echo $rifa['descripcion']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio por número (USD):</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" value="<?php echo $rifa['precio']; ?>" required>
            </div>

            <div class="form-group">
                <label for="max_numeros">Número máximo de boletos:</label>
                <input type="number" id="max_numeros" name="max_numeros" class="form-control" value="<?php echo $rifa['max_numeros']; ?>" required>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($rifa['fecha_inicio'])); ?>" required>
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha de finalización:</label>
                <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($rifa['fecha_fin'])); ?>" required>
            </div>

            <div class="form-group">
                <label for="imagen_portada">URL de la imagen de portada:</label>
                <input type="text" id="imagen_portada" name="imagen_portada" class="form-control" value="<?php echo $rifa['imagen_portada']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
