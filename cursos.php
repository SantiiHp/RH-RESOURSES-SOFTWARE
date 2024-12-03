<?php include("template/cabecera.php");?>
<?php
session_start();
if(!isset($_SESSION['Email'])){
    header("location:index.php");
}elseif($_SESSION['Email']){

}
?>
<?php
include("administrador/configuración/db.php");
$sentenciaSQL= $conexion->prepare("SELECT * FROM cursos");
$sentenciaSQL->execute();
$Lcursos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($Lcursos as $cursos){?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $cursos["Imagen"];?>" alt="">
    <div class="card-body">
        <h4 class="card-title"><?php echo $cursos["Nombre"];?></h4>
        <a name="" id="" class="btn btn-success" href="info-cursos.php" role="button">Ver más</a>
    </div>
</div>
</div>
<?php }?>



<?php include("template/pie.php");?>