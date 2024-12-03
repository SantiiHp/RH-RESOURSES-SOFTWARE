<?php include('template/cabecera.php')?>

        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-3">Bienvenido <?php echo $NombreUsuario; ?></h1>
                <p class="lead">Vamos a administrar nuestros componentes en el sitio web</p>
                <hr class="my-2">
                <p>More info</p>
                <p class="lead">
                <a class="btn btn-primary btn-lg" href="sección/cursos.php" role="button">Administra los cursos</a>
                <a class="btn btn-primary btn-lg" href="sección/serviciosdisponibles.php" role="button">Administra los Servicios Disponibles</a>
                <a class="btn btn-primary btn-lg" href="sección/Recluta-selección.php" role="button">Administra Reclutamiento y selección</a>
            </p>
        </div>
    </div>

    <?php include('template/pie.php')?>