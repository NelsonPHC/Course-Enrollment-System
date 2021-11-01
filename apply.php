<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Application Form</title>
</head>

<body style="background-color:ivory;">
	<h3 align="center">Course Application Form</h3>
	
	<div align="center">
		<h3>(For First-Come-First-Served Courses)</h3>
	</div>

<hr>
	<h3 align="left">Please fill in the form below to enroll :</h3>
<hr>
	
	<form method="post" action="apply_input.php">
			<table width="75%" border="0">
			<tr> 
				<td width="37%" height="28">Course No To enroll:</td>
					<td width="63%" height="28"> 
						<input type="text" name="courseno" size="4" maxlength="4" pattern="[0-9]{4}" title="4 digits of Course Number. Required!" required>
						<!--note that courseno and hence $courseno are being used in coursetbl. Change to use courseno to start with.-->
					</td>
			</tr>
			<tr> 
				<td width="37%" height="28">Name :</td>
					<td width="63%" height="28">
						<input type="text" name="name" pattern="[A-Z a-z]{1,}" title="Your name in alphabets only. Required!" required>
						<!--[A-Z a-z]with an added 'space' to allow space input. {1,} means input should be greater that one character.-->
						</td>
			</tr>
			<tr> 
				<td width="37%" height="28">Staff/student ID :</td>
					<td width="63%" height="28">
						<input type="text" name="studentid" pattern="[0-9]{10}" title="10 digits of your Student ID. Required!" required>
						<!--studentid was name="stid" in the CU sample-->
					</td>
			</tr>
			<tr> 
				<td width="37%" height="28">HKID (Just the 6 digits) :</td>
					<td width="63%" height="28">
						<input type="text" name="hkid" size="6" maxlength="6" pattern="[0-9]{6}" title="6 digits of your HKID. Required!" required>
					</td>
			</tr>
			<tr> 
				<td width="37%" height="28">Email address : </td>
					<td width="63%" height="28">
						<input type="email" name="email" title="Your contact email address. Optional!">
					</td>
			</tr>
			<tr> 
				<td width="37%" height="28">Contact Tel : </td>
					<td width="63%" height="28">
						<input type="text" name="tel" pattern="[0-9 ]{1,}" title="Your contact Tel number in digits only. Optional!">
						<!--[0-9 ]with an added 'space' to allow space input. {1,} means input should be greater that one number.-->
					</td>
			</tr>
		</table>
		
		<hr>
	  
		<br>

			<input type="submit" name="Submit" value="Submit">
			<input type="reset" name="reset" value="Reset">
				
	</form>

	<!--Display further links-->	
	<center>
		<p>Click for the <a href="course.php">Course Information</a>.</p>
		<p>Click for the <a href="apply.php">Course Application Form</a>.</p>
		<p>Click for the particulars <a href="change.php">change Form</a>.</p>
		<p>Click for the <a href="private/quotalist.php">quota list of courses</a> (Authorized Users Only)</p>
	</center>

</body>
</html>