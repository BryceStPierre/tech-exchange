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
    <?php include('reuse/navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h1>Sign In</h1>
                <br>
                <form>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="addon1">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" class="form-control" id="email" placeholder="Email Address" aria-describedby="addon1">
                        </div>
                        <span id="emailHelp" class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" class="form-control" id="password" placeholder="Password" aria-describedby="addon2">
                        </div>
                        <span id="passwordHelp" class="help-block"></span>
                    </div>
                    <!--<div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>-->
                    <button type="submit" class="btn btn-success">Sign In</button>
                </form>
                <br>
                <p>
                    <a href="register.php">Don't have an account? Register today.</a>
                </p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <img class="img-responsive img-rounded" src="img/desk.jpeg" alt="Keyboard">
            </div>
        </div>
    </div>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>
</html>