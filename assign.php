<?php
	//Php file used to find out if a customer requires a pickup within the next 2 hours.
	$date = $_POST['date'];
	date_default_timezone_set("Pacific/Auckland");
	$date = date('Y-m-d H:i:s');
	$newdate = date("Y-m-d H:i:s", strtotime('+2 hours'));
	
	include('database.php');
	$query = "Select BookingNum, CustName, CustPhone, CustAddress, BookingDestination, BookingPickupDate From cabsOnline Where BookingStatus = 'unassigned' AND BookingPickupDate BETWEEN '$date' AND '$newdate'";
	$result =@mysqli_query($link, $query) or die ("Error, Database query failed.<br>".mysqli_error($link));
	$countofRows =@mysqli_num_rows($result);
	
	

	//creats the table to display the out put of our query
	if($countofRows === 0) {
		$msg = "No matching results";
	} else {
		$msg = "<table border='1' style='text-align:center;'>
			<thead>
				<tr style ='color: white;'>
					<th>
						Booking Number
					</th>
					<th>
						Customer Name
					</th>
					<th>
						Customer Phone
					</th>
					<th>
						Pick Up Address
					</th>
					<th>
						Destination
					</th>
					<th>
						Pick Up Date
					</th>
				</tr>
			</thead>

			<tbody>";

			if($result)	{
				while($row = mysqli_fetch_array($result))	{
						$msg = $msg . "<tr>";
							for($i = 0; $i < 6; $i++)	{
								$msg = $msg . "<td style='max-width: 300px; word-wrap: break-word; color: white; text-align:center;'>";
								$msg = $msg . "<p>".$row[$i]."</p>";
										
							}
						$msg = $msg . "</td>";	
						$msg = $msg . "</tr>";
					}
					mysqli_free_result($result);
				}
					mysqli_close($link);
			$msg = $msg . "</tbody>
		                   </table>";
	}
	echo $msg;
?>