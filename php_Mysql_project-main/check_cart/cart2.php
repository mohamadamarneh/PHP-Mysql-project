<?php
session_start();
// session_destroy();
require_once "../connect2.php";

?>

<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $conn->prepare('SELECT * FROM products WHERE product_id = ?');
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: ../check_cart/cart2.php');
    exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}


// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: ../check_cart/cart2.php');
    exit;
}


// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $conn->prepare('SELECT * FROM products WHERE product_id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['product_price'] * (int)$products_in_cart[$product['product_id']];
    }
}


// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {


  

header('Location: orderplaced.php');
exit;}

?>

<?php include_once "../headFoot/header.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/cart.css">
    <title>Document</title>


    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>

    <div class="wrap cf">
        <h1 class="projTitle">This is <span>Your</span> Shopping Cart</h1>
        <div class="heading cf">
            <h1>My Cart</h1>
            <a href="../shop.php" class="continue">Continue Shopping</a>
        </div>
        <div class="infoWrap">
            <div class="cartSection">
                <form action="cart2.php" method="post"  >
                    <table class="table">
                        <thead>
                            <tr>
                                <th> </th>
                                <th scope="col">Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th> </th>

                            </tr>
            </thead>
                <?php
                 $stat = $conn->query("SELECT * FROM cart_temp");
                 $rows = $stat->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php if (empty($rows)) :?>
                    <tr>
                        <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                    </tr>
                    <?php else : 

                        ?>
                        <tbody class="cartWrap">
                            
                    <?php
                    $total=0; 
                    foreach($rows as $row) : 
                       $total += $row['quantity'] * $row['product_price'];
                        ?>
                        <tr>
                            <td class="img" scope="row">

                                <img src="../fwy6zosqphc8hzjk0rgr.webp" width="50" height="50" alt="<?= $product['product_name'] ?>">
                                </a>
                            </td>
                            <td>
                                <a href="cart2.php?page=product&id="><?= $row['product_name'] ?></a>
                                <br>

                            </td>
                            <td class="price"><?=  $row['product_price'] ?></td>
                            <td class="quantity">
                                <form  method="post">
                                    <input type="number" name="prd_quantity" value="<?= $row['quantity'] ?>" min="1" placeholder="Quantity" required>
                                </form>
                            </td>
                            <td class="price"><?= $row['quantity'] * $row['product_price']?> JOD </td>
                            <td> 
                                <a href="cart2.php?delete_product=<?= $row['product_id'] ?>" class="remove">X</a>
                                <a  type="submit" class="btn btn-primary mx-2"href="cart2.php?update_product=<?= $row['product_id'] ?>" style="background-color:#ef7828 ; border:0 ;color:white">Update</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total Cost order</td>
                            <td class="total">
                                    <label style="color:#ef7828 ; font-weight:700"><?=$total?> JOD</label>
                            </td>
                        </tr>
                    </tbody>

                    </table>
                    <div class="subtotal cf">


                        <a href="checkout.php" class="btn continue"> Place Order</a>


                    </div>

                </form>
            </div>
        </div>
    </div>

    </div>
    <?php 
        if($_GET['delete_product']){
            $delete_prd = $_GET['delete_product'];
            $stat=$conn->query("DELETE FROM `cart_temp` WHERE product_id='$delete_prd'");
        }
        if($_GET['update_product']){
            $updateQty = $_POST['prd_quantity'];
            $update_prd = $_GET['update_product'];
            $sql = "UPDATE cart_temp SET quantity='$updateQty' WHERE product_id = '$update_prd'";
            $stat=$conn->query($sql);
        }
    ?>

</body>

</html>