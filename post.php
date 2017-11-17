<?php

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
    <?php include('reuse/navbar.php'); ?>

    <div class="container">
        <form action="server/postAd.php" method="post">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="text-center">Post Ad</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">                    
                    <div class="form-group">
                        <label for="title">Item Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Item Title">
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="type">Ad Type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="0">Selling</option>
                                    <option value="1">Buying</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="category">Item Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option>Any</option>
                                    <option>PCs, Laptops</option>
                                    <option>TVs, Monitors</option>
                                    <option>Computer Accessories</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Item Description</label>
                        <textarea rows="5" class="form-control" id="description" placeholder="Item Description"></textarea>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="price">Item Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" id="price" placeholder="Amount">
                            <div class="input-group-addon">.00</div>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionPrice" id="option1" value="option1" checked>
                                Price
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionPrice" id="option2" value="option2">
                                Free
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionPrice" id="option3" value="option3">
                                Contact
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-earphone"></span>
                                </div>
                                <input type="text" class="form-control" id="telephone" placeholder="Telephone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </div>
                                <input type="text" class="form-control" id="email" placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <img class="img-responsive img-rounded" src="img/dummy.png" alt="Image">
                    <br>
                    <div class="form-group">
                        <label for="image">Item Image</label>
                        <input name="image" id="image" type="file">
                    </div>
                    <!--<div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon" id="addon1">
                                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            </span>
                            <input type="text" class="form-control" id="image" placeholder="External Image URL" aria-describedby="addon1">
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionImage" id="optionImage1" value="option1" checked>
                                Upload Image
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionImage" id="optionImage2" value="option2" checked>
                                External URL
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionImage" id="optionImage3" value="option3">
                                No Image
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Preview</button>-->
                </div>

            </div>
            <p class="text-center">
                <button type="submit" class="btn btn-primary">Post Ad</button>
                <button class="btn btn-danger">Cancel</button>
            </p>
        </form>
    </div>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="js/ui.js"></script>
</body>
</html>