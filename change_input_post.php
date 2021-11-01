<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Course Application Change Form post</title>
</head>

<body style="background-color:ivory;">
	<h3 align="center">Course Application Change Form</h3>
	<hr>
<?php
	
	//Link to database coursedb and ready for queries
		include 'opendb.php';
		
	//Process applytbe data
		// Get the query results from database-table coursedb-applytbl by SELECT
			$sql="SELECT * FROM applytbl";
			$result_a=mysqli_query($link, $sql);
		// Store the number of rows in table applytbl to $num_a
			$num_a=mysqli_num_rows($result_a);
			
			
			$applyno = $_POST['applyno'];
			$email = $_POST['email'];
			$tel = $_POST['tel'];

			$sql_a = "UPDATE applytbl SET email='$email', tel='$tel' WHERE applyno=$applyno";	// Update email, tel of applyno "$applyno" into applytbl
			
			if ($link->query($sql_a) === TRUE) {
				echo "<br><br><br><center><h2>Record changed successfully!</h2></center><br>";
			} else {
				echo "Error updating record: " . $link->error;
			}
?>

	<!--Display further links-->	
	<center>
		<p>Click for the <a href="course.php">Course Information</a>.</p>
		<p>Click for the <a href="apply.php">Course Application Form</a>.</p>
		<p>Click for the particulars <a href="change.php">change Form</a>.</p>
		<p>Click for the <a href="private/quotalist.php">quota list of courses</a> (Authorized Users Only)</p>
	</center>
	
</body>
</html>