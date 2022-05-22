<?php 
    require 'user_backend.php';
    session_start();
    
    $test_user = select_user($conn , $_SESSION['user_id '] );
  
    
    // echo "<pre>";
    // print_r($test_user);
    // echo "</pre>";
    include_once '../headFoot/header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <title>Document</title>
</head>
<body>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">

                <div class="mt-3 text-center">
                <a class="btn btn-primary profile-button" href="profile.php">Profile</a>
                </div>

                <div class="mt-3 text-center">
                    <a class="btn btn-primary profile-button" href="history.php">History</a>
                </div>

            <span> </span></div>
        </div>

        
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post" >
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Name</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Name" value="<?php echo $test_user['user_name'] ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control" name="user_email" placeholder="Email" value="<?php echo $test_user['user_email'] ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Password</label>
                        <input type="password" class="form-control" name="user_pass" placeholder="Password" value="<?php echo $test_user['user_password'] ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Address</label>
                        <input type="text" class="form-control" name="user_address" placeholder="Adress" value="<?php echo $test_user['user_address'] ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label>Phone</label>
                        <input type="text" class="form-control"  placeholder="Phone" value="<?php echo $test_user['user_phone'] ?>" name="user_phone">
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <input class="btn btn-primary profile-button"  type="submit" value="Save Profile" name="update">
                </div>

            </form>    
            </div>

        </div>
    </div>
</div>
</div>
</div>
<?php 
 if(isset($_POST['update'])){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_pass'];
    $user_address = $_POST['user_address'];
    $user_phone = $_POST['user_phone'];

    update_user($connect , $user_name ,$user_address ,$user_email ,$user_password ,$user_phone ,2);
    echo '<script type="text/javascript">
       window.onload = function () { alert("Update Done"); } 
    </script>'; 
    
}

?>

<?php include_once '../headFoot/footer.php'; ?>
 
</body>
</html>



