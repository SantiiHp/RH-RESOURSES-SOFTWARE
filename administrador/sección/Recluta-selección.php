<?php include("../template/cabecera.php"); ?>

<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$acción=(isset($_POST['acción']))?$_POST['acción']:"";

include("../configuración/db.php");



switch($acción){

     case "Agregar":
        $sentenciaSQL= $conexion->prepare("INSERT INTO reclutayseleccion (Nombre,Imagen) VALUES (:Nombre, :Imagen);");
        $sentenciaSQL->bindParam(':Nombre',$txtNombre);

        $fecha= new DateTime();
        $NombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_". $_FILES["txtImagen"]["name"]:"Imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if( $tmpImagen!=""){

            move_uploaded_file($tmpImagen,"../../img/".$NombreArchivo);
        }

        $sentenciaSQL->bindParam(':Imagen',$NombreArchivo);
        $sentenciaSQL->execute();

        header("location:Recluta-selección.php");
        break;

        case "Modificar":

            $sentenciaSQL= $conexion->prepare("UPDATE reclutayseleccion SET nombre=:Nombre WHERE id=:id");
            $sentenciaSQL->bindParam(':Nombre',$txtNombre);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            if($txtImagen!=""){

                $fecha= new DateTime();
                $NombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_". $_FILES["txtImagen"]["name"]:"Imagen.jpg";
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

                move_uploaded_file($tmpImagen,"../../img/".$NombreArchivo);

                $sentenciaSQL= $conexion->prepare("SELECT Imagen FROM reclutayseleccion WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $Lrecluta=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($Lrecluta["Imagen"]) &&($Lrecluta["Imagen"]!="Imagen.jpg")){

                    if(file_exists("../../img/". $Lrecluta["Imagen"])){

                        unlink("../../img/". $Lrecluta["Imagen"]);
                    }
                }



            $sentenciaSQL= $conexion->prepare("UPDATE reclutayseleccion SET Imagen=:Imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':Imagen',$NombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            }

            //echo "Presionado botón Modificar";
            header("location:Recluta-selección.php");
            break;

            case "Cancelar":
                header("location:Recluta-selección.php");
                //echo "Presionado botón Cancelar";
                break;

            case "Seleccionar":

                $sentenciaSQL= $conexion->prepare("SELECT * FROM reclutayseleccion WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $Lrecluta=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $txtNombre=$Lrecluta['Nombre'];
                $txtImagen=$Lrecluta['Imagen'];


                //echo "Presionado botón Seleccionar";

                break;
            case "Borrar":

                $sentenciaSQL= $conexion->prepare("SELECT Imagen FROM reclutayseleccion WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $Lrecluta=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if(isset($Lrecluta["Imagen"]) &&($Lrecluta["Imagen"]!="Imagen.jpg")){

                    if(file_exists("../../img/". $Lrecluta["Imagen"])){

                        unlink("../../img/". $Lrecluta["Imagen"]);
                    }
                }


                $sentenciaSQL= $conexion->prepare("DELETE FROM reclutayseleccion WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                //echo "Presionado botón Borrar";
                header("location:Recluta-selección.php");
                break;

}

$sentenciaSQL= $conexion->prepare("SELECT * FROM reclutayseleccion");
$sentenciaSQL->execute();
$Lrecluta=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Datos de los Reclutamiento y Selección
    </div>
    <div class="card-body">

    <form method="POST" enctype="multipart/form-data">

    <div class = "form-group">
    <label for="txtID">ID:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
    </div>

    <div class = "form-group">
    <label for="txtNombre">Nombre:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Reclutamiento y Selección">
    </div>

    <div class = "form-group">
    <label for="txtNombre">Imagen:</label>

    <br/>


    <?php if($txtImagen!=""){ ?>

    <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" width="85" alt="" srcset="">

    <?php } ?>



    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre del Reclutamiento y Selección">
    </div>

    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="acción" <?php echo ($acción=="Seleccionar")?"disabled":"";?> value="Agregar" class="btn btn-success">Agregar</button>
        <button type="submit" name="acción" <?php echo ($acción!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
        <button type="submit" name="acción" <?php echo ($acción!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-info">Cancelar</button>
    </div>
    </form>


    </div>

</div>


</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($Lrecluta as $Seleccion) { ?>
            <tr>
                <td><?php echo $Seleccion ['id']; ?></td>
                <td><?php echo $Seleccion ['Nombre']; ?></td>
                <td>

                <img class="img-thumbnail rounded" src="../../img/<?php echo $Seleccion ['Imagen']; ?>" width="85" alt="" srcset="">
                
                
                </td>


                <td>
                
                Seleccionar | borrar

                <form method="post">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $Seleccion ['id']; ?>"/>

                    <input type="submit"name="acción" value="Seleccionar" class="btn btn-primary"/>

                    <input type="submit"name="acción" value="Borrar" class="btn btn-danger"/>


                </form>
            
                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>


</div>

<?php include("../template/pie.php"); ?>