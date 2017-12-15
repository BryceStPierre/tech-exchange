<?php
    session_start();

    include('./database.php');
    $db = new Database();

    // Redirect if the proper conditions are not correct.
    if (!array_key_exists('signed_in', $_SESSION))
        header('Location: /tech-exchange');

    if (!$_SESSION['signed_in'])
        header('Location: /tech-exchange');

    if ($_SESSION['user_code'] != 2)
        header('Location: /tech-exchange');
        
    if (!isset($_GET['id']) || !isset($_GET['vote']))
        header('Location: ../dashboard.php');

    // Extract the number of votes for the user, and increment or decrement the value accordingly.
    $value = intval($db->query("SELECT votes FROM users WHERE id = " . $_GET['id'])[0]['votes']);
    $value += ($_GET['vote'] == 'up') ? 1 : -1;

    // Update the number of votes.
    $db->query("UPDATE users SET votes=$value WHERE id = " . $_GET['id']);

    // Redirect user to specified page.
    header('Location: ../dashboard.php');
?>