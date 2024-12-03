<?php

session_start();
if(!isset($_SESSION['Usuario']) ){
  header("location:../index.php");
}else{

  if($_SESSION['Usuario']=="ok"){
    $NombreUsuario=$_SESSION["NombreUsuario"];

  }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

<?php $url="http://".$_SERVER['HTTP_HOST']."/paginaweb"?>

  <nav class="navbar navbar-expand navbar-light bg-light">

      <div class="nav navbar-nav">
          <a class="nav-item nav-link active" href="#">Administrador paginaweb <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
          <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/sección/cursos.php">Cursos</a>
          <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/sección/serviciosdisponibles.php">Servicios Disponibles</a>
          <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/sección/Recluta-selección.php">Reclutamiento y selección</a>
          <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/sección/cerrar.php">Cerrar</a>
          <a class="nav-item nav-link" href="<?php echo $url;?>/login.php">Ver paginaweb</a>
      
      
      </div>
  </nav>

<div class="container">
<br/><br/><br/>
    <div class="row">