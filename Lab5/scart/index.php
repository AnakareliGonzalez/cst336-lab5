<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Products Page</title>
    </head>
    <body>
    <div class='container'>
        <div class='text-center'>
            
            <!-- Bootstrap Navagation Bar -->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>Shopping Land</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='scart.php'>Cart</a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
            
            <!-- Search Form -->
            <form enctype="text/plain">
                <div class="form-group">
                    <label for="pName">Product Name</label>
                    <input type="text" class="form-control" name="query" id="pName" placeholder="Name">
                </div>
                <input type="submit" value="Submit" class="btn btn-default">
                <br /><br />
            </form>
            
            <!-- Display Search Results -->
            
            <br/> <br/> <br/>
            <?php
            
                
                include 'functions.php';
                session_start();
                
                //print_r($_POST);
                
                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart'] = array();
                }
                
                if(isset($_POST['itemName'])){
                    //creating an array to hold an item's properties
                    $newItem = array();
                    $newItem['name'] = $_POST['itemName'];
                    $newItem['id'] = $_POST['itemId'];
                    $newItem['price'] = $_POST['itemPrice'];
                    $newItem['image'] = $_POST['itemImage'];
                    
                    //echo $_SESSION['cart'];
                    //Storing the item array in the cart array
                    array_push($_SESSION['cart'], $newItem);
                    //echo $_SESSION['cart'];
                }
                
                //echo ($_SESSION);
                //print_r($_SESSION);
                
                 if(isset($_GET['query'])){
                     include 'wmapi.php';
                     $items = getProducts($_GET['query']);
                    // print_r($items);
                 }
            ?>
            
            <?php displayResults(); ?>
        </div>
    </div>
    </body>
</html>