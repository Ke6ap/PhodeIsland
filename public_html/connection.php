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
	$username = "id16248014_phodeisland";
	$password = "Restaurant123456!!";
	$database = "id16248014_www_project";

	if(!$con = mysqli_connect($servername,$username,$password,$database)){
        die("failed to connect to server");
    }
    