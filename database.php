<?php
    // Link and select the Cab Online database
	$link = mysqli_connect ("cmslamp14.aut.ac.nz", "sbz3371", "Shc44037");
	$db_selected = mysqli_select_db($link, "sbz3371");
	
	// Create the database table if it does not exist
	$sql = "CREATE TABLE IF NOT EXISTS cabsOnline
	(
		BookingNum INT NOT NULL,
		BookingDate DateTime NOT NULL,
		BookingStatus VARCHAR(50) NOT NULL,
		CustName VARCHAR(50) NOT NULL,
		CustPhone INT(15) NOT NULL,
		CustAddress VARCHAR(255) NOT NULL,
		BookingPickupDate DateTime NOT NULL,
		BookingDestination VARCHAR(255) NOT NULL,
		PRIMARY KEY(BookingNumber)
	)";

	echo mysqli_error($link)."<br>";
	mysqli_query($link, $sql);
?>