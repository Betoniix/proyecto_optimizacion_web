<?php
include_once('./util/news_array.php');
include_once('./util/mysql_handler.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['NombreURL'])){
        header("location: ../index.php");
    }
    if(empty($_POST['CadenaURL'])){
        header("location: ../index.php");
    }
}
$nombreUrl = $_POST['NombreURL'];
$cadenaUrl = $_POST['CadenaURL'];

$db->begin_transaction();

try {
    $news_exist = $db->prepare("SELECT IF(EXISTS(SELECT id FROM news WHERE title = ?), 1, 0) AS result");
    $host_exist = $db->prepare("SELECT IF(EXISTS(SELECT ID FROM links WHERE Link = ?), 1, 0) AS result");
    $news_query = $db->prepare("INSERT INTO news (title, description, pubdate, link, id_host, category, img) VALUES (?,?,?,?,?,?,?)");
    $host_query = $db->prepare("INSERT INTO links (NombreLink, Link) VALUES (?,?)");
    $hostID_query = $db->prepare("SELECT ID FROM links WHERE Link = ?");
    
    $host_exist->bind_param("s", $cadenaUrl);
    $host_exist->execute();

    $result = $host_exist->get_result();
    $exist_link = $result->fetch_assoc();

    if(!$exist_link["result"]){
        $host_query->bind_param("ss", $nombreUrl, $cadenaUrl);
        $host_query->execute();    
    }

    $hostID_query->bind_param("s", $cadenaUrl);
    $hostID_query->execute();
    
    $result = $hostID_query->get_result();
    $host_id = $result->fetch_assoc();
    
    $fetched = getNewsArray($cadenaUrl);
    
    foreach($fetched as $new){
        $news_exist->bind_param("s", $new["title"]);
        $news_exist->execute();
        
        $result = $news_exist->get_result();
        $wasAdded = $result->fetch_assoc();
        
        if(!$wasAdded["result"]){
            $news_query->bind_param("ssssiss", $new["title"], $new["description"],$new["date"],$new["link"], $host_id["ID"],$new["category"], $new["img"]);
            $news_query->execute();
        }
    }

    $db->commit();

}catch(mysqli_sql_exception $exception){
    $db->rollback();
    echo $exception;
}

header("location: ../index.php");
?>