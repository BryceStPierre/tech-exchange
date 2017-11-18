<?php

class Database 
{
    private $connection;

    function __construct () {
        $this->connection = mysqli_connect("localhost", "stpierrb_db", "stpierrb123", "stpierrb_db");
    }

    function insert ($string) {
        $result = mysqli_query($this->connection, $string);
        return $result == 1;
    }

    function query ($string) {
        $result = mysqli_query($this->connection, $string);
        $rows = [];

        if (!$result) {
            echo 'MySQL error: ' . mysql_error();
            exit;
        }
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            array_push($rows, $row);
            
        mysqli_free_result($result);
        return $rows;
    }

    function close () {
        mysqli_close($this->connection);
    }
}

?>