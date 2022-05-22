<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php include "include/headerA_admin.php"; ?>
<link rel="stylesheet" href="sidebar/css/style.css">
<div class="nav-side-menu">
    <div class="brand">Sport</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="index.php?dashboard">
                    
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>
                
                <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Add Admin
                  </a>
                  </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed">
                  <a href="#"><i class="fa fa-gift fa-lg"></i>Categories <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li ><a href="index.php?add_category">Add Categories</a></li>
                    <li><a href="index.php?view_category">View Categories</a></li>
                    
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Prdoucts <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                    <li><a href="index.php?add_product">Add Prdoucts</a></li>
                    <li><a href="index.php?view_product">View Prdoucts</a></li>
                 
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> Users <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li ><a href="index.php?add_user">Add Users</a></li>
                    <li><a href="index.php?view_user">View Users</a></li>
                </ul>
                <li  data-toggle="collapse" data-target="#Copoun">
                  <a href="#"><i class="fa fa-gift fa-lg"></i>Copoun <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="Copoun">
                    <li><a href="index.php?add_coupon">Add Copoun</a></li>
                    <li><a href="index.php?view_coupon">View Copoun</a></li>

                </ul>

                <li  data-toggle="collapse" data-target="#admin">
                  <a href="#"><i class="fa fa-gift fa-lg"></i>Admin <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="admin">
                    <li ><a href="index.php?add_admin">Add Admin</a></li>
                    <li><a href="index.php?view_admin">View Admin</a></li>

                </ul>

            </ul>
     </div>
</div>
<div class="container float-end">
  <?php if(isset($_GET['view_category'])) include "viewCategory.php"; ?>
  <?php if(isset($_GET['update'])) include "update_category.php"; ?>
  <?php if(isset($_GET['add_category'])) include "addCategory.php"; ?>


  <?php if(isset($_GET['add_product'])) include "creatproduct.php"; ?>
  <?php if(isset($_GET['view_product'])) include "products.php"; ?>
  <?php if(isset($_GET['upadteproduct'])) include "updateproduct.php"; ?>
  
  <?php if(isset($_GET['add_user'])) include "creatuser.php"; ?>
  <?php if(isset($_GET['view_user'])) include "users.php"; ?>
  <?php if(isset($_GET['updateuser'])) include "updateuser.php"; ?>
  
  <?php if(isset($_GET['add_coupon'])) include "creatcoupon.php"; ?>
  <?php if(isset($_GET['view_coupon'])) include "coupons.php"; ?>
  <?php if(isset($_GET['updatecoupon'])) include "updatecoupon.php"; ?>

  <?php if(isset($_GET['add_admin'])) include "createAdmin.php"; ?>
  <?php if(isset($_GET['view_admin'])) include "view_admin.php"; ?>
  <?php if(isset($_GET['updateadmin'])) include "update_admin.php"; ?>

  <?php if(isset($_GET['dashboard'])) include "dashboard.php"; ?>
</div>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>