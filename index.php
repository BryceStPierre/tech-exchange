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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed btn" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                <a class="navbar-brand" href="/tech-exchange">TechExchange</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="browse.php">Browse</a></li>
                    <li><a href="post.php?intent=buying">Buy</a></li> <!-- Add class=active. -->
                    <li><a href="post.php?intent=selling">Sell</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="#">FAQ</a></li>-->
                    <li><a href="signin.php">Sign In</a></li>
                </ul>
                <form action="browse.php" class="navbar-form navbar-right">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for an item...">
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

    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-8">
                    <h1>Everything digital.</h1>
                    <p>If you live in the Windsor area and you're passionate about technology, our listings 
                        are sure to impress you. Begin selling and buying items today.</p>
                    <p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Post Ad</a>
                        <a class="btn btn-default btn-lg" href="#" role="button">Register</a>
                    </p>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <h2>Categories</h2>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <span class="badge">374</span>
                            Laptops, PCs
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">200</span>
                            TVs, Monitors
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">293</span>
                            Modems, Routers
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">40</span>
                            Computer Accessories
                        </a>
                        <a href="#" class="list-group-item">
                            <span class="badge">39</span>
                            Video Game Consoles
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>
</html>