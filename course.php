<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Computer Science &amp; Information Technology</title>
</head>

<body style="background-color:ivory;">
	<h3 align="center">Computer Science &amp; Information Technology</center></h3>

<center><h3>
	Course Information for April 2013</h3></center>

<center>
	<table BORDER >
		<tr BGCOLOR="#FFFF64">
			<td><b>Course</b><br>
				<b>Number</b></td>

			<td>
			<center><b>Course Title / Course Information</b></center>
			</td>

			<td><b>Starting</b> <br>
				<b>Date</b></td>

			<td><b>Course</b> <br>
				<b>Fee</b></td>

			<td><b>Status</b></td>
		</tr>


	<?php
		// Link to database coursedb and ready for queries
			include 'opendb.php';
		
		// Get the query results from database-table coursedb-coursetbl by SELECT
			$sql="SELECT * FROM coursetbl";
			$result_c=mysqli_query($link, $sql);
		// Store the number of rows in table coursetbl to $num_c
			$num_c=mysqli_num_rows($result_c);

		//mysqli_close();
	?>		
	
	<!--Display row number only for debugging
		<?php
			print "Number of rows in coursetbl: $num_c<br>";
		?>
	-->

	<!--Rewrite the display portion in MySQLi functions-->	
	<?php
	// Store coursetbl field values to related variable arrays and display
	//	Or, if (mysqli_num_rows($result_c) > 0) {		
		if ($num_c > 0) {
			//Or, if (mysqli_num_rows($result_c) > 0) {		
		while($row = mysqli_fetch_array($result_c)) {
			//Or, while($row = mysqli_fetch_assoc($result_c)) {
				// Display variable arrays in table form
				print '<tr BGCOLOR="#FFFFA0">';
					print "<td>".$row["courseno"]."</td>";
					print "<td>".$row["coursetitle"]."</td>";
					print "<td>".$row["startdate"]."</td>";
					print "<td>".$row["coursefee"]."</td>";
					// Check quota status and store to variable 
					if ( $row["quota"] > $row["quotaused"] ) {
						$status = "OPEN"; 
						}
						else {
						$status = "CLOSED";
						}	
					// Display quota status
					print "<td>".$status."</td>";
				print "</tr>";
			}
		} else 
			{
			echo "0 results";
				}
		
		/* free result set */
			mysqli_free_result($result_c);
	?>




	</table>
</center>

	
	<!--Display further links-->	
	<center>
		<p>Click for the <a href="course.php">Course Information</a>.</p>
		<p>Click for the <a href="apply.php">Course Application Form</a>.</p>
		<p>Click for the particulars <a href="change.php">change Form</a>.</p>
		<p>Click for the <a href="private/quotalist.php">quota list of courses</a> (Authorized Users Only)</p>
	</center>
	
</body>
</html>
