<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Course Application Change Form info</title>
</head>

<body style="background-color:ivory;">
	<div align="center"> 
	<h3 align="left">Pls fill in the form to change your Email Address and Contact Tel :</h3>
	</div>
	<hr>
	
	<form method="post" action="change_input_post.php">
		<table width="75%" border="0">
		    <tr> 
				<td width="37%" height="39">Application Number :</td>
					<td width="63%" height="39"> 
						<input type="text" name="applyno" size="7" maxlength="7" pattern="[0-9]{7}" value="<?php echo $applyno;?>" title="7 digits of Application Number. Required!" required readonly>
					</td>
			</tr>			
			<tr> 
				<td width="37%" height="28">Email address : </td>
					<td width="63%" height="28">
						<input type="email" name="email" title="Your contact email address."> <!-- Optional! -->
					</td>
			</tr>
			<tr> 
				<td width="37%" height="28">Contact Tel : </td>
					<td width="63%" height="28">
						<input type="text" name="tel" pattern="[0-9 ]{1,}" title="Your contact Tel number in digits only."> <!-- Optional! -->
						<!--[0-9 ]with an added 'space' to allow space input. {1,} means input should be greater that one number.-->
					</td>
			</tr>
		</table>
		
		<hr>
	  
		<br>

			<input type="submit" name="Submit" value="Submit">
			<input type="reset" name="reset" value="Reset">
				
	</form>


		
	
</body>
</html>