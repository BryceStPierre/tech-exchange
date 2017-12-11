<?php
    session_start();

    include('./database.php');
    $db = new Database();

    if (isset($_POST['email']))
        $email = $_POST['email'];
    if (isset($_POST['password']))
        $password = $_POST['password'];

    $result = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    
    if ($result == 0 || sizeof($result) == 0)
        header('Location: ../signin.php?signin=error');
    else {
        $_SESSION['signed_in'] = TRUE;
        $_SESSION['user_code'] = $result[0]['user_code'];
        $_SESSION['user'] = $result[0];
        header('Location: ../browse.php?signin=success');
    }
?>