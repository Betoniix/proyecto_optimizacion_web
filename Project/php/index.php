<?php
include_once('./util/news_array.php');
include_once('./util/mysql_handler.php');
    
    $post_data = $_POST["links"];
    $jsonUrls = json_decode($post_data);
    $db->begin_transaction();

    try {
        $host_exist = $db->prepare("SELECT IF(EXISTS(SELECT id FROM host WHERE host_link = ?), 1, 0) as Result");
        $new_exist = $db->prepare("SELECT IF(EXISTS(SELECT id FROM news WHERE title = ?), 1, 0) as result");
        $news_query = $db->prepare("INSERT INTO news(title,description,pubdate,link,id_host,category) VALUES (?,?,?,?,?,?)");
        $host_query = $db->prepare("INSERT INTO host (host_link) VALUES (?)");
        $hostID_query = $db->prepare("SELECT id FROM host WHERE host_link = ?");

    foreach($jsonUrls->links as $link){
        $host_exist->bind_param("s", $link);
        $host_exist->execute();

        $result = $host_exist->get_result();
        $exist_link = $result->fetch_assoc();
        
        if(!$exist_link){
            $host_query->bind_param("s", $link);
            $host_query->execute();
        }

        $hostID_query->bind_param("s", $link);
        $hostID_query->execute();
        
        $result = $hostID_query->get_result();
        $host_id = $result->fetch_assoc();

        $fetched = getNewsArray($link);
        
        foreach($fetched as $new){
            $new_exist->bind_param("s", $new["title"]);
            $new_exist->execute();

            $result = $new_exist->get_result();
            $wasAdded = $result->fetch_assoc();

            if(!$wasAdded["result"]){
                $news_query->bind_param("ssssis", $new["title"], $new["description"],$new["date"],$new["link"], $host_id["id"],$new["category"]);
                $news_query->execute();
            }
        } 
    }
    
    $db->commit();
    }catch(mysqli_sql_exception $exception){
        $db->rollback();
        echo $exception;
    }
?>
