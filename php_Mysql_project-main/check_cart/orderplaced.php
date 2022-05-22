<?php
include "../headFoot/header.php";

require "../connect2.php";
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

<style>


  .container{
   margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #back{
    border: none;
    background-color:orange;
    color: white;
  }
  .btn{
    background-color: orange;
    color: white;
    border: none;
  }
  .btn:hover{
    background-color: white;
    color: orange;
    border: solid 1px orange;
  }
</style>

<body>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <section class="container ">

<?php 
if (isset($_POST['emptyCart'])){
$sql = "TRUNCATE TABLE `cart_temp`";

//Prepare the SQL query.
$statement = $conn->prepare($sql);

//Execute the statement.
$statement->execute();

// header("location: cart2.php ");


}


?>

<form action="" method="post">
    <div>
      <h1>Your Order Has Been Placed</h1>
      <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
      <hr>
     <a class="btn btn-primary" href="../shop/shop.php"> <input type="hidden" name="emptyCart" value="Back To Shop" id="back"> Back To Shop</a>
      
    </div>

</form>




  </section>


</body>

</html>