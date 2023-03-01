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
            $categories = (string)$val->category;

           // print_r("{" . $title . "cat" . $categories . "\n" . "}");

            array_push($news, array(
            "title" => $title,
            "description" => $description,
            "date" => $date,
            "link" => $link, 
            "category" => $categories)
        );
        }

    }catch(Exception $e){
        array_push($news, array(
            "title" => $url,
            "description" => $e->getMessage(),
            "date" => $e->getMessage(),
            "link" => $e->getMessage(),
            "category" => $e->getMessage()));
    }
    return $news;
   }
?>