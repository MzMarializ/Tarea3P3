<?php
include 'db_config.php';

$sql = "SELECT * FROM personajes";
$result = $conn->query($sql);
$personajes = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Personajes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #f5f5f5;">
    <div class="container mt-5">
        <h1 class="text-center mb-4"> Lista de Personajes</h1>
        <a href="agregar.php" class="btn btn-success mb-3">Agregar Personaje</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>Tipo</th>
                    <th>Nivel</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($personajes)): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">No hay personajes registrados aún</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($personajes as $personaje): ?>
                    <tr>
                        <td><img src="<?= $personaje['foto'] ?>" width="80"></td>
                        <td><?= $personaje['nombre'] ?></td>
                        <td><?= $personaje['color'] ?></td>
                        <td><?= $personaje['tipo'] ?></td>
                        <td><?= $personaje['nivel'] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $personaje['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?= $personaje['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar personaje?')">Eliminar</a>
                            <a href="descargar_pdf.php?id=<?= $personaje['id'] ?>" class="btn btn-info btn-sm">PDF</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>