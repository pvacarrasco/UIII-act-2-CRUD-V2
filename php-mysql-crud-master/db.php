<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'script'
) or die(mysqli_erro($mysqli));

?>
