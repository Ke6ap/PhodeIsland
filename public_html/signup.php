<?php
    session_start();
    require_once("connection.php");
    include("functions.php");

    $error = '';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //SOMETHING WAS POSTED
        $regex = '/^([a-zA-Z0-9#.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
        $passwordRegex = '/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        $email = $_POST['email'];
		$password = $_POST['password'];
		$passmatch = $_POST['passwordMatch'];

		//hash
		$hashedPass = md5($password);
        $type = "Registerd";

		if($password != $passmatch){
			$error = "The passwords do not match";
		}else if(preg_match($passwordRegex,$password) && preg_match($regex,$email) && !empty($email) && !empty($password)){

        	$dupCheck = "SELECT email FROM users WHERE email = '$email'";
        	$result = mysqli_query($con,$dupCheck);

            //save to db
            if(mysqli_num_rows($result) < 1){
            	$user_id = random_num(20);
            	$query = "INSERT INTO users (user_id,email,password,type) VALUES ('$user_id','$email','$hashedPass','$type')";
            	if(!mysqli_query($con,$query)){
            	    echo "Problem with your request";
            	}
            	header("Location: login.php");
            	die;
            }else{
            	$error = '*Email already in use';
            }

        }else{
            $error = '*Not valid Email or Password';
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="CSS/signup_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="CSS/images/favicon.cc"/></i>

</head>
<body>

<!-- <?php /* populate($con); */?> -->

<div class="container-fluid background_banner">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xm-12"></div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<!-- form -->
				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-container">
					<h1><strong>Register</strong></h1>
					<div class="mb-3">
					  <label for="InputEmail" class="form-label" ><strong>Email address</strong></label>
					  <input type="email" name="email" placeholder="Email" class="form-control" id="InputEmail">
                    </div>
					<div class="mb-3">
					  <label for="InputPassword" class="form-label"><strong>Password</strong></label>
					  <input type="password" name="password" placeholder="Password (8 chracters and number)" class="form-control" id="InputPassword">
					  <label for="InputPassword" class="form-label"><strong>Confirm Password</strong></label>
					  <input type="password" name="passwordMatch" class="form-control" placeholder="The passwords must match" id="InputConfirmPassword">
					</div>

					<div class="row">
					  <div class="col-md-8">
						  <h6><a href="login.php" >Login</a></h6>
					  </div>
					  <div class="col-md-4">
					        <h6><a href="guest.html" >Guest</a></h6>
					  </div>
					</div>
					<p class="text-danger">
					  	<?php echo $error; ?>
					  </p>
					<button type="submit" name="login" id="button-" class="btn btn-primary btn-block">Submit</button>
				</form>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xm-12"></div>
    </div>
    </body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>