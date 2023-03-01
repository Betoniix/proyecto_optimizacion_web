<?php
include './Funciones.php';
$nombreUrl = $_POST["NombreURL"];
$cadenaUrl = $_POST["CadenaURL"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['NombreURL'])) {
  echo 'El campo de Nombre URL no puede estar vacío.';
}else{
    if (empty($_POST['CadenaURL'])) {
  echo 'El campo de Cadena URL no puede estar vacío.';
}else{
    //Aqui iria si no son vacios
    $mysqli = conectarSQLServer();
    $sqlSentence = "SELECT * FROM links WHERE NombreLink = '".$_POST['NombreURL']."'";
        $valida = $mysqli->query($sqlSentence);
        if(mysqli_num_rows($valida) > 0){
            echo 'El Nombre del Link (Identificador) ya existe en la base de datos.';
        }else{
           $sqlSentence = "SELECT * FROM links WHERE Link = '".$_POST['CadenaURL']."'";
        $valida = $mysqli->query($sqlSentence);
        if(mysqli_num_rows($valida) > 0){
            echo 'La URl ya se encuentra registrada (http://...)';
        }else{
            //AQUÍ VA LA FUNCION DE AÑADIR LINKS A LA BD
            echo'Puede Registrar';
        $sqlSentence = "INSERT INTO `links` (`NombreLink`, `Link`) values ('$nombreUrl', '$cadenaUrl')";
        $inserta = $mysqli->query($sqlSentence);
        if($inserta){
            $resultado = "Nueva URL ingresada";
        }else{
            $resulado = "No se pudo registrar la URL";
        }
        $mysqli->close();
        }
        }
        
       // $mysqli->close();
    
    
    
    //$query = "SELECT * FROM links WHERE NombreLinks = '".$_POST['NombreURL']."'";
    //$resultado = mysqli_query($conexion, $query);
    
    
    

}
}


}



/*$resultado = "";

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
     //header("location: IndexFront.php");

*/