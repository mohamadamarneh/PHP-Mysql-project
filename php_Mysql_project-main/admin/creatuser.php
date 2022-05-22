<?php 

$user="root";
$password="";
$pdo=new PDO('mysql:host=localhost;dbname=sport_goods',$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
$flage= 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name= $_POST["name"];
    $address= $_POST["address"];
    $email= $_POST["email"];
    $pass= $_POST["pass"];
    $phone= $_POST["phone"];
    

    $adding =$pdo->prepare(" INSERT INTO userstable (user_name, user_address, user_email, user_password , user_phone , flage)
                   VALUES (:name ,:address ,:email,:pass,:phone,:flage)");

    $adding->bindParam(':name',$name);
    $adding->bindParam(':address',$address);
    $adding->bindParam(':email',$email);
    $adding->bindParam(':pass',$pass);
    $adding->bindParam(':phone',$phone);
    $adding->bindParam(':flage',$flage);


    $adding->execute();

    // $Ad=$pdo->prepare($adding);


}
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
      <h1>CREAT user</h1>
      <h2><a href="users.php">back to users</a></h2>
      <br>
      <form method="post"  enctype='multipart/form-data'>
  <div class="form-group">
    <label for="exampleFormControlInput1">user name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">address</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="address" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">E-mail</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">password</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="pass">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">phone</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="phone">
  </div>

  <div class="form-group">
  <button type="submit" class="btn btn lg btn-outline-primary">add</button>
  </div>
</form>

      </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>