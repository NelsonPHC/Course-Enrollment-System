<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Handling Application Form Input</title>
</head>

<body style="background-color:ivory;">
	<h3 align="center">Computer Science &amp; Information Technology</center></h3>

<?php

	//Link to database coursedb and ready for queries
		include 'opendb.php';
		
	//Process applytbe data
		// Get the query results from database-table coursedb-applytbl by SELECT
			$sql="SELECT * FROM applytbl";
			$result_a=mysqli_query($link, $sql);
		// Store the number of rows in table applytbl to $num_a
			$num_a=mysqli_num_rows($result_a);
		

	//Process coursetbl data
		// Get the query results from database-table coursedb-coursetbl by SELECT
			$sql="SELECT * FROM coursetbl";
			$result_c=mysqli_query($link, $sql);
		// Store the number of rows in table applytbl to $num_c
			$num_c=mysqli_num_rows($result_c);
		
	// Store coursetbl/courseno values from table to variable $courseno_c array, 
		//ready for checking correct course number input from user later on.
			$courseno = $_POST['courseno'];
			$i=0;
			$quota=1;
			if ($num_c > 0) {
				
				while($row = mysqli_fetch_array($result_c)) {
					$courseno_c[$i]=$row["courseno"];
					if($courseno == $courseno_c[$i]){
						$quota=$row["quota"];		//Get quota for Course Number "$courseno"
					}
					$i++;
				}
			} else {
				echo "0 results";
			}

	// Store applytbl/courseno + studentid values from table to variable $courseno_a + $studentid_a array, 
		//ready for 1 checking duplicate application input from user.
			$i=0;
			if ($num_a > 0) 
				{		
				while($row = mysqli_fetch_array($result_a)) 
					{
					$courseno_a[$i]=$row["courseno"];
					$studentid_a[$i]=$row["studentid"];
					$i++;
					}
				} else 
					{
					echo "0 results";
					}


	// Store input values via POST to variables
			
			$name = $_POST['name'];
			$studentid = $_POST['studentid'];
			$hkid = $_POST['hkid'];	
			$email = $_POST['email'];	
			$tel = $_POST['tel'];

			
	//Check if input courseno matches courseno_c in coursetbl
		//by using for loop
			$c_avail = "false";
			for ($i = 0; $i < $num_c; $i++) 
				{
				if ($courseno == $courseno_c[$i]) 
					{
					$c_avail = "true";
					}
				}			

	//Check if input (courseno and studentid) matches (courseno_a and studentid_a) in the same row of applytbl
			$dupcidsid = "false";
			for ($i = 0; $i < $num_a; $i++) 
				{
				if ($studentid == $studentid_a[$i] and $courseno == $courseno_a[$i]) 
					{
					$dupcidsid = "true";
					}
				}
				
			//NC start
			//Add one count to quotaused value
			if($c_avail == "true"){
				$quotaused=0;
				for ($i = 0; $i < $num_a; $i++) {
					if ($courseno == $courseno_a[$i]) {
						$quotaused++;				// $quotaused = count the number of courseno "$courseno" in applytbl
					}
				}

				
				//moved "updating quotaused value" code downward by TC!

				
				//Generate applyno
				$err=0;
				if($quotaused < $quota){
					$quotaused++;		//update quotaused
					$applyno=$courseno*1000+$quotaused;		//generate applyno
				}else{
					$err=1;
				}

				
				//moved "updating quotaused value" result message downward and modified with format by TC!


				//$conn->close();
				//NC end				
				
			}
	
	// Attempt INSERT query execution
		// Check course availability and Check duplicate application.
		//(Should also add No application when quota used up!)
			if($c_avail=="false") 
				{
				echo "<center><h2><br><br>Your selected course number $courseno does not exist!<br>
				Please double check course information!</center></h2><br><br>";
				}elseif($dupcidsid=="true") 
					{
					echo "<center><h2><br><br>Duplicate application on course number $courseno!<br>
					Please select another course number to apply!</center></h2><br>";
					}elseif($err == 1) {
						echo "<center><h2><br><br>Your selected course number $courseno is full!<br>
						Please double check course information!</center></h2><br>";
						}else 
						{
						$sql = "INSERT INTO applytbl (courseno, applyno, name, studentid, hkid, email, tel) 
						VALUES ('$courseno','$applyno', '$name', '$studentid', '$hkid', '$email', '$tel')";
						if(mysqli_query($link, $sql)) 
							{
							echo "<center><h2><br><br>Your application to course $courseno is successful!<br>
							Your application number is: $applyno</h2></center><br>";
							
							//Moved to here the updating quotaused code
							$sql_c = "UPDATE coursetbl SET quotaused=$quotaused WHERE courseno=$courseno";// Update quotaused into coursetbl

								//Moved to here the updating quotaused result message
								if ($link->query($sql_c) === TRUE) {
								echo "<center><h3><br>Quota used updated successfully</h3></center><br>";
								} else {
								echo "Error updating quotaused: " . $link->error;
								}

								}else 
								{
								echo "<br><br>ERROR: Can not process your application. " . mysqli_error($link);
								}			
						}
		
	//mysqli_close();
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