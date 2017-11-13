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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TechExchange</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Browse</a></li>
                    <li><a href="#">Buy</a></li> <!-- Add class=active. -->
                    <li><a href="#">Sell</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Sign In</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">                            
                        <select class="form-control">
                            <option>All</option>
                            <option>Buying</option>
                            <option>Selling</option>
                        </select>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for an item...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h1>Sign In</h1>
                <br>
                <form>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="addon1">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" class="form-control" id="email" placeholder="Email Address" aria-describedby="addon1">
                        </div>
                        <span id="emailHelp" class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="addon2">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </span>
                            <input type="password" class="form-control" id="password" placeholder="Password" aria-describedby="addon2">
                        </div>
                        <span id="passwordHelp" class="help-block"></span>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Sign In</button>
                </form>
                <br>
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