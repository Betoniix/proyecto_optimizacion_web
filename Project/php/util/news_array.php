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
            $date = date('d/m/Y', strtotime((string)$val->pubDate));
            $link = (string) $val->link;

            $categories = (!empty(trim((string)$val->category)) && !is_null(trim((string)$val->category))) ? (string)$val->category : "none";
            
            $thumbnail = (string) $val->children('media', true);
            $img = $thumbnail ? $thumbnail->thumbnail[0]->attributes()->url : "https://upload.wikimedia.org/wikipedia/commons/d/da/Imagen_no_disponible.svg";

            array_push($news, array(
            "title" => $title,
            "description" => $description,
            "date" => $date,
            "link" => $link, 
            "category" => $categories,
            "img" => $img
            )
        );
        }

    }catch(Exception $e){
        array_push($news, array(
            "title" => $url,
            "description" => $e->getMessage(),
            "date" => $e->getMessage(),
            "link" => $e->getMessage(),
            "category" => $e->getMessage(),
            "img" => "none"
        ));
    }
    return $news;
   }