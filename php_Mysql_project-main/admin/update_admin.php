<?php 
require "category_backend.php";

$id = $_GET['updateadmin'];
$admin = view_one_admin($connect , $id)
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <div></div>
      
  <div class="container mt-5" style="min-height: 700px; width:50%">
      <h1>Add New Admin</h1>
     
      <br>
      <form method="post"  enctype='multipart/form-data'>
            <div class="form-group">
              <label for="exampleFormControlInput1">Admin Name</label>
              <input type="text" class="form-control" value=<?php echo $admin['admin_name'] ?>  name="admin_name">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Admin Email</label>
              <input type="email" class="form-control" value=<?php echo $admin['admin_email'] ?>  name="admin_email">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Admin Password</label>
              <input type="text" class="form-control" value=<?php echo $admin['admin_password'] ?>  name="admin_password">
            </div>


            
            <div class="form-group">
            <input type="submit" class="btn btn lg btn-outline-primary" value = "Add" name="submit">
            </div>
</form>

<?php 
    if(isset($_POST['submit'])){
        if(!empty($_POST['admin_name']) && !empty($_POST['admin_email']) && !empty($_POST['admin_password'])){
            $name = $_POST['admin_name'] ; 
            $email = $_POST['admin_email'];
            $password = $_POST['admin_password'];

            echo $id;
            echo $name;
            echo $email;
            echo $password;
            

            update_admin($connect , $name , $email , $password , $id);
        }
    }
?>
          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
