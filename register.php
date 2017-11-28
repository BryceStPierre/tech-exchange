<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechExchange | Register</title>

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
            <div class="col-sm-4 col-md-4 col-lg-6">
                <h1>Register</h1>
                <form action="server/registerAction.php" method="post">
                    <div class="form-group" id="emailGroup">
                        <label class="control-label" for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                        <span class="help-block" id="emailBlock"></span>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="username">Display Name</label>
                        <input type="text" class="form-control" name="display" id="display" placeholder="Display Name" required>
                    </div>
                    <div class="form-group" id="passwordGroup">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group" id="confirmedGroup">
                        <label class="control-label" for="confirmed">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmed" id="confirmed" placeholder="Confirm Password" required>
                        <span class="help-block" id="confirmedBlock"></span>
                    </div>
                    <button type="submit" class="btn btn-primary" id="register">Register</button>
                </form>
                <br>
                <p>
                    <a href="signin.php">Already have an account? Sign in now.</a>
                </p>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-6">
                <img class="img-responsive img-rounded" src="img/keyboard.jpeg" alt="Keyboard">
            </div>
        </div>
    </div>
    
    <?php include('reuse/footer.php'); ?>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="js/register.js"></script>
</body>
</html>