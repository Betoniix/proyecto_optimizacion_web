<?php
include_once('./util/news_array.php');
include_once('./util/mysql_handler.php');

//https://rss.art19.com/apology-line
//http://feeds.bbci.co.uk/news/world/rss.xml
//https://feeds.simplecast.com/54nAGcIl

    $url = "http://feeds.bbci.co.uk/news/world/rss.xml";
    
  
    $post_data = $_POST["links"];
    
    $jsonUrls = json_decode($post_data);

    $news = array();

    foreach($jsonUrls->links as $link){       
        $fetched = getNewsArray($link);
        array_push($news, array($link => $fetched));
    }
    
    $encoded = json_encode($news);
    header('Content-Type: application/json');
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    echo $encoded;
?>
