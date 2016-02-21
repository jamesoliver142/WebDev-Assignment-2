// file booking.js
// using POST method
var xhr = createRequest();
function booking(dataSource, divID, name, phone, date, time, streetNum, address, destination) {
	if(xhr) {
		var obj = document.getElementById(divID);
		// Send data booking.php file using POST method
		var requestbody ="name="+encodeURIComponent(name)+"&phone="+encodeURIComponent(phone)+"&date="+encodeURIComponent(date)+"&time="+encodeURIComponent(time)+"&streetNum="+encodeURIComponent(streetNum)+"&address="+encodeURIComponent(address)+"&destination="+encodeURIComponent(destination);
 		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		// Response on ready state
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) { 
				obj.innerHTML = "<span style='color:white'>" + xhr.responseText + "</span>";
			} 
		} 
 		xhr.send(requestbody);
	} 
} 