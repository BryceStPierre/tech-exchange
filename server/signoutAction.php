<?php
    session_start();
    
    // Unset session variables and redirect to the home page.
    unset($_SESSION['signed_in']);
    unset($_SESSION['user_code']);
    unset($_SESSION['user']);

    header("Location: /tech-exchange");
?>