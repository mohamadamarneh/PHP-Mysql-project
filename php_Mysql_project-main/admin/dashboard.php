<?php 

// connection

$user="root";
$password="";
$pdo=new PDO('mysql:host=localhost;dbname=sport_goods',$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// end connect



// take data
$statement = $pdo->prepare('SELECT COUNT(product_id) FROM products');
$statement->execute();
$products = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->prepare('SELECT COUNT(user_id) FROM userstable');
$statement->execute();
$users = $statement->fetch(PDO::FETCH_ASSOC);


$statement = $pdo->prepare('SELECT COUNT(order_id) FROM orders');
$statement->execute();
$orders = $statement->fetch(PDO::FETCH_ASSOC);


$statement = $pdo->prepare('SELECT COUNT(discount_id) FROM discount');
$statement->execute();
$coupon = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->prepare('SELECT COUNT(discount_id) FROM discount WHERE discount_active = 1');
$statement->execute();
$actcoupon = $statement->fetch(PDO::FETCH_ASSOC);


$statement = $pdo->prepare('SELECT COUNT(discount_id) FROM discount WHERE discount_active = 0');
$statement->execute();
$noncoupon = $statement->fetch(PDO::FETCH_ASSOC);


$statement = $pdo->prepare('SELECT COUNT(category_id) FROM categories');
$statement->execute();
$cat = $statement->fetch(PDO::FETCH_ASSOC);


$statement = $pdo->prepare('SELECT orders_details.product_id,products.product_id,products.product_name, COUNT(orders_details.product_id) 
                    FROM orders_details,products WHERE orders_details.product_id = products.product_id 
                    GROUP BY products.product_id ORDER BY COUNT(orders_details.product_id) DESC;');
$statement->execute();
$datas = $statement->fetchAll(PDO::FETCH_ASSOC);



// select orders_details.product_id, count(*) from orders_details group by product_id;
// SELECT orders_details.product_id,products.product_id,products.product_name, COUNT(orders_details.product_id) FROM orders_details,products WHERE orders_details.product_id = products.product_id GROUP BY products.product_id ORDER BY COUNT(orders_details.product_id) ASC;
// SELECT orders_details.product_id,products.product_id,products.product_name, COUNT(orders_details.product_id) FROM orders_details,products WHERE orders_details.product_id = products.product_id GROUP BY products.product_id ORDER BY COUNT(orders_details.product_id) DESC;


// $statement = $pdo->prepare('SELECT  FROM orders_details');
// $statement->execute();
// $noncoupon = $statement->fetch(PDO::FETCH_ASSOC);




//end take data

?>
<!doctype html>
<html lang="en">
  <head>
    <title>dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        .grey-bg {  
    background-color: #F5F7FA;
}

    </style>
  
</head>
  <body>

<div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase">Statistics</h4>
        <p>Website data and statistics.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-pencil primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?php echo $products["COUNT(product_id)"] ?></h3>
                  <span>Products</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-graph success font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?php echo $orders["COUNT(order_id)"] ?></h3>
                  <span>New Orders</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="success"><?php echo $users["COUNT(user_id)"] ?></h3>
                  <span>Clients</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-user success font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>
  
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="danger"><?php echo $coupon["COUNT(discount_id)"] ?></h3>
                  <span>Coupons</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-bar-chart primary font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
  
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="warning"><?php echo $cat["COUNT(category_id)"] ?></h3>
                  <span>Categories</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-pie-chart warning font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>






    </div>
  
   
  </section>


  <section id="stats-subtitle">
  <div class="row">
    <div class="col-12 mt-3 mb-1">
      <h4 class="text-uppercase"> More Statistics</h4>
      <p> </p>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-6 col-md-12">
      <div class="card overflow-hidden">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
                <i class="icon-bar-chart success font-large-2 mr-2"></i>
              </div>
              <div class="media-body">
                <h4>Total Active Coupons</h4>
                <span>Coupons that the customer can use</span>
              </div>
              <div class="align-self-center">
                <h1><?php echo $actcoupon["COUNT(discount_id)"] ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-md-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
                <i class="icon-bar-chart danger font-large-2 mr-2"></i>
              </div>
              <div class="media-body">
                <h4>Total non-Active Coupons</h4>
                <span>Coupons that the customer cant use</span>
              </div>
              <div class="align-self-center"> 
                <h1><?php echo $noncoupon["COUNT(discount_id)"] ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>