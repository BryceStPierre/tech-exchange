<?php 
    session_start();
    if (!array_key_exists('signed_in', $_SESSION))
        $_SESSION['signed_in'] = FALSE;
?>
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
                <li id="navbar-browse"><a href="browse.php">Browse</a></li>
                <li id="navbar-sell"><a href="post.php?type=0">Sell</a></li>
                <li id="navbar-buy"><a href="post.php?type=1">Buy</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a href="#">FAQ</a></li>-->
                <?php if ($_SESSION['signed_in'] == TRUE): ?>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>&emsp;<?php echo $_SESSION['user']['name']; ?></a></li>
                    
                    <?php if (array_key_exists('user_code', $_SESSION)): ?>
                        <?php if ($_SESSION['user_code'] == 1 || $_SESSION['user_code'] == 2): ?>
                            <li><a href="dashboard.php"><span class="glyphicon glyphicon-wrench"></span></a></li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li><a href="server/signoutAction.php"><span class="glyphicon glyphicon-off"></span></a></li>
                <?php else: ?>
                    <li><a href="signin.php">Sign In</a></li>
                <?php endif; ?>
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