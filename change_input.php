<!DOCTYPE html>
<html>
<!-- html Comments -->

<head>
	<meta charset="UTF-8">
	<title>Course Application Change Form handling</title>
</head>

<body style="background-color:ivory;">
	<h3 align="center">Course Application Change Form</h3>
	<hr>

<?php
	
	include 'opendb.php';
	
	
	//Process applytbl data

	// Get the query results from database-table coursedb-applytbl by SELECT
	$sql="SELECT * FROM applytbl";
	$result_a=mysqli_query($link, $sql);
	// Store the number of rows in table applytbl to $num_a
	$num_a=mysqli_num_rows($result_a);
	
	// Store applytbl/applyno + hkid values from table to variable $applyno_a + $hkid_a array, 
	$i=0;
	if ($num_a > 0) {
		while($row = mysqli_fetch_array($result_a)) {
			$applyno_a[$i]=$row["applyno"];
			$hkid_a[$i]=$row["hkid"];
			$i++;
		}
	} else {
		echo "0 results";
	}
	
	$applyno = $_POST['applyno'];	
	$hkid = $_POST['hkid'];
	
	$change_avail=0;
	for ($i = 0; $i < $num_a; $i++) {
		if ($applyno == $applyno_a[$i] && $hkid == $hkid_a[$i]) {		// Check if applyno and hkid match
			$change_avail=1;
		}
	}
	
	if($change_avail == 0){
		echo "<center><h2><br><br>Your registration record is not found!<br>
		Please double check your Application number and HKID!</center></h2><br>";
	} else {
		include 'change_input_info.php';		// should change to the conition to enter the next page
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

