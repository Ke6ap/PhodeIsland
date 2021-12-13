<?php
    session_start();
    include("connection.php");
    include("functions.php");

    $error = '';

   if($_SERVER['REQUEST_METHOD'] == "POST"){
    //SOMETHING WAS POSTED
    $email = $_POST['email'];
	$password = $_POST['password'];
	//hash
	$unhashedPass = md5($password);
    $regex = '/^([a-zA-Z0-9#.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';

    if(!empty($email) && !empty($password) && preg_match($regex,$email)){
        //read from db
        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($con,$query);
        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $unhashedPass){

                	if ($user_data['type'] === "Admin") {
                		$_SESSION['user_id'] = $user_data['user_id'];
                    	header("Location: Admin.php");
                    	die;
                	}

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        $error = '*Not correct Email or Password';
    }else{
        $error = '*Not correct Email or Password';
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/login_form_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="CSS/images/favicon.cc"/></i>
</head>
<body>

	<div class="container-fluid background_banner">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xm-12"></div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<!-- form -->
				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-container">
					<h1><strong>Login</strong></h1>
					<div class="mb-3">
					  <label for="InputEmail" class="form-label" ><strong>Email address</strong></label>
					  <input type="email" name="email" placeholder="Email" class="form-control" id="InputEmail">
					</div>
					<div class="mb-3">
					  <label for="InputPassword" class="form-label"><strong>Password</strong></label>
					  <input type="password" name="password" placeholder="Password" class="form-control" id="InputPassword">
					</div>

					<div class="row">
						<div class="col-md-6 col-xs-5">
							<!-- <a href="signup.php" ><strong><h6 class="Tag">Register</h6></strong></a> -->
							<h6 class="t"><a href="signup.php" >Register</a></h6>
							<h6 class="t"><a href="guest.html">Guest</a></h6>
							<h6 class="t"><a href="forgotPass.php" >Forgot Password</a></h6>

							<!-- <a href="forgotPass.php"><strong><h6 class="Tag">Forgot Password</h6></a> -->
							<!-- <a href="guest.html"><strong><h6 class="Tag">Guest</h6><strong></a> -->
						</div>
						<!-- <div class="col-md-6 col-xs-5">
							<a href="guest.html" style="text-align: right;"><strong><h6>Guest</h6><strong></a>
						</div> -->
					</div>
					<p class="text-danger ">
					<?php echo $error; ?>
					</p>
					<button type="submit" name="login" id="button-" class="btn btn-primary btn-block">Submit</button>
				</form>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xm-12"></div>
	</div>

</body>
</html>