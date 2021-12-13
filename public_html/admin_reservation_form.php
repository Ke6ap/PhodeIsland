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

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //SOMETHING WAS POSTED

        $email = $user_data['email'];
		$id = $user_data['user_id'];
        $date = $_POST['date'];
        $hour = $_POST['hours'];
        $phone = $_POST['phone'];
        $lastname = $_POST['lastname'];
        $people = $_POST['people'];

        $query = "INSERT INTO reservations (user_id,email,date,hour,phone,people,name) VALUES 
            ('$id','$email','$date','$hour','$phone','$people','$lastname')";
        mysqli_query($con,$query);

        //o admin mporei na kanei krathsh opote thelei

        header("Location: Admin.php");
        die;

    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reservation Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/x-icon" href="CSS/images/favicon.cc"/></i>
        <link rel="stylesheet" href="CSS/style_reservation_form.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>

    <body>
        <section class = "banner">
            <div class="return">
                  <a href="Admin.php"><button>Home</button></a>
            </div>
            <h2>BOOK YOUR TABLE</h2>
            <div class = "card-container">
                <div class = "card-img">
                </div>

                <div class = "card-content">
                    <h3>Reservation</h3>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class = "form-row">
                            <input type="date" name = "date" id="dateControl" min="<?php echo date("Y-m-d");?>" required>

                            <select style="border: 1px solid black"  name = "hours">
                                <option value = "14">18:00</option>
                                <option value = "19">19:00</option>
                                <option value = "20">20:00</option>
                                <option value = "21">21:00</option>
                                <option value = "22">22:00</option>
                            </select>
                        </div>

                        <div class = "form-row">
                            <input type = "text" name="lastname" placeholder="Last Name" maxlength="20" required>
                            <input type = "text" name="phone" pattern="^69[0-9]{8}" placeholder="Phone Number"
                             title="69+" required>
                        </div>

                        <div class = "form-row">
                            <input type = "number" name="people" placeholder="How many people" min = "1" max="10" required>
                            <input type = "submit" value = "Book">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <script src="datefunction.js"></script>
    </body>
</html>