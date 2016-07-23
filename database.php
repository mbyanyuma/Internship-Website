<?php
	$server      = ''; 		// host name
	$db_user     = ''; 		// DB user
	$db_password = ''; 	// DB password
	$db_name     = '';		// DB Name
	$con = mysqli_connect($server,$db_user,$db_password,$db_name);
 
	// Check connection
	if (mysqli_connect_errno()){
  		echo "Failed to connect to database: " . mysqli_connect_error();
  	}
?>