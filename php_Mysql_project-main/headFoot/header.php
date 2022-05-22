<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <!-- fontss -->
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    <!-- style -->


    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            scroll-behavior: smooth;
            font-family: 'Bebas', sans-serif;
        }


        /* ________________________________________________________________________________________________________________ */


        .content {
            width: 94%;
            margin: 4em auto;
            font-size: 20px;
            line-height: 30px;
            text-align: justify;
        }

        .logo {
            line-height: 60px;
            float: left;
            margin: 16px 46px;
            color: #fff;
            font-size: 20px;
            letter-spacing: 2px;
            /* font-family: 'Koulen', cursive; */
            border: #fff 1px solid;
            position: absolute;
            padding: 5px;
        }

        nav {
            position: sticky;
            width: 100%;
            line-height: 60px;
        }

        nav ul {
            line-height: 60px;
            list-style: none;
            background-color: #ef7828;
            overflow: hidden;
            color: #fff;
            padding: 0;
            text-align: right;
            margin: 0;
            padding-right: 40px;

        }



        nav ul li {
            display: inline-block;
            padding: 16px 40px;
            ;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 20px;
        }

        nav ul li a:hover {


            background-color: #fafafaa5;
            ;
            color: rgb(255, 255, 255);
            text-decoration: none;
            border: transparent;
            border-radius: 5%;
            padding: 5px;





        }

        .menu-icon {
            line-height: 60px;
            width: 100%;
            background: #000;
            text-align: right;
            box-sizing: border-box;
            padding: 15px 24px;
            cursor: pointer;
            color: #fff;
            display: none;
        }

        @media screen and (max-width: 1024px) {

            .logo {
                position: absolute;
                top: 0;
                margin-top: 16px;
                font-size: 20px;

            }


            nav ul {
                max-height: 0px;
                background: #e08547;
            }




            .showing {
                max-height: 34em;
            }

            nav ul li {
                box-sizing: border-box;
                width: 100%;
                padding: 24px;
                text-align: center;

            }

            .menu-icon {
                display: block;
                background-color: #ef7828;

            }
        }

        .menu a {
            border: transparent;
        }

        #navicon:hover {
            background-color: transparent;
            border: none;
        }

        #navicon2:hover {
            background-color: transparent;
            border: none;
        }



        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: fixed;
          
            background-color: #ef7828;
            min-width: 110px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            float: none;
            color: black;
            padding: 10px 10px;
            text-decoration: none;
            display: block;
            text-align: left;
            color: #fff;
        }

        /* Add a grey background color to dropdown links on hover */
        .dropdown-content a:hover {
            background-color: rgba(255, 255, 255, 0.648);
            color: #fff;
            
        }
        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>


<body>

    <div class="wrapper">
        <header>
            <nav>
                <div class="menu-icon">
                    <i class="fa fa-bars fa-2x"></i>
                </div>
                <div class="logo">
                    Focus Zone
                </div>
                <div class="menu">
                    <ul>
                        <li class="active">
                            <a href="../home.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop/shop.php">Shop</a>
                        </li>
                        
                        <li>
                            <div class="dropdown">
                                <a class="dropbtn" id="navicon" href="http://localhost/php_mysql_project/registration/sign up.php">Profile</a>
                                <div class="dropdown-content">
                                   <?php
                        include "../connect2.php";
                        session_status();
                        // session_destroy();

                        if (isset($_SESSION['user_id '])) {
                            $id = $_SESSION['user_id '];
                            $name = "SELECT user_name  FROM `userstable` where user_id ='$id'";
                            $result = $connect->query($login);
                            $user_name = $result->fetch();

                            echo "<li><a href='../registration/logout.php'>logout</a></li>";
                            echo "Welcom " . $user_name;
                        } else {
                            echo " <a href='http://localhost/php_mysql_project/registration/sign up.php'>Register</a>";
                            echo "<a href='http://localhost/php_mysql_project/registration/sign up.php'>Login</a>";
                        }
                        ?>

                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="../check_cart/cart2.php" id="navicon2"><img src="../media/icons8-buying-50.png" width="70%" height="70%"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

       


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>