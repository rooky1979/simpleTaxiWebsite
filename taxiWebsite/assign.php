<!--Matthew Rook ID: 18007407
	booking.php for server side to retrieve the bookings from the DB-->
    <?php
//get the details from the admin.html
$bsearch = $_GET['bsearch'];

//reference number passsed in from the assign button
$updaterefno = $_GET['refno'];

//variables 
$cname = "";
$phone = "";
$sbname = "";
$dsbname = "";
$date = "";
$time = "";
$status = "";
//current date and time for the search query
$currentdate = date("d/m/Y");
$currenttime = date("H:i");
//current time plus 2 hours for the search query
$timestamp = strtotime(date('H:i')) + 60 * 60 * 2;
$plustwohours = date('H:i', $timestamp);

//db details
$host = "cmslamp14.aut.ac.nz";
$user = "pwm1057";
$pswd = "Rooted12";
$dbname = "pwm1057";
//connect to the db
$conn = mysqli_connect(
	$host,
	$user,
	$pswd,
	$dbname
) or die("<p class=\"text-1\">Unable to connect to the database server.</p>"
	. "<p class=\"text-1\">Error code " . mysqli_connect_errno()
	. ": " . mysqli_connect_error() . "</p>");

//query to update the unassigned field in the db
if ($updaterefno != "") {
	$query = "UPDATE `taxiBookings` SET status = 'assigned' WHERE reference_id = '$updaterefno'";
	$result = mysqli_query($conn, $query);
	echo "<p>$updaterefno has been assigned</p>";

    
}else{
    echo "<p>Reference number not available</p>";
}
/* if ($bsearch == "") {
	//query to select all unassigned bookings if the pickup date equals todays date and the time is between the current time and 2 hours ahead
	$query = "SELECT * FROM taxiBookings WHERE status LIKE 'unassigned' AND
		pick_up_date = '$currentdate' AND pick_up_time BETWEEN '$currenttime' AND '$plustwohours'";
} else {
	$query = "SELECT * FROM taxiBookings WHERE reference_id LIKE '$bsearch'";
}

$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

//if no results found, display the error message
if ($count == 0) {

	echo "<p>There are no results that match that search</p>";
	//else create the table
} else {
	echo "<table>";
	//table headings
	echo "<tr><th>Reference No</th>
		<th>Customer Name</th>
		<th>Phone</th>
		<th>Pickup Suburb</th>
		<th>Destination Suburb</th>
		<th>Pickup Date</th>
		<th>Pickup Time</th>
		 <th>Status</th>
		<th>Assign Taxi</th></tr>";
	while ($row = mysqli_fetch_array($result)) {
		//while loop to loop through all the information and populate the table
		$refno = $row['reference_id'];
		$cname = $row['cust_name'];
		$phone = $row['phone'];
		$sbname = $row['suburb'];
		$dsbname = $row['dest_suburb'];
		$date = $row['pick_up_date'];
		$time = $row['pick_up_time'];
		$status = $row['status'];
		//if the dest and pickup suburbs are empty, state 'unknown'
		if ($row['suburb'] == NULL) {
			$sbname = 'Unknown';
		}
		if ($row['dest_suburb'] == NULL) {
			$dsbname = 'Unknown';
		}
		echo "<tr><td>$refno</td>
				  <td>$cname</td>
				  <td>$phone</td>
				  <td>$sbname</td>
				  <td>$dsbname</td>
				  <td>$date</td>
				  <td>$time</td>
				  <td>$status</td>
				  <td><input name=\"abutton\" type=\"button\" onClick=\"assignTaxi('assign.php', 'targetDiv', $refno)\" value=\"Assign\"></td></tr>";
	}
	echo "</table>";
} */
?>