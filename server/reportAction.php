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
        
    if (!isset($_GET['id']) || !isset($_GET['report']) || !isset($_GET['redir']))
        header('Location: /tech-exchange');

    // Extract the number of reports for the ad, and increment or decrement the value accordingly.
    $value = intval($db->query("SELECT reports FROM ads WHERE id = " . $_GET['id'])[0]['reports']);
    $value += ($_GET['report'] == 'up') ? 1 : -1;

    // Update the number of reports.
    $db->query("UPDATE ads SET reports=$value WHERE id = " . $_GET['id']);

    // Redirect user to specified page.
    header('Location: ../' . $_GET['redir'] . '.php?reported=true');
?>