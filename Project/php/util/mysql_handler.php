<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class MySqlHandler {
    private $host="localhost";
    private $port=3305;
    private $user="root";
    private $password="root";
    private $dbname="opti_rss";
    private $connection;

    function __construct()
    {
        echo "hola";
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port) or die ('Could not connect to the database server' . mysqli_connect_error());;
        echo "hola";
        $this->connection->autocommit(false);
        echo "hola";
    }

    function connection(){
        return $this->connection;
    }
}


$handler = new MySqlHandler();
$db = $handler->connection();
?>