<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">

          <div class="form-group">
            <input name="Nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>

          <div class="form-group">
            <input  name="Correo" class="form-control" placeholder="Correo" autofocus>
          </div>

          <div class="form-group">
            <input  name="Usuario" class="form-control" placeholder="Usuario" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="Telefono" class="form-control" placeholder="Telefono" autofocus>
          </div>

          <div class="form-group">
            <input  name="Domicilio" class="form-control" placeholder="Domicilio" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="CP" class="form-control" placeholder="CP" autofocus>
          </div>

          <div class="form-group">
            <input name="Ciudad" class="form-control" placeholder="Ciudad" autofocus>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar registro">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Telefono </th>
            <th>Domicilio</th>
            <th>C.P</th>
            <th>Ciudad</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Correo']; ?></td>
            <td><?php echo $row['Usuario']; ?></td>
            <td><?php echo $row['Telefono']; ?></td>
            <td><?php echo $row['Domicilio']; ?></td>
            <td><?php echo $row['CP']; ?></td>
            <td><?php echo $row['Ciudad']; ?></td>
            
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
