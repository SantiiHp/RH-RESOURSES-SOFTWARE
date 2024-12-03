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
$sentenciaSQL= $conexion->prepare("SELECT * FROM reclutayseleccion");
$sentenciaSQL->execute();
$Lrecluta=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($Lrecluta as $Seleccion){?>
<div class="col-md-4">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $Seleccion["Imagen"];?>" alt="">
    <div class="card-body">
        <h4 class="card-title"><?php echo $Seleccion["Nombre"];?></h4>
        <a name="" id="" class="btn btn-success" href="#" role="button">Ver más</a>
    </div>
</div>
</div>
<?php }?>



<?php include("template/pie.php");?>