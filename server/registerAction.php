<?php
    include('./database.php');
    $db = new Database();

    if (isset($_POST['email']))
        $email = $_POST['email'];
    if (isset($_POST['display']))
        $display = $_POST['display'];
    if (isset($_POST['password']))
        $password = $_POST['password'];
    
    $query = "INSERT INTO users (email, name, password, user_code) VALUES ('$email', '$display', '$password', 3)";
    $result = $db->insert($query);

    $message = $result ? 'success' : 'error';
    header("Location: ../browse.php?message=$message");
?>