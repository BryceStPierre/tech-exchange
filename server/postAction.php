<?php
    session_start();

    include('./database.php');
    $db = new Database();

    if (isset($_POST['title']))
        $title = addslashes($_POST['title']);
    if (isset($_POST['description']))
        $description = addslashes($_POST['description']);
    if (isset($_POST['telephone']))
        $telephone = $_POST['telephone'];
    if (isset($_POST['email']))
        $email = $_POST['email'];
    if (isset($_POST['type']))
        $type = $_POST['type'];

    if (isset($_SESSION['user']))
        $user_id = $_SESSION['user']['id'];
    if (isset($_POST['category']))
        $category_id = $_POST['category'];

    if (isset($_POST['price-option'])) {
        $price_option = $_POST['price-option'];
        if ($price_option == 1 && isset($_POST['price']))
            $price = $_POST['price'];
        else
            $price = $price_option;
    }

    if (isset($_FILES['image']))
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    else
        $image = NULL;

    $query = "INSERT INTO ads (title, description, telephone, email, price, image, type, user_id, category_id) VALUES"
        . " ('$title', '$description', '$telephone', '$email', $price, '$image', $type, $user_id, $category_id)";

    $result = $db->insert($query);

    if ($result)
        echo 'Success';
    else
        echo 'Failure';
    //$message = $result ? 'success' : 'error';
?>