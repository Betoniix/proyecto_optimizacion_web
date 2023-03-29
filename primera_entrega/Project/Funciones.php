<?php

include_once('./php/util/mysql_handler.php');

//Con esta función se obtienen TODAS las columnas de cada link de la BD(Nombre del link, su url e ID)
  
function getLinks(){
    
    $handler = new MySqlHandler();
    $mysql = $handler->connection();
    $mysql->begin_transaction();
    $links = [];
    
    try {
        
        $links_query = $mysql->prepare("SELECT * FROM links ORDER BY RAND()");
        $links_query->execute();
        $result = $links_query->get_result();
        
        while($registro = $result->fetch_assoc()){
            $links[] = $registro;
        }    
        
        $mysql->commit();

    }catch(mysqli_sql_exception $exception){
        $db->rollback();
        echo $exception;
    }
    
    return $links;
}

//Aquí se convierten todos los LINKS UNICAMENTE (sin ID ni nombre) a JSON
function transformLinksJson(){
    //getURLLinks sirve para obtener unicamente el link (http://....) sin las demás columnas de la tabla.
    $arraylinks= getURLLinks();
    $linksEncodedJson= json_encode($arraylinks);
    echo $linksEncodedJson;
    //Retorna el JSON para desencriptar con todos los links en un array
    return $linksEncodedJson;
}
  
//Se describe en transformLinksJson()
function getURLLinks(){
    $handler = new MySqlHandler();
    $mysql = $handler->connection();
    $resultado = $mysql->query("SELECT Link FROM links");
    while($registro = $resultado->fetch_assoc()){
        $urllinks[] = $registro;
    }
    return $urllinks;
}
  /* <?php
    include './Funciones.php';
    transformLinksJson();
            ?>*/
?>