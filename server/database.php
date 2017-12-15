<?php

// Database class to wrap mysqli_ PHP functions.
class Database 
{
    private $connection;

    // Constructor to initialize connection.
    function __construct () {
        $this->connection = mysqli_connect("localhost", "stpierrb_db", "stpierrb123", "stpierrb_db");

        if (mysqli_connect_errno())
            die("MySQL connection failed: " . mysqli_connect_error());
    }

    // Method specifically for inserting new records into a table.
    function insert ($string) {
        $result = mysqli_query($this->connection, $string);
        return $result == 1;
    }

    // Method for general queries.
    function query ($string) {
        $result = mysqli_query($this->connection, $string);
        $rows = [];
        
        if (!$result)
            return 0; // Empty result.
            
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            array_push($rows, $row);

        mysqli_free_result($result);
        return $rows; // Return array of rows.
    }

    // Method for closing connection.
    function close () {
        mysqli_close($this->connection);
    }
}
?>