<?php
function getNewsArray($url){
    $news = array();

    try{
        $data = file_get_contents($url);
        
        if(!$data) throw new Exception("Bad Link");

        $xml = new SimpleXMLElement($data);
        
        foreach($xml->channel->item as $val){
            $title = (string)$val->title;
            $description = (string)$val->description;
            $date = (string)$val->pubDate;
            $link = (string) $val->link;

            array_push($news, array(
            "title" => $title,
            "description" => $description,
            "date" => $date,
            "link" => $link));
        }

    }catch(Exception $e){
        array_push($news, array(
            "title" => $url,
            "description" => $e->getMessage(),
            "date" => $e->getMessage(),
            "link" => $e->getMessage()));
    }

    return $news;
   }
?>