<?php
    include('./database.php');
    $db = new Database();

    if (isset($_POST['email']))
        $email = $_POST['email'];
    else
        echo 0;
    
    // Verify whether email exists, and respond accordingly.
    $results = $db->query("SELECT * FROM users where email = '$email'");

    echo (!$results) ? 1 : 0;
?>