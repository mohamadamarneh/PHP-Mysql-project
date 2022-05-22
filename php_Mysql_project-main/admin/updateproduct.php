
<?php



$id = $_GET['upadteproduct'] ?? null;

$pdo = new PDO('mysql:host=localhost;dbname=sport_goods', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products WHERE product_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);




// $title = $product['product_name'];
// $description = $product['product_description'];
// $price = $product['product_price'];
// $cat= $product["category_id"];


$ana= " SELECT * FROM categories";
$pro=$pdo->prepare(" SELECT * FROM categories");
$pro->execute();
$cate = $pro->fetchALL(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($cate);
    // echo "<pre>";


?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="app.css" rel="stylesheet" />
  <title>Products CRUD</title>
</head>

<body>
  <div>
   
  </div>


  <div class="continer" style="min-height: 700px;">
    
    <h2>Update Product:</h2>

    <div class="container">
      <form method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label>Product Image</label><br>
          <input type="file" name="image">
        </div>
        <div class="form-group">
          <img src="image/product_image/<?php echo $product['product_image'] ?>" widht="100px" ; height= "100px" alt="pic">
        </div>
        <div class="form-group">
          <label>Product title</label>
          <input type="text" name="title" class="form-control" value="<?php echo $product['product_name'] ?>">
        </div>
        <div class="form-group">
          <label>Product description</label>
          <textarea class="form-control" name="description"> <?php echo $product['product_description'] ?></textarea>
        </div>
        <div class="form-group">
          <label>Product price</label>
          <input type="number" step=".01" name="price" class="form-control" value="<?php echo $product['product_price'] ?>">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">categury</label>
        <select name="cat">
        <?php foreach($cate as $i => $ca): ?>
        <option value="<?php echo $ca['category_id'] ?>" > <?php echo $ca['category_name'] ?> </option>
        <?php endforeach  ?>
        </select>
        </div>
        <input type="submit" class="btn btn-primary" name="updateproduct" value="Update"><br>
      </form>
    </div>
  </div>
  <div>

  </div>
<?php 
  if (isset($_POST['updateproduct'])) {
    

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES["image"]["tmp_name"],"image/product_image/". $_FILES["image"]["name"]);
    if (!empty($title) && !empty($description) && !empty($price)&& !empty($cat) ) {
        $statement = $pdo->prepare("UPDATE products SET product_name = :title, 
                                        product_image = :image, 
                                        category_id = :cat, 
                                        product_description	 = :description, 
                                        product_price = :price WHERE product_id = '$id'");


        $statement->bindParam(':title', $title);
        $statement->bindParam(':cat', $cat);
        $statement->bindParam(':image', $image);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':price', $price);


        $statement->execute();
        header("Location:index.php?upadteproduct=$id.php");
    }

}

?>
</body>

</html>