<?php
    session_start();

    include('./database.php');
    $db = new Database();

    // Redirect if the proper conditions are not correct.
    if (!array_key_exists('signed_in', $_SESSION))
        header('Location: /tech-exchange');

    if (!$_SESSION['signed_in'])
        header('Location: /tech-exchange');

    if (!isset($_GET['id']))
        header('Location: /tech-exchange');

    // Find the owner ID of the ad.
    $owner = $db->query("SELECT user_id FROM ads WHERE id = " . $_GET['id'])[0]['user_id'];

    // If the signed in user is not the owner of the ad, cancel this action.
    if ($_SESSION['user']['id'] != $owner && $_SESSION['user_code'] != 1)
        header('Location: /tech-exchange');

    // Delete ad, then redirect either to profile or dashboard page.
    $db->query("DELETE FROM ads WHERE id = " . $_GET['id']);
    if ($_SESSION['user']['id'] == $owner)
        header('Location: ../profile.php');
    else
        header('Location: ../dashboard.php');
?>