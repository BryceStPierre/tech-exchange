<?php
    session_start();

    include('./database.php');
    $db = new Database();

    // Extract POST variables from the form submission.
    if (isset($_POST['email']))
        $email = $_POST['email'];
    if (isset($_POST['password']))
        $password = $_POST['password'];

    // Attempt to select user record from the users table.
    $result = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    
    // If the user does not exist or had incorrect information, redirect with error.
    // Else, initialize session variables and redirect with success. 
    if ($result == 0 || sizeof($result) == 0)
        header('Location: ../signin.php?signin=error');
    else {
        $_SESSION['signed_in'] = TRUE;
        $_SESSION['user_code'] = $result[0]['user_code'];
        $_SESSION['user'] = $result[0];
        header('Location: ../browse.php?signin=success');
    }
?>