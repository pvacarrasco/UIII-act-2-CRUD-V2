<?php
include("db.php");
$Nombre= '';
$Correo= '';
$Usuario= '';
$Telefono= '';
$Domicilio= '';
$CP= '';
$Ciudad= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $resultado = mysqli_query($conn, $query);
  if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_array($resultado);
    $Nombre = $row['Nombre'];
    $Correo = $row['Correo'];
    $Usuario = $row['Usuario'];
    $Telefono = $row['Telefono'];
    $Domicilio = $row['Domicilio'];
    $CP = $row['CP'];
    $Ciudad = $row['Ciudad'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $Nombre= $_POST['Nombre'];
  $Correo = $_POST['Correo'];
  $Usuario = $_POST['Usuario'];
  $Telefono = $_POST['Telefono'];
  $Domicilio = $_POST['Domicilio'];
  $CP = $_POST['CP'];
  $Ciudad = $_POST['Ciudad'];

  $query = "UPDATE task set Nombre = '$Nombre', Correo = '$Correo', Usuario = '$Usuario', Telefono = '$Telefono', Domicilio = '$Domicilio', CP = '$CP', Ciudad = '$Ciudad' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Update Nombre">
        </div>
        <div class="form-group">
        <textarea name="Correo" class="form-control" cols="30" rows="10"><?php echo $Correo;?></textarea>
        </div>

        <div class="form-group">
          <input name="Usuario" type="text" class="form-control" value="<?php echo $Usuario; ?>">
        </div>

        <div class="form-group">
          <input name="Telefono" type="text" class="form-control" value="<?php echo $Telefono; ?>">
        </div>

        <div class="form-group">
          <input name="Domicilio" type="text" class="form-control" value="<?php echo $Domicilio; ?>">
        </div>

        <div class="form-group">
          <input name="CP" type="text" class="form-control" value="<?php echo $CP; ?>">
        </div>

        <div class="form-group">
          <input name="Ciudad" type="text" class="form-control" value="<?php echo $Ciudad; ?>">
        </div>

        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
