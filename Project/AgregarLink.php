<?php
include './Funciones.php';
$nombreUrl = $_POST["NombreURL"];
$cadenaUrl = $_POST["CadenaURL"];


$resultado = "";

$mysqli = conectarSQLServer();

if(!$mysqli){
       $resultado =  "No se pudo realizar la conexión PHP - MySQL";
    }else{
        $sqlSentence = "INSERT INTO `links` (`NombreLink`, `Link`) values ('$nombreUrl', '$cadenaUrl')";
        $inserta = $mysqli->query($sqlSentence);
        if($inserta){
            $resultado = "Nueva URL ingresada";
        }else{
            $resulado = "No se pudo registrar la URL";
        }
        $mysqli->close();
    }
    
    echo $resultado;
     header("location: Index.php");

