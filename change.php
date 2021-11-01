<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Application Change Form</title>
</head>

<body style="background-color:ivory;">
<h3 align="center">Course Application Change Form</h3>
<div align="center"> 
  <hr>
  <h3 align="left">Pls fill in the form to retrieve your Application Change Form :</h3>
</div>
<hr>
<form method="post" action="change_input.php">
  <table width="75%" border="0">
    <tr> 
      <td width="37%" height="28">Application Number :</td>
      <td width="63%" height="28"> 
        <input type="text" name="applyno" size="7" maxlength="7" pattern="[0-9]{7}" title="7 digits of Application Number. Required!" required>
      </td>
    </tr>
    <tr> 
      <td width="37%" height="28"> 
        <p>HKID (Just the 6 digits) :</p>
      </td>
      <td width="63%" height="28"> 
        <input type="text" name="hkid" size="6" maxlength="6" pattern="[0-9]{6}" title="6 digits of your HKID. Required!" required>
      </td>
    </tr>
  </table>
  <hr>
  <BR>
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
