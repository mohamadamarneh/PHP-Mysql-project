<?php 
require 'user_backend.php';

$test_user = history_orders($connect , 1);


$arr1 =[];
for ($i=0; $i < count($test_user) ; $i++) { 
    if(!in_array($test_user[$i]['order_id'] , $arr1)){
        array_push($arr1 , $test_user[$i]['order_id']);
        
    }
}

include '../inc/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profile.css">
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

      
        <div class="col-sm-9 border-right">
            <div class="p-3 py-5">
             
            
 
        
    <?php for($i=0 ; $i<count($arr1) ; $i++){ ?>
    <div class="col-md-3 border-right"></div>
    <div class="col-md-9 border-right ">
            <div class="p-3 py-4">
             
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <td><?php echo $arr1[$i]?></td>
                        <th scope="col">Order Date</th>
                        <td></td>
                    </tr>
                </thead> 
                <thead>  
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Price/product</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_price_order = 0;
                    $total_qty_order = 0;
                    for($j=0 ; $j<count($test_user);$j++){
                            if($test_user[$j]['order_id'] == $arr1[$i]){
                                $total_price_order += $test_user[$j]['product_price'] * $test_user[$j]['quantity'] ;
                                $total_qty_order += $test_user[$j]['quantity'];
                        ?>    
                    <tr>
                        <td ><?php echo $test_user[$j]['product_name'] ?></td>
                        <td ><?php echo $test_user[$j]['quantity'] ?></td>
                        <td ><?php echo $test_user[$j]['product_price']  ?></td>
                       
                        <td ><?php echo $test_user[$j]['product_price'] * $test_user[$j]['quantity']  ?></td>
                        
                        
                    </tr>
                    <?php } ?>
                    <?php } ?>  
                            
                    <tr>
                        <th scope="col">Totla QTY</th>
                        <td scope="col"><?php echo $total_qty_order ?></td>
                        <th scope="col">Total Price</th>
                        <td scope="col"><?php echo $total_price_order ?></td>
                    </tr>

                </tbody> 
               
            </table>  
        </div>
    </div>
    <?php } ?>
    
</div>

</div>

</div>
</div>
    </div>
</body>
</html>
<?php include_once '../inc/footer.php'; ?>

