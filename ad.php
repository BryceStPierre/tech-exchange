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
                                <?php echo $data['title']; ?> 
                                <span class="label label-info"><?php echo ($data['type'] == 0) ? 'Selling' : 'Buying'; ?></span>
                            </h3>
                            <?php $cat = $db->query("SELECT label FROM categories WHERE id = " . $data['category_id'])[0]['label']; ?>
                            <a href="browse.php?category=<?php echo $data['category_id']; ?>" class="list-group-item-heading"><?php echo $cat; ?></a>
                        </div>
                        
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">Description</h4>
                            <p class="list-group-item-text"><?php echo $data['description']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="list-group">
                    <?php if ($data['image']): ?>
                        <div class="list-group-item">
                            <p class="text-center">
                                <img class="img-responsive img-rounded" src="data:image/jpeg;base64,<?php echo base64_encode( $data['image']); ?>" alt="Image">
                            </p>
                        </div>
                    <?php endif; ?>
                        <div class="list-group-item">
                            <i class="fa fa-usd" aria-hidden="true"></i> 
                            <?php echo number_format($data['price']); ?>
                        </div>
                        <div class="list-group-item">
                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            <?php
                                $date = strtotime($data['date']);
                                echo date("n/j/Y", $date); 
                            ?>
                        </div>
                        <div class="list-group-item">
                            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                            <?php echo $data['telephone']; ?>
                        </div>
                        <div class="list-group-item">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            <?php echo $data['email']; ?>
                        </div>
                        <div class="list-group-item text-center">
                            <a href="mailto:<?php echo $data['email']; ?>" class="btn btn-primary btn-xs">Contact</a>
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