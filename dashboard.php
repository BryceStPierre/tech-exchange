<?php
    include('server/database.php');
    $db = new Database();

    $users = $db->query("SELECT * FROM users WHERE user_code != 1");
?>
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
    <?php 
        include('reuse/navbar.php');

        if (!$_SESSION['signed_in'])
            header('Location: /tech-exchange');

        if (array_key_exists('user_code', $_SESSION)) {
            if ($_SESSION['user_code'] == 3)
                header('Location: /tech-exchange');
        }
    ?>
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
                        <div role="tabpanel" class="tab-pane active" id="users">
                            <br>
                            <p>Promote users to become candidate administrator users.</p>
                            <?php if (count($users) == 0): ?>
                            <br>
                            <p class="text-center">No users found.</p>
                            <?php else: ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo date("n/j/Y", strtotime($user['created_date'])); ?></td>
                                        <td>
                                            <button class="btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                            </button>
                                            <button class="btn btn-default btn-xs">
                                                <span class="glyphicon glyphicon-warning-sign"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reports">
                        
                        </div>
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