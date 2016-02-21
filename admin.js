// file admin.js
// using POST method
var xhr = createRequest();
function booking(dataSource, divID, request) {
	if(xhr) {
		var obj = document.getElementById(divID);
		// Send data manage.php file using POST method
		var requestbody ="BookingNum="+encodeURIComponent(request);
 		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		// Response on ready state
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) { 
				obj.innerHTML = "<span style='color:white'>" + xhr.responseText + "</span>";
			} // end if
		} // end anonymous call-back function
 		xhr.send(requestbody);
	} // end if
} // end function

function assign(dataSource, divID, date) {
	if(xhr) {
		var obj = document.getElementById(divID);
		// Send data manage.php file using POST method
		var requestbody ="date="+encodeURIComponent(date);
 		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		// Response on ready state
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) { 
				obj.innerHTML = "<span style='color:white'>" + xhr.responseText + "</span>";
			} // end if
		} // end anonymous call-back function
 		xhr.send(requestbody);
	} // end if
}