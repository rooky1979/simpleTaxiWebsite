//Matthew Rook ID: 18007407
//JS file to handle server requests for the admin component

//make a request to the server to search for the data admin.php file (datasource)
function searchData(dataSource, divID, bsearch,) {
	var xhr = createRequest();
	if (xhr) {
		var place = document.getElementById(divID);
		var url = dataSource + "?bsearch=" + bsearch;
		xhr.open("GET", url, true);
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				place.innerHTML = xhr.responseText;
			}
		}
		xhr.send(null);
	}
}
//make a request to the server to change the status of the taxi booking
function assignTaxi(dataSource, divID, refno,) {
	var xhr = createRequest();
	console.log(refno);
	if (xhr) {
		var place = document.getElementById(divID);
		var url = dataSource + "?refno=" + refno;
		xhr.open("GET", url, true);
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				place.innerHTML = xhr.responseText;
			}
		}
		xhr.send(null);
	}
}
