<?php
    session_start();

    include('./database.php');
    $db = new Database();

    if (!array_key_exists('signed_in', $_SESSION))
        header('Location: /tech-exchange');

    if (!$_SESSION['signed_in'])
        header('Location: /tech-exchange');

    if ($_SESSION['user_code'] != 1)
        header('Location: /tech-exchange');
        
    if (!isset($_GET['id']))
        header('Location: ../dashboard.php');

    $db->query("UPDATE users SET user_id=2 WHERE id = " . $_GET['id']);
    header('Location: ../dashboard.php');
?>