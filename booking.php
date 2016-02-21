<?php
	//variables
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$streetNum = $_POST['streetNum'];
	$address = $_POST['address'];
	$destination = $_POST['destination'];
	sleep(1);

	//check they enter a name with correct characters
	$msg= "";
	if(empty($name) || !preg_match('/[a-zA-Z]/', $name)) {
		$msg = $msg . "Inccorrent name input ";
	}
	//checks number input is only numbers and at least 7 numbers long
	if(empty($phone) || !preg_match('/[0-9]/', $phone) || strlen($phone) < 7 ) {
		$msg = $msg . "Incorrect number input ";
	}
	
	//checks that street number is a number only
	if(empty($streetNum) || !preg_match('/[0-9]/', $streetNum)) {
	$msg = $msg . "Incorrect street number ";
	}
	
	//Checks address doesnt contain the wrong characters
	if(empty($address) || !preg_match('/[a-zA-Z]/', $address)) {
		$msg = $msg . "Incorrect pickup location ";
	}
	
	//checks destination doesn't contain the wrong characters
	if(empty($destination) || !preg_match('/[a-zA-Z]/', $destination)) {
		$msg = $msg . "Enter a valid destination  ";
	}
	// Check user inputs correct date
	date_default_timezone_set("Pacific/Auckland");
	$dateInput = strtotime($date . " " . $time);
	$pickUpTime = date('Y-m-d H:i:s', $dateInput);
	$currentDate = date('Y-m-d H:i:s');
	if(empty($date) || empty($time) || !preg_match('/-[0-9]/', $date) || !preg_match('/:[0-9]/', $time) || $pickUpTime < $currentDate) {
		$msg = $msg . "Incorrect pickup time and date ";
	}


	if(empty($msg)) {
		include('database.php');
		$msg = "Success";

		//create random booking number
		$bookingNum = rand(1000, 9999);
		//create pick up address
		$pickupAddress = $streetNum . " " . $address;
		$query = "SELECT * FROM cabsOnline WHERE BookingNum = '$bookingNum'";
		$queryinSearch =@mysqli_query($link, $query) or die ("Error, Database query failed.<br>".mysqli_error($link));
		$countofRows =@mysqli_num_rows($queryinSearch);
		// Check if booking Number Exists
		while($countofRows > 0) {
			$bookingNum = rand(1000, 9999);
			$queryinSearch =@mysqli_query($link, $query) or die ("Error, Database query failed.<br>".mysqli_error($link));
			$countofRows =@mysqli_num_rows($queryinSearch);
		}
		// insert everything into the table
		$query = "INSERT INTO cabsOnline(BookingNum, BookingDate, BookingStatus, CustName, CustPhone, CustAddress, BookingPickupDate, BookingDestination) VALUES ('$bookingNum','$currentDate', 'unassigned','$name','$phone','$pickupAddress','$pickUpTime', '$destination')";
		$queryinSearch =@mysqli_query($link, $query) or die ("Error, Database query failed.<br>".mysqli_error($link));

		mysqli_close($link);
		$msg = "Thanks! Your booking number is $bookingNum <br> You will be picked up at $time on $date";
		
	}
	echo $msg;
?>
