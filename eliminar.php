<?php
include 'db_config.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

      $sql = "DELETE FROM personajes WHERE id = $id";
     if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
    echo "Error al eliminar: " . $conn->error;
    }
}
?>
