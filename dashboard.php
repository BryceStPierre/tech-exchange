<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechExchange | Dashboard</title>

    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link href="lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include('reuse/navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Dashboard</h1>
                <div>
                    <!-- Tabs. -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
                        <li role="presentation"><a href="#reports" aria-controls="reports" role="tab" data-toggle="tab">Reports</a></li>
                    </ul>
                    <!-- Tab content panes. -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="users">...</div>
                        <div role="tabpanel" class="tab-pane" id="reports">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('reuse/footer.php'); ?>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>