
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<div id="webform">
<h2>Web Form</h2>
<form action="" method="post">
<label>Name :</label>
<input type="text" name="name" required placeholder="Please Enter Name"/><br><br>
<label>Student Email :</label>
<input type="email" name="email" required placeholder="qwerty@gmail.com"/><br><br>
<label>Student City :</label>
<input type="text" name="city" required placeholder="Please Enter Your City"/><br><br>
<select name="gender" required>
    <option value=""> Select Gender </option>
    <option value="M"> Male </option>
	<option value="F"> Female </option>
</select>
<br><br>
<input type="submit" value=" Submit Details " name="submit"/><br />
</form>
</div>

</body>
</html> -->

<?php
$servername='localhost';
$username='root';
$password='';
$dbname='desmondl12';

$conn = new mysqli($servername, $username, $password);

$cname='CNAME';
$registration='Registration';
$fname='FNAME';
$email='EMAIL';
$password='PASSWORD';

//run the store proc
$result = mysqli_query($conn, "CALL NewSignUp");

while ($row = mysqli_fetch_array($result)){     
    echo $row[0] . " - " . + $row[1]; 
  }
