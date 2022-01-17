<?php

    //ayta einai gia to xampp

    // $dbhost = "localhost";

    // $dbuser = "root";

    // $dbpass = "";

    // $dbname = "www1";



    // if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){

    //     die("failed to connect to server");

    // }



	$servername = "localhost";

	$username = "Username";

	$password = "Password";

	$database = "Database";



	if(!$con = mysqli_connect($servername,$username,$password,$database)){

        die("failed to connect to server");

    }

    