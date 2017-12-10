<?php
    session_start();

    include('./database.php');
    $db = new Database();

    if (!array_key_exists('signed_in', $_SESSION))
        header('Location: /tech-exchange');

    if (!$_SESSION['signed_in'])
        header('Location: /tech-exchange');

    if ($_SESSION['user_code'] != 2)
        header('Location: /tech-exchange');
        
    if (!isset($_GET['id']) || !isset($_GET['report']) || !isset($_GET['redir']))
        header('Location: /tech-exchange');

    $value = intval($db->query("SELECT reports FROM ads WHERE id = " . $_GET['id'])[0]['reports']);
    $value += ($_GET['report'] == 'up') ? 1 : -1;

    $db->query("UPDATE ads SET reports=$value WHERE id = " . $_GET['id']);
    header('Location: ../' . $_GET['redir'] . 'dashboard.php');
?>