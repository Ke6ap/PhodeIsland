<?php
    session_start();
    include("connection.php");
    include("functions.php");
    date_default_timezone_set('Europe/Athens');

    $user_data = check_login($con);

    //Check for administator
    $Administrator = check_Admin($user_data['type']);
    if($Administrator == 1){
        $_SESSION;
    }else{
        header("Location:logout.php");
        die;
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Phode Island</title>
    <link rel="stylesheet" href="CSS/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="CSS/images/favicon.cc"/></i>
  </head>
    <body>
       <!-- Nav Bar -->
       <nav class="navbar-custom navbar navbar-expand-md navbar-dark sticky-top" id="navig">
           <div class="container-fluid">
           <a class="navbar-brand" href="Admin.php"><img id="logo" src="CSS/images/LogoW.png"></a> 
               <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive">
                   <span class="navbar-toggler-icon"></span>
               </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="Admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminmenu.php">Food Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="admin_reservation_form.php">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                 </ul>
              </div>
           </div>
       </nav>

       <div class="main-image">
           <div class="banner-container">
               <h1>
                   <span>Phode Island</span>
               </h1>
               <span class="cen">A journey to flavor <strong>. . .</strong></span>
               <a class="button" href="admin_reservation_form.php">Reservation</a>
           </div>
       </div>

        <!-- Filosophy -->
        <div id="philosophy" class="container-fluid padding" style="margin-top: 20px;">
            <div class="row padding">
                <div class="col-md-12 col-lg-6" style="text-align: center;">
                <!-- https://www.sphinxwinerestaurant.com/our-philosophy/ -->
                    <h2 class="Section-names">Our Philosophy</h2>
                    <p>
                        Our philosophy is based on sustainability. <br>
                        Not only on the wine and food we serve, but also up on the respect to the Ministry of Culture protected building, reconstructed upon techniques of the original 17th century’s ones.
                    </p>
                    <p>
                        The menu’s main ingredients are chosen from local and Greek producers, while specially cured meat is imported from double-checked farms worldwide.
                        Olives, Olive oil, Fava beans, Grapes, Honey and Herbs are cultivated at the restaurant’s own biodynamic farm.
                    </p>
                    <p>
                        Our cooking marries traditional and contemporary techniques, giving the essence of today to tastes of the past.
                        Wines are carefully selected to bring out the flavours of the dishes. 
                    </p>
                </div>
                <div class="col-lg-6">
                    <img style="border-radius: 5px;" src="CSS/images/other/service.jpg" class="img-fluid" alt="error">
                </div>
            </div>
        </div>

        <!-- Menu -->
        <div class="container-fluid padding" id="menu" style="margin-top: 10px;">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="Section-names display 3">Menu</h1>
                </div>
                <hr>
            </div>
        </div>
        <div class="container-fluid padding" id="menu-items">
            <div class="row padding">
                <div class="col-md-4">
                    <div class="food-card card">
                        <img class="card-img-top" src="CSS/images/other/salad.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Salads</h4>
                            <p class="card-text">Our salads are great</p>
                            <a href="menu.html #salad" class="btn btn-outline-secondary">See All</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="food-card card">
                        <img class="card-img-top" src="CSS/images/other/grill.jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Grill</h4>
                            <p class="card-text">Our grill is great</p>
                            <a href="menu.html #steak" class="btn btn-outline-secondary">See All</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="food-card card">
                        <img class="card-img-top" src="CSS/images/other/sea-food.jpg" alt="error">
                        <div class="card-body">
                            <h4 class="card-title">Sea Food</h4>
                            <p class="card-text">Our sea food is great</p>
                            <a href="menu.html #seaF" class="btn btn-outline-secondary ">See All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- information -->
         <div class="container-fluid padding" id="info" style="text-align:center;margin-top: 20px;">
            <div class="row padding">
                <div class="col-lg-6">
                    <img style="border-radius: 5px;" src="CSS/images/other/restaurant.jpg" class="img-fluid" alt="error">
                </div>
                <div class="col-md-12 col-lg-6">
                    <h2 class="Section-names">About Us</h2>
                    <p>We are a local restaurant located in Greece, Lamia since 1999 and gradualy opening in other areas as well.</p>
                    <p>With our traditional coocking methods and carefuly chosen ingredients have managed to accumulate a number of awards that
                        show the constant will and effort we give to improve and above all please our customers.
                    </p>
                </div>
            </div>
        </div>

        <!-- comment section -->
        <?php
        echo"<div class='container-fluid padding' style='margin-top=20px;'>
            <h1 class='Section-names' style='text-align: center;'>Leave a Comment</h1>
            <div class='row'>
                <form method='POST' action='".setComment($con,$user_data)."' class='col-lg-6 col-md-5'>
                    <h3 style='margin-top: 10%;'>Name</h3>
                    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                    <input style='border: 0;border-left:3px solid #733405;heigh:80px;' type='text' name='name' class='form-control'
                        placeholder='Enter your name (Optional)'>
                    <h3 style='margin-top:10px;'>Comment</h3>
                    <textarea style='border: 0;border-left:3px solid #733405;height: 80px;resize: none;'
                        class='form-control' name='comment' rows='5' minlength='10' maxlength='150' placeholder='Leave your comment' required></textarea>
                    <button style='margin: 10px 0px; background:#733405; color:#fff; transition:.4s;' class='button btn btn-block' name='commentSubmit'>Submit</button>
                    <a href='adminDeleteSystem.php' style='color:black;'>Go to Admin Delete System</a>
                </form>
                <div class='comment-image col-lg-6 col-md-7'>
                        <img class='img-fluid' style='border-radius: 5px;' src='CSS/images/Login/banner2.jpg'  alt='error'>
                </div>
            </div>
            </div>
        ";?>

        <footer class="container-fluid padding" style="margin-top: 20px;">
            <div class="row text-center">
              <div class="col-md-4">
                <hr class="light">
                <h3>Info</h3>
                <hr class="light">
                <p>6978015553</p>
                <p>restaurant.kindofa.bot@gmail.com</p>
                <p>Ipsiladou 10-14, Lamia 35100</p>
              </div>
              <div class="col-md-4">
                <hr class="light">
                <h3>Hours</h3>
                <hr class="light">
                <p>Monday   12am-12pm</p>
                <p>Wednesday 12am-12pm</p>
                <p>Friday-Sunday   9am-1am</p>
              </div>
              <div class="col-md-4">
                <hr class="light">
                <h3>Follow Us</h3>
                <hr class="light">
                <div class="social-icons-wrapper row text-center ">
                    <div class="social">
                        <a href="#"><i class="fa fa-facebook"></i> </a>
                        <a href="#"><i class="fa fa-instagram"></i> </a>
                        <a href="#"><i class="fa fa-youtube"></i> </a>
                    </div>
                </div>
              </div>
          </div>
        </footer>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>