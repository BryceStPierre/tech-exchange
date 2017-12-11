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

        $users = $db->query("SELECT * FROM users WHERE user_code != 1 AND id != " . $_SESSION['user']['id']);

        if ($_SESSION['user_code'] == 2)
            $ads = $db->query("SELECT * FROM ads WHERE reports > 0");
        else if ($_SESSION['user_code'] == 1)
            $ads = $db->query("SELECT * FROM ads WHERE reports > 4");
    ?>
    <div class="container">
        <div class="row">
            <?php if (isset($_GET['reported'])): ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Ad report submitted successfully.
            </div>
            <?php endif; ?>
            <div class="col-lg-12">
                <h1>Dashboard</h1>
                <div>
                    <!-- Tabs. -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Manage Users</a></li>
                        <li role="presentation"><a href="#reports" aria-controls="reports" role="tab" data-toggle="tab">Manage Reports</a></li>
                    </ul>
                    <!-- Tab content panes. -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="users">
                            <br>
                            <?php if ($_SESSION['user_code'] == 1): ?>
                            <p>Upgrade users to administrators, or delete them, if necessary.</p>
                            <?php else: ?>
                            <p>Promote users to become candidate administrator users.</p>
                            <?php endif; ?>
                            <?php if (count($users) == 0): ?>
                            <br>
                            <p class="text-center"><b>No users found.</b></p>
                            <br>
                            <?php else: ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Votes</th>
                                        <th>Joined</th>
                                        <th>Actions</th>
                                    </tr>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['votes']; ?></td>
                                        <td><?php echo date("n/j/Y", strtotime($user['created_date'])); ?></td>
                                        <td>
                                            <?php if ($_SESSION['user_code'] == 1): ?>
                                            <?php if ($user['user_code'] == 3): ?>
                                            <a href="server/promoteUserAction.php?id=<?php echo $user['id']; ?>" class="btn btn-success btn-xs">
                                                <span class="glyphicon glyphicon-hand-up"></span> Promote
                                            </a>
                                            <?php endif; ?>
                                            <a href="server/deleteUserAction.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-xs">
                                                <span class="glyphicon glyphicon-trash"></span> Delete
                                            </a>
                                            <?php else: ?>
                                            <a href="server/voteUserAction.php?vote=up&id=<?php echo $user['id']; ?>" class="btn btn-success btn-xs">
                                                <span class="glyphicon glyphicon-thumbs-up"></span> Recommend
                                            </a>
                                            <a href="server/voteUserAction.php?vote=down&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-xs">
                                                <span class="glyphicon glyphicon-warning-sign"></span> Report
                                            </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reports">
                            <br>
                            <?php if ($_SESSION['user_code'] == 1): ?>
                            <p>These ads have been reported four or more times. Remove them, if necessary.</p>
                            <?php else: ?>
                            <p>Vote on whether recently reported ads are good or malicious.</p>
                            <?php endif; ?>
                            <?php if (count($ads) == 0): ?>
                            <br>
                            <p class="text-center"><b>No reported ads found.</b></p>
                            <br>
                            <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Price</th>
                                    <th>Posted</th>
                                    <th>Actions</th>
                                </tr>
                                <?php foreach ($ads as $ad): ?>
                                <tr>
                                    <td><a href="ad.php?id=<?php echo $ad['id']; ?>"><?php echo $ad['title']; ?></a></td>
                                    <td><?php echo $ad['email']; ?></td>
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
                                        <?php if ($_SESSION['user_code'] == 1): ?>
                                        <a href="server/deleteAdAction.php?id=<?php echo $ad['id']; ?>" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                        </a>
                                        <?php else: ?>
                                        <a href="server/reportAction.php?redir=dashboard&report=down&id=<?php echo $ad['id']; ?>" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-thumbs-up"></span> Good
                                        </a>
                                        <a href="server/reportAction.php?redir=dashboard&report=up&id=<?php echo $ad['id']; ?>" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-thumbs-down"></span> Malicious
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('reuse/footer.php'); ?>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>
</html>