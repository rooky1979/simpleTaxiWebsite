<!--Matthew Rook ID: 18007407
	booking.php for server side to generate the booking and insert it into the sql table-->
<?php
//get the details from the booking.html
$cname = $_GET['cname'];
$phone = $_GET['phone'];
$unumber = $_GET['unumber'];
$snumber = $_GET['snumber'];
$stname = $_GET['stname'];
$sbname = $_GET['sbname'];
$dsbname = $_GET['dsbname'];
$date = $_GET['date'];
$time = $_GET['time'];
$host = "cmslamp14.aut.ac.nz";
$user = "pwm1057";
$pswd = "";
$dbname = "pwm1057";

//connect to the db and check if a connection is made
$conn = mysqli_connect(
	$host,
	$user,
	$pswd,
	$dbname
) or die("<p class=\"text-1\">Unable to connect to the database server.</p>"
	. "<p class=\"text-1\">Error code " . mysqli_connect_errno()
	. ": " . mysqli_connect_error() . "</p>");
	//insert the values into the table
$query = "INSERT INTO taxiBookings(cust_name, phone, unit_no, 
street_no, street_name, suburb, dest_suburb, pick_up_date, pick_up_time, 
status)" 
."VALUES ('$cname', '$phone', '$unumber', '$snumber', '$stname', '$sbname', '$dsbname',
'$date', '$time','unassigned')";

$result = mysqli_query($conn, $query);
$last_id = mysqli_insert_id($conn);
// if successful, the confirmation message is displayed
if ($result) {
	echo "<p>Thank you! Your booking reference number is Ref No: <strong>$last_id</strong></p>
	<p>You will be picked up in front of your provided address at <strong>$time</strong> on <strong>$date</strong></p><br>";
} else {
	echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>