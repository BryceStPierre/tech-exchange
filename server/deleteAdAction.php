<?php
    session_start();

    include('./database.php');
    $db = new Database();

    if (!array_key_exists('signed_in', $_SESSION))
        header('Location: /tech-exchange');

    if (!$_SESSION['signed_in'])
        header('Location: /tech-exchange');

    if (!isset($_GET['id']))
        header('Location: /tech-exchange');

    $owner = $db->query("SELECT user_id FROM ads WHERE id = " . $_GET['id'])[0]['user_id'];

    if ($_SESSION['user']['id'] != $owner && $_SESSION['user_code'] != 1)
        header('Location: /tech-exchange');

    $db->query("DELETE FROM ads WHERE id = " . $_GET['id']);
    if ($_SESSION['user']['id'] == $owner)
        header('Location: ../profile.php');
    else
        header('Location: ../dashboard.php');
?>