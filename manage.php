<?php
	//php file used to compare booking numbers and set the booking to assigned.
	$num = $_POST['BookingNum'];
	include('database.php');
	$msg = "";
	$query = "SELECT * FROM cabsOnline WHERE BookingNum = '$num'";
	$queryinSearch =@mysqli_query($link, $query) or die ("Error, Database query failed.<br>".mysqli_error($link));
	$countofRows =@mysqli_num_rows($queryinSearch);
	if($countofRows > 0) {
		$query = "SELECT * FROM cabsOnline WHERE BookingNum = '$num' AND BookingStatus = 'assigned'";
		$queryinSearch =@mysqli_query($link, $query) or die ("Error, Database query failed.<br>".mysqli_error($link));
		$countofRows =@mysqli_num_rows($queryinSearch);
		if($countofRows > 0) {
			$msg = "A taxi has already been assigned.";
		} else {
			$query = "UPDATE cabsOnline SET BookingStatus = 'assigned' WHERE BookingNum = $num";
			$queryinSearch =@mysqli_query($link, $query) or die ("Error, Database query failed.<br>".mysqli_error($link));
		
			$msg = "The booking request $num has been properly assigned!";
		}
	} else {
		$msg = "Incorrect booking Number";
	}
	ECHO $msg;
?>