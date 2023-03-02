<?php

include_once('./php/util/mysql_handler.php');

//Con esta función se obtienen TODAS las columnas de cada link de la BD(Nombre del link, su url e ID)
  
function getLinks(){
    try {

        $handler = new MySqlHandler();
        $mysql = $handler->connection();
        $resultado = $mysql->query("SELECT * FROM links ORDER BY RAND()");
        while($registro = $resultado->fetch_assoc()){
            $links[] = $registro;
        }
        return $links;
        
        $getLinks_query = $mysql->prepare("SELECT * FROM links ORDER BY RAND()");
        

        $host_exist = $db->prepare("SELECT IF(EXISTS(SELECT ID FROM links WHERE Link = ?), 1, 0)");
        $news_query = $db->prepare("INSERT INTO news(title, description, pubdate, link, id_host, category) VALUES (?,?,?,?,?,?)");
        $host_query = $db->prepare("INSERT INTO links (Link) VALUES (?)");
        $hostID_query = $db->prepare("SELECT ID FROM links WHERE Link = ?");
        
        $host_query->bind_param("s", $cadenaUrl);
        $host_query->execute();
    
        $hostID_query->bind_param("s", $cadenaUrl);
        $hostID_query->execute();
            
        $result = $hostID_query->get_result();
        $host_id = $result->fetch_assoc();
    
        $fetched = getNewsArray($cadenaUrl);
            
        foreach($fetched as $new){
            $news_query->bind_param("ssssis", $new["title"], $new["description"],$new["date"],$new["link"], $host_id["id"],$new["category"]);
            $news_query->execute();
        }
        
        $db->commit();
    
    }catch(mysqli_sql_exception $exception){
        echo "ou";
        $db->rollback();
        echo $exception;
    }
    
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
    $mysql = conectarSQLServer();
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