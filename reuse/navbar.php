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