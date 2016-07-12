<!--?php
	session_start();
	$accountid =  $_GET['account'];
	$classid =  $_GET['class'];
	require("../../server.php");
	$sql = "SELECT * FROM users WHERE id='" . $accountid . "'";
	
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
	}


	$checkforfive = "SELECT * FROM `html-signups`";
	$result2 = mysqli_query($conn, $checkforfive);
	if ($result2 == FALSE) {
		echo "Something went wrong :( Please go back to the home page." ;
	}
	if (mysqli_num_rows($result2) >= 5) {
    	header("Location: limit.php");
	}
	mysqli_close($conn);
?>

<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Blaze Studios - Summer Classes</title>
	    <link href="css/bootstrap.min.css" rel="stylesheet">


	    <link href="css/modern-business.css" rel="stylesheet">
	    <link href="style.css" rel="stylesheet">

	    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script src="https://code.jquery.com/jquery-2.2.2.js"></script>
	</head>
	<body>
		<?php require('header.php'); ?>


		<div class="container">
			<div class="jumbotron">
	
				<h1>HTML Class Signups</h1>
				<form action="success.php" method="POST" style="width:75%">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Student First Name:</span>
						<input type="text" class="form-control" name="studentfname"	 aria-describedby="basic-addon1" value="<?php echo $row['firstname']; ?>" required>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon2">Student Last Name:</span>
						<input type="text" class="form-control" name="studentlname" aria-describedby="basic-addon2" value="<?php echo $row['lname']; ?>" required>
					</div><br>

					<div class="input-group">
						<span class="input-group-addon" id="basic-addon3">Student Email:</span>
						<input type="email" class="form-control" name="studentemail" aria-describedby="basic-addon3" value="<?php echo $row['email']; ?>" required>
					</div><br>

					<div class="input-group">
						<span class="input-group-addon" id="basic-addon4">Parent First Name:</span>
						<input type="text"  class="form-control" aria-describedby="basic-addon4" name="parentfname" required><br>
					</div><br>

					<div class="input-group">
						<span class="input-group-addon" id="basic-addon5">Parent Last Name:</span>
						<input type="text" class="form-control" aria-describedby="basic-addon5" name="parentlname" required>
					</div><br>

					<div class="input-group">
						<span class="input-group-addon" id="basic-addon6">Parent Email: </span>
						<input type="email" class="form-control" aria-describedby="basic-addon6" name="parentemail" required>
					</div><br>

					<div class="input-group">
						<span class="input-group-addon" id="basic-addon7">Parent Phone Number:</span>
						<input type="text" class="form-control" aria-describedby="basic-addon7" name="parentnum" value="<?php echo $row['phonenum']; ?>" required>
					</div><br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon8">Payment Options: </span>
						<select name="payment" class="form-control" aria-describedby="basic-addon8" required>
  							<option value="paypal">PayPal (Click for more options)</option>
  							<option value="inperson">In person</option>
						</select>
					</div><br>

					<input type="checkbox" required> I understand that I must pay 99 USD either through PayPal or on the first day of my class. <br><br>

					<p style="font-size:15px;">Refund Policy: We will contact you about a refund if you choose to withdraw your registration before May 21st, 2016.</p>
					
	
					<input type="hidden" name="accountid" value="<?php echo $accountid; ?>">
					<input type="hidden" name="classid" value="<?php echo $classid; ?>">
					<button type="submit" class="btn btn-default"> Sign up! </button>
				</form>
			</div>
		</div>
	</body>
</html-->