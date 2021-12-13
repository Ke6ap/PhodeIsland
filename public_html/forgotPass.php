<?php
    include("connection.php");
    include("functions.php");

    $error = '';

   if($_SERVER['REQUEST_METHOD'] == "POST"){
    //SOMETHING WAS POSTED
    $email = $_POST['email'];

    if(!empty($email)){
        //read from db
        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($con,$query);
        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                $realPass = md5($user_data['password']);
                header("Location: login.php");
                //steloume to email me ton kvdiko

            }
        }
        $error = '*Not correct email';
    }else{
        $error = '*Please eneter and email';
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="CSS/style_Forgotpass.css">
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
					<h1><strong>Enter you email account to send your password</strong></h1>
					<div class="mb-3">
					  <label for="InputEmail" class="form-label" ><strong>Email address</strong></label>
					  <input type="email" name="email" placeholder="Email" class="form-control" id="InputEmail">
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