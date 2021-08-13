<?php
include('database_connection.php');
// assign values
$category = $_POST['category'];
$days = [];
if(isset($_POST['days']))
{
	foreach($_POST['days'] as $day)
		$days[] = $day;
}
// let array become string
$totalDays = implode(" " , $days);

$timestart = $_POST['timestart'];
$timeend = $_POST['timeend'];
$price = $_POST['price'];
$venue = $_POST['venue'];
$contactnumber = $_POST['contactnumber'];
$contactperson = $_POST['contactperson'];
$timetableId = $_POST['timetableId'];

$sql = "update admin_timetable set category = '$category' , price = '$price' , venue = '$venue' , 
        contactNumber = '$contactnumber', days = '$totalDays' , timeStart = '$timestart' , timeEnd = '$timeend',
        contactPerson = '$contactperson' where timetableId = '$timetableId'";

if(mysqli_query($conn, $sql)){
	echo "<script>
	alert('Timetable edit successfully');
	window.location.href='https://localhost/Assignment/Admin/admin_viewtimetable.php';
	</script>";
} else{
	echo "ERROR: Hush! Sorry $sql. "
		. mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>