<?php include("template/cabecera.php");?>
<?php
session_start();
if(!isset($_SESSION['Email'])){
    header("location:index.php");
}elseif($_SESSION['Email']){

}

?>
<div class="jumbotron">
    <h1 class="display-3">Bienvenidos a RH Resourses Software</h1>

    <hr class="my-2">
<br/>
    <h2 class="lead">
<img width="360 "src="img/banner.jpg" class="img-thumbnail rounded mx-auto d-block" height="300" align="left">En RH Resourses 
    Software nos dedicamos a conectar talento con oportunidades laborales. Ya sea que necesite contratar
    personal o esté buscando empleo,estamos aquí para ayudarlo. Ofecemos una plataforma de inicio de
    Sesión para usuarios registrados y nuevos registros.</p>
</h2>
<br/>
    <h2 class="lead"> Navega por nuestra página y descubre una variedad de servicios diseñados para potenciar tu
    tu equipo y mejorar la cultura laboral. Desde reclutamiento y selección hasta programas de
    capacitación y consultoría, estamos aquí para acompañarte en cada paso de tu viaje hacia la
    excelencia en recursos humanos. </h2>
    <br/><br/>
    <h2 class="lead">Estamos comprometidos con la innovación y la personalización, asegurando que cada solución
    se adapte a las necesidades únicas de tu organización. Si buscas un socio que valore el
    potencial humano tanto como tú, ¡has llegado al lugar correcto!</h2>
<br/><br/>
    <h2 class="lead">Explora nuestras secciones y no dudes en contactarnos para cualquier consulta. ¡Juntos,
    construyamos un futuro laboral exitoso!</h2>
<br/><br/>
    <h1>¡Bienvenido a la comunidad de RH Resourses Software!</h1>



<?php include("template/pie.php");?>