<?php
 
 
require 'connect2.php';


?>
<?php
 
$stmt = $conn->query('SELECT * FROM categories ORDER BY category_id ASC ');
// $stmt->execute();
$cats = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous"
        >
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- css -->
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="slider.css">


        <script src="slider.js"></script>

        <!-- fontss -->
        <!-- fonts -->
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
                                <a   href=" home.php">Home</a>
                            </li>
                            <li>
                                <a   href="shop/shop.php">Shop</a>
                            </li>
                            <li>
                                <a   href="http://localhost/php_mysql_project/check_cart/cart2.php">Cart</a>
                            </li>
                            
                            <li>
                                <div class="dropdown">
                                    <a class="dropbtn" id="navicon" href="http://localhost/php_mysql_project/registration/sign up.php"><img src="icons8-test-account-80 (1).png" width="70%" height="70%"></a>
                                    <div class="dropdown-content">
                                        <a class="adrop" href="http://localhost/php_mysql_project/registration/sign up.php">Register</a>
                                        <a  class="adrop" href="http://localhost/php_mysql_project/registration/sign up.php">Login</a>
    
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <section class="hero">
                <div class="hero-inner">
                    <h1>Find Everything You are Looking For</h1>
                    <h2>View Our Awesome Sporting goods!</h2>
                    <div class="btns">
                        <a href="#about">
                            <button id="aboutus" class="btn">More About Us</button>
                        </a>
                        <a href="shop/shop.php">
                            <button id="shop" class="btn">Shop Now</button>
                        </a>
                    </div>
                </div>
            </section>
            <!-- cards section  -->
            <section class="wrapper">
                <h3>Categories</h3>
               
                <div class="container">
                    <div class="row">
                    <?php foreach ($cats as $cat):?>
                        <div class="col-md-4">
                            <div class="card text-white card-has-bg click-col" style="background-image:url('media/d79e502d-9282-4131-b187-081f33f123d4.webp');">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <small class="card-meta mb-2">View Our Collections Of</small>
                                        <h4 class="card-title mt-0 ">
                                            <!-- <a class="text-white" herf="#">Fittness Equipment</a> -->
                                            <a href="home.html"><?php echo $cat['category_name']?></a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <!-- <div class="col-md-4">
                            <div class="card text-white card-has-bg click-col" style="background-image:url('media/fwy6zosqphc8hzjk0rgr.webp'); ">
                                <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tree,nature" alt="Goverment Lorem Ipsum Sit Amet Consectetur dipisi?">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <small class="card-meta mb-2">View Our Collections Of</small>
                                        <h4 class="card-title mt-0 ">
                                            <a class="text-white" herf="#">Outdoors</a>
                                            <a href="home.html"> Outdoor Equipment</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-4">
                            <div class="card text-white card-has-bg click-col" style="background-image:url('media/d79e502d-9282-4131-b187-081f33f123d4.webp');">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <small class="card-meta mb-2">View Our Collections Of</small>
                                        <h4 class="card-title mt-0 ">
                                            <a herf="home.html">Sports Apparel</a>
                                            <a href="home.html"> Fittness Clothing</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div> -->
					

                    </div>
                </div>
            </section>



            <div class="slider">
                <div class="slide_viewer">
                  <div class="slide_group">
                    <div class="slide">
                        <img src="media/pexels-evg-kowalievska-1040424.jpg" width="100%" height="100%" >
                    </div>
                  
                    <div class="slide">
                        <img src="media/pexels-karolina-grabowska-4498553.jpg" width="100%" height="100%" >

                    </div>
                    <div class="slide">
                        <img src="/media/pexels-evg-kowalievska-1040425.jpg" width="100%" height="100%" >

                    </div>
                   
                    <div class="slide">
                        <img src="media/pexels-karolina-grabowska-4498609.jpg"  width="100%" height="100%">

                    </div>
                  </div>
                </div>
              </div><!-- End // .slider -->
              
              <div class="slide_buttons">
              </div>
              
              <!-- <div class="directional_nav">
                <div class="previous_btn" title="Previous">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                    <g>
                      <g>
                        <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
                          c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z"/>
                        <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z"/>
                        
                      </g>
                    </g>
                  </svg>
                </div>
                <div class="next_btn" title="Next">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                    <g>
                      <g>
                        <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z"/>
                        <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z"/>
                      </g>
                    </g>
                  </svg>
                </div> -->
              </div>
              <!-- End // .directional_nav -->
          

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
              <script>
                  $('.slider').each(function() {
    var $this = $(this);
    var $group = $this.find('.slide_group');
    var $slides = $this.find('.slide');
    var bulletArray = [];
    var currentIndex = 0;
    var timeout;
    
    function move(newIndex) {
      var animateLeft, slideLeft;
      
      advance();
      
      if ($group.is(':animated') || currentIndex === newIndex) {
        return;
      }
      
      bulletArray[currentIndex].removeClass('active');
      bulletArray[newIndex].addClass('active');
      
      if (newIndex > currentIndex) {
        slideLeft = '100%';
        animateLeft = '-100%';
      } else {
        slideLeft = '-100%';
        animateLeft = '100%';
      }
      
      $slides.eq(newIndex).css({
        display: 'block',
        left: slideLeft
      });
      $group.animate({
        left: animateLeft
      }, function() {
        $slides.eq(currentIndex).css({
          display: 'none'
        });
        $slides.eq(newIndex).css({
          left: 0
        });
        $group.css({
          left: 0
        });
        currentIndex = newIndex;
      });
    }
    
    function advance() {
      clearTimeout(timeout);
      timeout = setTimeout(function() {
        if (currentIndex < ($slides.length - 1)) {
          move(currentIndex + 1);
        } else {
          move(0);
        }
      }, 4000);
    }
    
    $('.next_btn').on('click', function() {
      if (currentIndex < ($slides.length - 1)) {
        move(currentIndex + 1);
      } else {
        move(0);
      }
    });
    
    $('.previous_btn').on('click', function() {
      if (currentIndex !== 0) {
        move(currentIndex - 1);
      } else {
        move(3);
      }
    });
    
    $.each($slides, function(index) {
      var $button = $('<a class="slide_btn">&bull;</a>');
      
      if (index === currentIndex) {
        $button.addClass('active');
      }
      $button.on('click', function() {
        move(index);
      }).appendTo('.slide_buttons');
      bulletArray.push($button);
    });
    
    advance();
  });
              </script>
             
            <!-- ******************* ABout us************************** -->
            <section id="about">
                <div class="container">
                    <div class="row">
                        <div class="column-66">
                            <h1 class="xlarge-font">
                                <b>About US</b>
                            </h1>
                            <h1 class="large-font" style="color:#ef7828;">
                                <b>Why Purchase Our Products?</b>
                            </h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quam id quibusdam distinctio commodi tempore mollitia asperiores a architecto aliquid dolores, harum eveniet veritatis quia, magni suscipit eum corporis quod?</p>
                        </div>
                        <div class="column-33">
                            <img src="media/pexels-cottonbro-4753891.jpg" width="300" height="500">
                        </div>
                    </div>
                </div>
                <div id="cu" class="container">
                    <div class="row">
                        <div class="column-33">
                            <img src="media/pexels-tima-miroshnichenko-6389075.jpg" width="300" height="500">
                        </div>
                        <div class="column-66">
                            <h1 class="xlarge-font">
                                <b>Clarity</b>
                            </h1>
                            <h1 class="large-font" style="color:#ef7828;">
                                <b>How Can You Contact Us?</b>
                            </h1>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, voluptatum modi corrupti non nemo error? Ducimus, doloribus natus! Delectus alias earum sit sint iusto laudantium accusantium repellendus non, dolor iste.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container1">
            <div class="fetaured">
                <h2>
                    Featured Products
                </h2>
                <h5 style="margin-bottom: 40px ;">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
                <a href="shop/shop.php">See More</a>
            </div>
        </div>
        <script>
        $(document).ready(function() {
       $(".menu-icon").on("click", function() {
             $("nav ul").toggleClass("showing");
       });
 });
 // Scrolling Effect
 $(window).on("scroll", function() {
       if($(window).scrollTop()) {
             $('nav').addClass('black');
       }
       else {
             $('nav').removeClass('black');
       }
 })
        </script>
        <!-- foooter -->
        <footer class=" text-center text-white" style="background-color: rgb(26, 26, 26) ;">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Form -->
                <section class="">
                    <form action="">
                        <!--Grid row-->
                        <div class="row d-flex justify-content-center">
                            <!--Grid column-->
                            <div class="col-auto">
                                <p class="pt-2">
                                    <strong>Sign up for our newsletter</strong>
                                </p>
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-5 col-12">
                                <!-- Email input -->
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="form5Example29" class="form-control">
                                    <label class="form-label" for="form5Example29">Email address</label>
                                </div>
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-auto">
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-light mb-4">
                                    Subscribe
                                </button>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </form>
                </section>
                <!-- Section: Form -->
            </div>
            <!-- Grid container -->
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(70, 70, 70, 0.907);">
                © 2022 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">FocusZone.com</a>
            </div>
            <!-- Copyright -->
        </footer>

    </body>
</html>
