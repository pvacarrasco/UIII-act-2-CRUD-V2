<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM task WHERE id = $id";
  $resultado = mysqli_query($conn, $query);
  if(!$resultado) {
    die("Conexion fallida.");
  }

  $_SESSION['message'] = 'Borrado con exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
