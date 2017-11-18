<?php
    include('./database.php');
    $db = new Database();

    //$email = $_POST['email'];
    //$display = $_POST['display'];
    //$password = $_POST['password'];
    
    $query = "INSERT INTO users (email, name, password, user_code)"
        . " VALUES ('$email', '$display', '$password', 3)";
    $result = $db->insert($query);

    //$message = $result ? 'success' : 'error';
?>