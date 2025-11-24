<?php
include 'db_config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM personajes WHERE id = $id";
$result = $conn->query($sql);
$personaje = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil de <?= $personaje['nombre'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @media print {
            body {
                background-color: white !important;
                color: black !important;
            }
            .no-print {
                display: none;
            }
        }
        .pdf-card {
            background-color: #141c2f;
            color: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 600px;
            margin: auto;
            text-align: center;
            box-shadow: 0 0 20px #00c0ff;
        }
        .pdf-card img {
            width: 200px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        hr {
            border: 1px solid #00c0ff;
            margin: 20px 0;
        }
        h2 {
            color: #00c0ff;
        }
    </style>
</head>
<body style="background-color: #0d1117; color: white;">

<div class="container mt-5">
    <div class="pdf-card">
        <img src="<?= $personaje['foto'] ?>" alt="<?= $personaje['nombre'] ?>">
        <hr>
        <h2><?= $personaje['nombre'] ?></h2>
        <p><strong>Color Representativo:</strong> <?= $personaje['color'] ?></p>
        <p><strong>Tipo:</strong> <?= $personaje['tipo'] ?></p>
        <p><strong>Nivel:</strong> <?= $personaje['nivel'] ?></p>
    </div>

    <div class="text-center mt-4 no-print">
        <button onclick="window.print()" class="btn btn-primary">Guardar PDF</button>
        <a href="index.php" class="btn btn-secondary"> Volver</a>
    </div>
</div>

</body>
</html>
