<?php 
    require_once('./mysql_handler.php');
    
    $type = $_POST["type"];

    $db->begin_transaction();

    try{
        $stmp = $db->prepare("SELECT * FROM news ORDER BY ?");
        $stmp->bind_param("s", $type);
        $stmp->execute();
        $db->commit();

        $result = $stmp->get_result();
        $data = $result->fetch_assoc();
        echo var_dump($data);
        
    }catch(mysqli_sql_exception $exception){
        $db->rollback();
    }
?>