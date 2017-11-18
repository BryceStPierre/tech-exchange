<?php
    include('server/database.php');

    $db = new Database();
    $cats = $db->query("SELECT id, label, total FROM (SELECT COUNT(category_id) AS total, category_id FROM ads GROUP BY category_id) x INNER JOIN (SELECT id, label FROM categories) y ON x.category_id = y.id ORDER BY total DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechExchange</title>

    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link href="lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include('reuse/navbar.php'); ?>

    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-8">
                    <h1>Everything digital.</h1>
                    <p>If you live in the Windsor area and you're passionate about technology, our listings 
                        are sure to impress you. Begin selling and buying items today.</p>
                    <p>
                        <a class="btn btn-primary btn-lg" href="post.php" role="button">Post Ad</a>
                    <?php if (!$_SESSION['signed_in']): ?>
                        <a class="btn btn-default btn-lg" href="register.php" role="button">Register</a>
                    <?php endif; ?>
                    </p>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <h2>Categories</h2>
                    <div class="list-group">
                        <?php foreach($cats as $cat): ?>
                        <a href="browse.php?category=<?php echo $cat['id']; ?>" class="list-group-item">
                            <span class="badge"><?php echo $cat['total']; ?></span>
                            <?php echo $cat['label']; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="js/ui.js"></script>
</body>
</html>