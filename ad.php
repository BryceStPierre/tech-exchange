<?php
    include('server/database.php');
    
    $db = new Database();

    if (isset($_GET['id']))
        $id = $_GET['id'];
    else
        header("Location: browse.php");

    $results = $db->query("SELECT * FROM ads WHERE id = $id");

    if (count($results) > 0)
        $data = $results[0];
    else
        header("Location: browse.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechExchange | <?php echo $data['title']; ?></title>

    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link href="lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include('reuse/navbar.php'); ?>

    <div class="container">
        <form>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2">
                    <div class="list-group">
                        <div class="list-group-item">
                            <h3 class="list-group-item-heading">
                                <?php echo $data['title']; ?> <span class="label label-info">Selling</span>
                            </h3>
                            <?php echo $data['title']; ?>
                            <?php $cat = $db->query("SELECT label FROM categories WHERE id = " . $ad['category_id'])[0]['label']; ?>
                            <a href="#" class="list-group-item-heading">Category</a>
                        </div>
                        
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">Description</h4>
                            <p class="list-group-item-text">Lorem Ipsum is simply dummy text of the printing and 
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text 
                                ever since the 1500s, when an unknown printer took a galley of type and scrambled 
                                it to make a type specimen book. It has survived not only five centuries, but 
                                also the leap into electronic typesetting, remaining essentially unchanged. It 
                                was popularised in the 1960s with the release of Letraset sheets containing Lorem 
                                Ipsum passages, and more recently with desktop publishing software like Aldus 
                                PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="list-group">
                        <div class="list-group-item">
                            <p class="text-center">
                                <img class="img-responsive img-rounded" src="img/dummy.png" alt="Ad Image">
                            </p>
                        </div>
                        <div class="list-group-item">
                            <i class="fa fa-usd" aria-hidden="true"></i> <span>9,999</span>
                            <?php ?>
                        </div>
                        <div class="list-group-item">
                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <span>01/01/2018</span>
                            <?php ?>
                        </div>
                        <div class="list-group-item">
                            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <span>(999) 999-9999</span>
                            <?php ?>
                        </div>
                        <div class="list-group-item">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <span>example@example.com</span>
                            <?php ?>
                        </div>
                        <div class="list-group-item text-center">
                            <a href="mailto: " class="btn btn-primary btn-xs">Contact</a>
                            <a href="#" class="btn btn-danger btn-xs">Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="js/ui.js"></script>
</body>
</html>