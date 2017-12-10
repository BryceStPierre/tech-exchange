<?php
    include('server/database.php');
    $db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechExchange | Profile</title>

    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link href="lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php 
        include('reuse/navbar.php');
        
        if (!$_SESSION['signed_in'])
            header('Location: /tech-exchange');

        $ads = $db->query("SELECT * FROM ads WHERE user_id = " . $_SESSION['user']['id']);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Profile</h1>
                <h3><?php echo $_SESSION['user']['name']; ?> [<?php echo $_SESSION['user']['email']; ?>]</h3>
                <?php if (count($ads) == 0): ?>
                <br>
                <p class="text-center"><b>No ads posted yet.</b></p>
                <br>
                <?php else: ?>
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Posted</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($ads as $ad): ?>
                    <tr>
                        <td><a href="ad.php?id=<?php echo $ad['id']; ?>"><?php echo $ad['title']; ?></a></td>
                        <td><?php echo $db->query("SELECT * FROM categories WHERE id = " . $ad['category_id'])[0]['label']; ?></td>
                        <td>
                        <?php 
                            if ($ad['price'] == -1)
                                echo 'Contact';
                            elseif ($ad['price'] == 0)
                                echo 'Free';
                            else
                                echo '$' . number_format($ad['price']);
                        ?>
                        </td>
                        <td><?php echo date("n/j/Y", strtotime($ad['date'])); ?></td>
                        <td>
                            <button class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include('reuse/footer.php'); ?>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>
</html>