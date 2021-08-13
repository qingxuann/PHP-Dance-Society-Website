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
$totalDays = implode(" " , $days);

$timestart = $_POST['timestart'];
$timeend = $_POST['timeend'];
$price = $_POST['price'];
$venue = $_POST['venue'];
$contactnumber = $_POST['contactnumber'];
$contactperson = $_POST['contactperson'];

$sql = "INSERT INTO admin_timetable 
	(category , days , timeStart , timeEnd , price , venue , contactNumber , contactPerson)
	VALUES
    ('$category', '$totalDays', '$timestart', 
     '$timeend', '$price', '$venue', 
     '$contactnumber', '$contactperson')";
 
 if(mysqli_query($conn, $sql)){
	echo "<script>
	alert('Timetable added successfully');
	window.location.href='https://localhost/Assignment/Admin/admin_viewtimetable.php';
	</script>";

	
} else{
	echo "ERROR: Hush! Sorry $sql. "
		. mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>