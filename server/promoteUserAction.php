<?php
    session_start();

    include('./database.php');
    $db = new Database();

    // Redirect if the proper conditions are not correct.
    if (!array_key_exists('signed_in', $_SESSION))
        header('Location: /tech-exchange');

    if (!$_SESSION['signed_in'])
        header('Location: /tech-exchange');

    if ($_SESSION['user_code'] != 1)
        header('Location: /tech-exchange');
        
    if (!isset($_GET['id']))
        header('Location: ../dashboard.php');

    // Promote the user to be an administrator user (user_code 2).
    $db->query("UPDATE users SET user_code=2 WHERE id = " . $_GET['id']);
    header('Location: ../dashboard.php');
?>