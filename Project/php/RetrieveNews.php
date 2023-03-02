<?php
include_once('./util/news_array.php');
include_once('./util/mysql_handler.php');

$db->begin_transaction();

try {
    $retrieve_news = $db->prepare("SELECT * FROM news");
    $retrieve_news->execute();
    $result = $retrieve_news->get_result();

    $news = $result->fetch_assoc();

    /*$fetched = getNewsArray($cadenaUrl);
        
    foreach($fetched as $new){
        $news_query->bind_param("ssssis", $new["title"], $new["description"],$new["date"],$new["link"], $host_id, $new["category"]);
        $news_query->execute();
    }
    
    $db->commit();
    */

}catch(mysqli_sql_exception $exception){
    $db->rollback();
    echo $exception;
}
echo "done!";
header("location: ../index.php");
?>