<?php
$insert=false;
if(isset($_POST['name'])){


$server="localhost";
$username"root";
$password=" ";

$con=mssql_connect($server,$username,$password);

if(!$con){
	die("Connection to this database failed due to". mysqli_connect_error());
}

//echo "Successs connecting to the db"
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
$sql="INSERT INTO 'trip'.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());"


//echo $sql;

if($con->query($sql) ==true){
	//echo "Successfully inserted";
	$insert=true;
}
else{
	//echo"ERROR: $sql <br> $con->error";
}

$con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to Travel Form</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">


</head>
<body>
	<img class="bg"src="bg.jpg" alt="IIT Kharagpur">
	<div class="container">
		<h1>Welcome to IIT Kharagpur US Trip form</h1>
		<p>Enter your details and submit this form to confirm your participation in the trip.</p>
		<?php
		if($insert == true){
		echo "<p class="submitMsg">Thanks for submitting the form we are happy to see that you are joining us</p>"
	}
		?>

		<form action="index.php" method="post">
			<input type="text" name="name" id="name" placeholder="Enter Your Name">
			<input type="text" name="age" id="age" placeholder="Enter Your Age">
			<input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
			<input type="email" name="email" id="email" placeholder="Enter Your Email">
			<input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
			<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter an other information here"></textarea>

			<button class="btn">Submit</button>
			<button class="btn">Reset</button>

		</form>

	

		
	</div>
	<script src="index.js"></script>

</body>
</html>