<?php
    include('server/database.php');
    $db = new Database();

    $query = "SELECT * FROM ads";
    $conditions = [];

    $search = (isset($_GET['search'])) ? $_GET['search'] : 0;
    $category = (isset($_GET['category'])) ? $_GET['category'] : 0;
    $price = (isset($_GET['price'])) ? $_GET['price'] : 0;
    $type = (isset($_GET['type'])) ? $_GET['type'] : 2;

    if ($search != 0)
        array_push($conditions, "'$search' LIKE CONCAT('%',title,'%')");
    if ($category != 0)
        array_push($conditions, "category_id = $category");
    if ($price != 0) {
        switch ($price) {
            case 1: array_push($conditions, "price BETWEEN 0 AND 99"); break;
            case 2: array_push($conditions, "price BETWEEN 100 AND 499"); break;
            case 3: array_push($conditions, "price BETWEEN 500 AND 999"); break;
            case 4: array_push($conditions, "price BETWEEN 1000 AND 2499"); break;
            case 5: array_push($conditions, "price >= 2500"); break;
        }
    }
    if ($type != 2)
        array_push($conditions, "type = $type");

    if (sizeof($conditions) > 0)
        $query .= " WHERE " . implode(" AND ", $conditions);

    $ads = $db->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TechExchange | Browse</title>

    <link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link href="lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include('reuse/navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-10 col-lg-10">
                <h2>Browse</h2>
            <?php if (count($ads) == 0): ?>
                <br>
                <h4>Sorry, no ads found.</h4>
            <?php endif; ?>
                <h4 id="search-label"></h4>
                <div class="list-group">
                    <?php foreach($ads as $ad): ?>
                    <?php $cat = $db->query("SELECT label FROM categories WHERE id = " . $ad['category_id'])[0]['label']; ?>
                    <div class="list-group-item">
                        <div class="media">
                            <div class="media-left media-top">
                            <?php if ($ad['image']): ?>
                                <img class="media-object" src="data:image/jpeg;base64,<?php echo base64_encode($ad['image']); ?>" alt="Thumbnail">
                            <?php endif; ?>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="ad.php?id=<?php echo $ad['id']; ?>"><?php echo $ad['title']; ?></a>
                                </h4>
                                <?php $label = ($ad['type'] === 0) ? "Buying" : "Selling"; ?>
                                <h5><?php echo $cat; ?> <span class="label label-info"><?php echo $label; ?></span></h5>
                                <p>
                                    <?php 
                                        if (strlen($ad['description']) < 120)
                                            echo $ad['description'];
                                        else {
                                            echo substr($ad['description'], 0, 120);
                                            echo '...<br><a href="ad.php?id=' . $ad['id'] . '">Read more.</a>';
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="media-right media-top">
                                <h4 class="media-heading media-right">
                                    <?php 
                                        if ($ad['price'] == -1)
                                            echo 'Contact';
                                        elseif ($ad['price'] == 0)
                                            echo 'Free';
                                        else
                                            echo "$" . number_format($ad['price']);
                                    ?>
                                </h4>
                                <h5 class="text-right" style="font-size:12px">
                                    <?php 
                                        $date = strtotime($ad['date']);
                                        echo date("n/j/Y", $date); 
                                    ?>    
                                </h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="col-sm-3 col-md-2 col-lg-2">
                <h2>Filter</h2>
                <br>
                <form action="browse.php">
                    <?php if (isset($_GET['search'])): ?>
                    <input type="hidden" name="search" value="<?php echo htmlspecialchars($_GET['search']); ?>">
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" id="type">
                            <option value="2">Any</option>
                            <option value="0">Selling</option>
                            <option value="1">Buying</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="0">Any</option>
                            <?php 
                                $cats = $db->query("SELECT * FROM categories ORDER BY label ASC");
                                foreach($cats as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['label']; ?></option>
                            <?php endforeach; ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <select class="form-control" name="price" id="price">
                            <option value="0">Any</option>
                            <option value="1">$0 - $99</option>
                            <option value="2">$100 - $499</option>
                            <option value="3">$500 - $999</option>
                            <option value="4">$1,000 - $2,499</option>
                            <option value="5">$2,500+</option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
    </div>

    <?php include('reuse/footer.php'); ?>

    <script src="lib/jquery-3.2.1.min.js"></script>
    <script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script src="js/ui.js"></script>
    <script src="js/browse.js"></script>
</body>
</html>