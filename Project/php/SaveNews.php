<?php
include_once('./util/news_array.php');
include_once('./util/mysql_handler.php');
    
$nombreUrl = $_POST['NombreURL'];
$cadenaUrl = $_POST['CadenaURL'];
$db->begin_transaction();

try {
    $host_exist = $db->prepare("SELECT IF(EXISTS(SELECT ID FROM links WHERE Link = ?), 1, 0)");
    $news_query = $db->prepare("INSERT INTO news (title, description, pubdate, link, id_host, category) VALUES (?,?,?,?,?,?)");
    $host_query = $db->prepare("INSERT INTO links (NombreLink, Link) VALUES (?,?)");
    $hostID_query = $db->prepare("SELECT ID FROM links WHERE Link = ?");
    
    $host_query->bind_param("ss", $nombreUrl, $cadenaUrl);
    $host_query->execute();

    $hostID_query->bind_param("s", $cadenaUrl);
    $hostID_query->execute();
        
    $result = $hostID_query->get_result();
    $host_id = $result->fetch_assoc();

    $fetched = getNewsArray($cadenaUrl);
    print_r($host_id);
    foreach($fetched as $new){
        $news_query->bind_param("ssssis", $new["title"], $new["description"],$new["date"],$new["link"], $host_id["ID"], $new["category"]);
        $news_query->execute();
    }
    
    $db->commit();

}catch(mysqli_sql_exception $exception){
    $db->rollback();
    echo $exception;
}

header("location: ../index.php");
?>
