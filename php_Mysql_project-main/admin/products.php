<?php 
$user="root";
$password="";
$pdo=new PDO('mysql:host=localhost;dbname=sport_goods',$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$ana= " SELECT * FROM products ";
$products=$pdo->query($ana);



    // echo "<pre>";
    // var_dump($products);
    // echo "<pre>";
    // exit;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
       
      
       
       

       

      <div class="container" style="min-height: 700px;">
        <h1> PRODUCTS PAGE </h1>
        <a href="creatproduct.php" class="btn btn btn-success">creat</a>
      <br>

      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php  foreach( $products as $product ): ?>

      <th scope="row"><?php echo $product["product_id"] ?></th>

      <td><?php echo $product["product_name"] ?></td>

      <td><img src="image/product_image/<?php echo $product["product_image"] ?>" alt="image" style="width:70px;"></td>

      <td><?php echo $product["product_price"] ?></td>

      <td><?php echo $product["product_description"] ?></td>
      
      <td><?php echo $product["category_id"]  ?></td>
      <td>

      <form action="index.php" method="get" style="display:inline-block;">
      <input type="hidden" value=<?php echo $product["product_id"] ?> name="upadteproduct">
      <button type="submit" class="btn btn-sm btn-outline-secondary">edit</button>
      </form>
      <form action="" method="post" style="display:inline-block;">
            <input type="hidden" value="<?php echo $product["product_id"] ?>" name="deleteproduct">
            <input type="submit" name ="delete1" class="btn btn-sm btn btn-dange" value="delete">
      </form>

      </td>
      

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<?php 

if(isset($_POST['delete1'])){

    $id = $_POST['deleteproduct'];
    echo $id;
    $sqlDelete = "DELETE FROM products WHERE product_id = '$id'";
    $delete = $pdo->exec($sqlDelete);
    delete_category($connect , $id);
}
?>









   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>