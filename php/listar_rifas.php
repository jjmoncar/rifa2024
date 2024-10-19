
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<?php
include 'conexion.php';

$stmt = $pdo->query("SELECT * FROM rifas");
$rifas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de Rifas</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Máx. Números</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rifas as $rifa): ?>
        <tr>
            <td><?php echo $rifa['id']; ?></td>
            <td><?php echo $rifa['titulo']; ?></td>
            <td><?php echo $rifa['descripcion']; ?></td>
            <td><?php echo $rifa['precio']; ?></td>
            <td><?php echo $rifa['max_numeros']; ?></td>
            <td><?php echo $rifa['fecha_inicio']; ?></td>
            <td><?php echo $rifa['fecha_fin']; ?></td>
            <td>
                <a href="editar_rifa.php?id=<?php echo $rifa['id']; ?>">Editar</a> |
                <a href="eliminar_rifa.php?id=<?php echo $rifa['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
