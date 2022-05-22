<?php
session_start();
require "../connect2.php";
 include_once "../headFoot/header.php"

?>
<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $conn->prepare('SELECT * FROM products WHERE product_id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>






</head>

<body>
<nav class="nav navbar navbar-expand-lg navbar-light  ">
  <a class="navbar-brand" href="../home.php">Focus Zone</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../shop/shop.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../check_cart/cart2.php">Cart</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/php_mysql_project/registration/login.php">Login</a>
          <a class="dropdown-item" href="http://localhost/php_mysql_project/registration/sign up.php">Register</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/php_mysql_project/user/profile.php">Profile</a>
        </div>
      </li>
     
    </ul>
    
  </div>
</nav>
        <main >

            <div class="product content-wrapper">
                <img src="../fwy6zosqphc8hzjk0rgr.webp" width="500" height="500" alt="<?= $product['product_name'] ?>">
                <div>
                    <h1 class="name"><?= $product['product_name'] ?></h1>
                    <span class="price">
                        &dollar;<?= $product['product_price'] ?>
                    </span>
                    <form action="../check_cart/cart2.php" method="post">
                        <input type="number" name="quantity" value="1" min="1" max="<?= $product['quantity'] ?>" placeholder="Quantity" required>
                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                        <input type="submit" value="Add To Cart">
                    </form>
                    <div class="description">
                        <?= $product['product_description'] ?>
                    </div>
                </div>
            </div>
        </main>




        <div class="text-center p-3 align-items-end" style="background-color: rgba(70, 70, 70, 0.907);">
      © 2022 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">FocusZone.com</a>
    </div>
</body>

</html>
