<?php

#Programmer: Moses Byanyuma

	//require_once('includes/database.php');
    require('./database.php');

	$stmt = mysqli_prepare($con, "SELECT (timestamp * 1000) as time, temp as temperature FROM measurements ORDER BY time ASC");
    
	//$result = array('time' -> array(), 'temperature' -> array());
	if ($stmt) {
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $time, $temperature);
	    while (mysqli_stmt_fetch($stmt)) {
	       echo '['.$row["time"].',' .$row["temperature"].']';
            $count++;
            if ($count<"20"){
            echo ',';
            }      
            }
            echo ']';
            }
            else {
            echo "[[],[]]";
	    }
	    mysqli_stmt_close($stmt);
    }
 
?>