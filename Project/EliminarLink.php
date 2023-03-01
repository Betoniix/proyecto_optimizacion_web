<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include './Funciones.php';


$idLink = $_GET["ID"];
echo $idLink;
$resultado = "";

$mysqli = conectarSQLServer();

if(!$mysqli){
       $resultado =  "No se pudo realizar la conexión PHP - MySQL";
    }else{             
        $sqlSentence = "DELETE FROM `links` WHERE ID= '$idLink' ";
        echo $sqlSentence;
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