<?php include 'db_config.php';

$id = $_GET['id'];
 $sql = "SELECT * FROM personajes WHERE id=$id";
$resultado = $conn->query($sql);
   $personaje = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nombre = $_POST['nombre'];
    $color = $_POST['color'];
     $tipo = $_POST['tipo'];
        $nivel = $_POST['nivel'];

    if ($_FILES['foto']['name']) {
          $carpeta = "img/";
        $foto = $carpeta . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    } else {
           $foto = $personaje['foto'];
    }

    $sql = "UPDATE personajes SET nombre='$nombre', color='$color', tipo='$tipo', nivel=$nivel, foto='$foto' WHERE id=$id";
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
    <title>Editar un Personaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #0e0e0e; color: white;">
<div class="container mt-5">
    <h2 class="mb-4">Editar Personaje</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $personaje['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Color</label>
            <input type="text" name="color" class="form-control" value="<?= $personaje['color'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Rol</label>
            <input type="text" name="tipo" class="form-control" value="<?= $personaje['tipo'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nivel</label>
            <input type="number" name="nivel" class="form-control" value="<?= $personaje['nivel'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Foto</label><br>
            <img src="<?= $personaje['foto'] ?>" width="100"><br>
            <input type="file" name="foto" class="form-control mt-2">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
