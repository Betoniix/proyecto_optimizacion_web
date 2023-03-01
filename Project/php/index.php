<?php
include_once('./util/news_array.php');
include_once('./util/mysql_handler.php');

//https://rss.art19.com/apology-line
//http://feeds.bbci.co.uk/news/world/rss.xml
//https://feeds.simplecast.com/54nAGcIl
    
  
    $post_data = $_POST["links"];
    $jsonUrls = json_decode($post_data);
    $db->begin_transaction();
    


    try {
        $news_query = $db->prepare("INSERT INTO `news`(`title`, `description`, `pubdate`, `link`, `id_host`) VALUES (?,?,?,?,?)");
        $host_query = $db->prepare("INSERT INTO host (host_link) VALUES (?)");
        $hostID_query = $db->prepare("SELECT id FROM host WHERE host_link = ?");

    foreach($jsonUrls->links as $link){
        
        $host_query->bind_param("is", $link);
        $host_query->execute();

        $hostID_query->bind_param("is", $link);
        $hostID_query->execute();
        $result = $hostID_query->get_result();
        $host_id = $result->fetch_assoc();

        echo $host_id;

        $fetched = getNewsArray($link);

        /* foreach($fetched as $new){
            
        } */
    }
    
    $db->commit();
    }catch(mysqli_sql_exception $exception){
        $db->rollback();
        echo $exception;
    }
?>
