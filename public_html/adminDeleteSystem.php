<?php
    session_start();
    include("connection.php");
    include("functions.php");

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
    <title>Delete System</title>
    <link rel="stylesheet" href="CSS/style_deleteSystem.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="CSS/images/favicon.cc"/></i>
</head>
<body>
<nav class="navbar-custom navbar navbar-expand-md navbar-dark sticky-top" id="navig">
           <div class="container-fluid">
           <a class="navbar-brand" href="Admin.php"><img id="logo" src="CSS/images/LogoW.png"></a> 
               <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive">
                   <span class="navbar-toggler-icon"></span>
               </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Food Menu</a>
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


    <div class="container-fluid cont">
        <div class="row">
            <div class="col-md-6">
                <h1 style="text-align: center; margin-top:5px;">User Search</h1>
                <?php getUsers($con)?>
                <h1 style="text-align: center; margin-top:5px;">Reservations</h1>
                <?php @refreshReservations($con) ?>
            </div>
            <div class="col-md-6">
                <h1 style="text-align: center;margin-top:5px;">All Comments</h1>
                <?php @getAllCommentsAdmin($con)?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>