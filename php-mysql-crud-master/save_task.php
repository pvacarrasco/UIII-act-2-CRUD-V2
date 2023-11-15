<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $id = $_POST['id'];
  $Nombre = $_POST['Nombre'];
  $Correo = $_POST['Correo'];
  $Usuario = $_POST['Usuario'];
  $Telefono = $_POST['Telefono'];
  $Domicilio = $_POST['Domicilio'];
  $CP = $_POST['CP'];
  $Ciudad = $_POST['Ciudad'];
  
  $query = "INSERT INTO task(id, Nombre, Correo, Usuario, Telefono, Domicilio, CP, Ciudad) VALUES ('$id', '$Nombre','$Correo','$Usuario','$Telefono','$Domicilio','$CP','$Ciudad')";
  $resultado = mysqli_query($conn, $query);
  if(!$resultado) {
    die("Conexion fallida.");
  }

  $_SESSION['message'] = 'Guardado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
