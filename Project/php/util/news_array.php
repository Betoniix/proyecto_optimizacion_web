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
            print_r("{" .trim((string)$val->category) ."}". "\n\n");
            $categories = (!empty(trim((string)$val->category)) && !is_null(trim((string)$val->category))) ? (string)$val->category : "none";
            
            /*
            $fecha = "27 Feb 2023 03:19";
            $fecha_formateada = date('d/m/Y', strtotime($fecha));
            echo $fecha_formateada;
            */

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