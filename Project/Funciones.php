<?php

function conectarSQLServer(){
        $mysql = new mysqli();
         $mysql = new mysqli('localhost','root','','rsscrud','3306');
        //Revisar que no haya fallado la conexión 
        if($mysql->connect_errno != 0){
            return $mysql->connect_errno;
        }else{
            return $mysql;
        }
    }
    
  function getLinks(){
        $mysql = conectarSQLServer();
        $resultado = $mysql->query("SELECT * FROM links ORDER BY RAND()");
        while($registro = $resultado->fetch_assoc()){
            $links[] = $registro;
        }
        return $links;
    }
    