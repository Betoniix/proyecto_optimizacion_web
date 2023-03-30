<?php 
    require_once('util/mysql_handler.php');
    
    $type = $_POST["type"];
    if($type == 'date'){
        $type = 'pubdate';
    }

    $db->begin_transaction();

    try{
        $stmp = $db->prepare("SELECT * FROM news ORDER BY " . $type);
        $stmp->execute();
        
        $result = $stmp->get_result();
        $data = $result->fetch_all();
        echo json_encode($data);
        
        $db->commit();

    }catch(mysqli_sql_exception $exception){
        $db->rollback();
        echo $exception;
    }
?>