//Matthew Rook ID: 18007407
//JS file to handle server requests for the booking component

//method to return the date and time for the date/time fields
function getDateTime() {
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();
	var dateString = (day <= 9 ? '0' + day : day) + '/' + (month <= 9 ? '0' + month : month) + '/' + year;
	document.getElementById('date').value = dateString;
	var hour = date.getHours();
	var minute = date.getMinutes();
	var timeString = (hour <= 9 ? '0' + hour : hour) + ':' + (minute <= 9 ? '0' + minute : minute);
	document.getElementById('time').value = timeString;
}
//validates the input to ensure the required fields are not empty
function validateInput(dataSource, divID, cname, phone, unumber,
	snumber, stname, sbname, dsbname, date, time){

		if (cname == "") {
			alert("Name is required");
			return false;
		  }else if(phone == ""){
			alert("Phone number is required");
			return false;
		  }else if(snumber == ""){
			alert("Street number is required");
			return false;
		  }else if(stname == ""){
			alert("Street name is required");
			return false;
		  }else if(date == ""){
			alert("Pickup date is required");
			return false;
		  }else if(time == ""){
			alert("Pickup time is required");
			return false;
		  }else{//if all required fields are not null, then the get data method is called
			  getData(dataSource, divID, cname, phone, unumber,
				snumber, stname, sbname, dsbname, date, time);
		  }
}
//get the data and process with the booking.php file (datasource)
function getData(dataSource, divID, cname, phone, unumber,
	snumber, stname, sbname, dsbname, date, time) {
	var xhr = createRequest();
	  if (xhr) {
		var place = document.getElementById(divID);
		var url = dataSource + "?cname=" + cname + "&phone=" + phone + "&unumber=" + unumber
			+ "&snumber=" + snumber + "&stname=" + stname + "&sbname=" + sbname + "&dsbname=" + dsbname + "&date=" + date + "&time=" + time;
		xhr.open("GET", url, true);
		xhr.onreadystatechange = function () {
			//alert(xhr.readyState);
			if (xhr.readyState == 4 && xhr.status == 200) {
				place.innerHTML = xhr.responseText;
			}
		}
		xhr.send(null);
	}
}
