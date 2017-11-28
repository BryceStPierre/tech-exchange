<?php
    include('server/database.php');
    $db = new Database();

    $cats = $db->query("SELECT * FROM categories GROUP BY label ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechExchange | Post Ad</title>

    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link href="lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php 
        include('reuse/navbar.php'); 

        if (!$_SESSION['signed_in'])
            header('Location: signin.php?signin=please');
    ?>
    <div class="container">
        <form action="server/postAction.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="text-center">Post Ad</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">                    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="0">Selling</option>
                                    <option value="1">Buying</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category" required>
                                    <?php foreach ($cats as $cat): ?>
                                        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['label']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="5" class="form-control" name="description" id="description" placeholder="Description" required></textarea>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <div class="input-group" id="price-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Amount">
                            <div class="input-group-addon">.00</div>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="price-option" id="option1" value="1" checked>
                                Price
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="price-option" id="option2" value="0">
                                Free
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="price-option" id="option3" value="-1">
                                Contact
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-earphone"></span>
                                </div>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <img class="img-responsive img-rounded" src="img/dummy.png" id="image-preview" alt="Image">
                    <br>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                </div>

            </div>
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Post Ad</button>
                <a href="#" class="btn btn-danger">Cancel</a>
            </p>
        </form>
    </div>

    <?php include('reuse/footer.php'); ?>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="js/ui.js"></script>
    <script src="js/post.js"></script>
</body>
</html>