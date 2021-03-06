<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechExchange | Sign In</title>

    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link href="lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php 
        include('reuse/navbar.php'); 

        if ($_SESSION['signed_in'])
            header('Location: /tech-exchange');
    ?>
    <div class="container">
        <div class="row">
            <?php if (isset($_GET['signin'])): ?>
            <?php if ($_GET['signin'] == 'error'): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> Incorrect email address or password. Try signing in again.
            </div>
            <?php elseif ($_GET['signin'] == 'please'): ?>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Please <strong>sign in</strong> to continue.
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h1>Sign In</h1>
                <form action="server/signinAction.php" method="post">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="addon1">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" aria-describedby="addon1" required>
                        </div>
                        <span id="emailHelp" class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-describedby="addon2" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Sign In</button>
                </form>
                <br>
                <p>
                    <a href="register.php">Don't have an account? Register today.</a>
                </p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <img class="img-responsive img-rounded" src="img/desk.jpeg" alt="Desk">
            </div>
        </div>
    </div>

    <?php include('reuse/footer.php'); ?>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>
</html>