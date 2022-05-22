
<?php



$id = $_GET['updateuser'];


$pdo = new PDO('mysql:host=localhost;dbname=sport_goods', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->query("SELECT * FROM userstable WHERE user_id ='$id'");
$user = $statement->fetch(PDO::FETCH_ASSOC);


// $name= $product["user_name"];
// $address= $product["user_address"];
// $email= $product["user_email"];
// $pass= $product["user_password"];
// $phone= $product["user_phone"];
// $flage= $product["flage"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name= $_POST["name"];
  $address= $_POST["address"];
  $email= $_POST["email"];
  $pass= $_POST["pass"];
  $phone= $_POST["phone"];
  


    if (!$name) {
        $errors[] = 'Product title is required';
    }

    if (!$email) {
        $errors[] = 'Product price is required';
    }

    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE userstable SET user_name = :name, 
                                        user_address = :address, 
                                        user_email = :email, 
                                        user_password = :pass,
                                        user_phone = :phone
                                         WHERE user_id = :id");
    
    $statement->bindValue(':id',$id);
    $statement->bindValue(':name',$name);
    $statement->bindValue(':address',$address);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':pass',$pass);
    $statement->bindValue(':phone',$phone);
   

        $statement->execute();

    }

}

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
  <title> USER</title>
</head>

<body>
  <div>

  </div>


  <div class="continer" style="min-height: 700px;">
  
    <h2>Edit User: </h2>


    <div class="container">
      <form method="post" enctype="multipart/form-data">
      <div class="form-group">
    <label for="exampleFormControlInput1">user name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php echo $user['user_name'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">address</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="address" value="<?php echo $user['user_address'] ?>" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">E-mail</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="email" value="<?php echo $user['user_email'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">password</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="pass" value="<?php echo $user['user_password'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">phone</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" value="<?php echo $user['user_phone'] ?>">
  </div>

        <button type="submit" class="btn btn-primary">Submit</button><br>
      </form>
    </div>
  </div>
  <div>

  </div>

</body>

</html>

