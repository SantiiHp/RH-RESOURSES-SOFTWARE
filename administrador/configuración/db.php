<?php
$host="localhost";
$bd="rh resourses software";
$usuario="root";
$contraseña="";

try{
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contraseña);
    if($conexion){
        //echo "Conectado...al sistema";
        }

    }catch(PDOException $ex){
        echo $ex->getMessage();
    }





?>