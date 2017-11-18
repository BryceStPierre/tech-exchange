<?php
    session_start();
    
    unset($_SESSION['signed_in']);
    unset($_SESSION['user_code']);
    unset($_SESSION['user']);

    header("Location: /tech-exchange");
?>