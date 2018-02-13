<?php

	$host = "localhost"; //Hostname
	$user = "root"; //username
	$pass = ""; //password
	$db = "algo"; //DB Name

	$conn = mysqli_connect( $host , $user , $pass , $db );
	header("Content-Type: text/html;charset=UTF-8");
	mysqli_set_charset($conn,"utf8");

 