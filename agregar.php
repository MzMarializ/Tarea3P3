<?php include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
     $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];

    $foto = '';
    if ($_FILES['foto']['name']) {
        $carpeta = "img/";
         $foto = $carpeta . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    }

    $sql = "INSERT INTO personajes (nombre, color, tipo, nivel, foto) 
            VALUES ('$nombre', '$color', '$tipo', $nivel, '$foto')";
    if ($conn->query($sql) === TRUE) {
           header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Personaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #121212; color: white;">
<div class="container mt-5">
    <h2 class="mb-4">🦸 Agregar Nuevo Personaje</h2>
        <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nombre</label>
              <input type="text" name="nombre" class="form-control" required>
        </div>
     <div class="mb-3">
                <label>Color Representativo</label>
            <input type="text" name="color" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Rol</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>
        <div class="mb-3">
               <label>Nivel</label>
            <input type="number" name="nivel" class="form-control" required>
        </div>
        <div class="mb-3">
        <label>Foto</label>
            <input type="file" name="foto" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
