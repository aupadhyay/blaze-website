<?php
	session_start();
     $message = "";
	if(isset($_POST['email'])){	
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$data = array();
       

    require("../../server.php");
		$sql = "SELECT * FROM `users` WHERE `email`='" . $email . "' AND `pass`='". $pass . "'" ;
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
	    	$row = mysqli_fetch_assoc($result);
	 		header('Location:myaccount.php');
	    	$_SESSION['accountid'] = $row["id"];
	    	$_SESSION['loggedin'] = true;
		} else {
            $message = "Invalid email or password!";
            
		}

		mysqli_close($conn);
	}

?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blaze Studios - Summer Classes</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="https://code.jquery.com/jquery-2.2.2.js"></script>
  <script src="js/bootstrap.js"></script>
</head>

  <body>
  <?php require('header.php'); ?>
    <div class="container">
        <div class="jumbotron"><center>
            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Log In</a></li>
                    <li ><a href="#signup" data-toggle="tab">Sign Up</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="login">
                        <div class="wrapper" style="width:50%;">
                            <form class="form-signin" id="login" action="login-norm.php" method="POST">       
                                <h1 class="form-signin-heading">Log In</h1>
                                <p style="color:red;"><?php echo $message ?></p>
                                <input type="text" class="form-control" name="email"  placeholder="Email Address" required="" autofocus="" /><br>
                                <input type="password" class="form-control" name="pass" placeholder="Password" required=""/> <br>     
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
                            </form>
                        </div>
                    </div>
                        
                    <div class="tab-pane" id="signup">
                        <div class="wrapper" style="width:50%;">
                            <form class="form-signin" action="signup-norm.php" method="POST">       
                                <h1 class="form-signin-heading">Sign Up</h1>
                                <div class="message" style="color:red; font-size:34px;"></div>
                                <input type="text" class="form-control" name="fname"  placeholder="Student First Name" required="" autofocus="" /><br>
                                <input type="text" class="form-control" name="lname"  placeholder="Student Last Name" required=""/><br>
                                <input type="email" class="form-control" name="email"  placeholder="Student Email Address" required=""/><br>
                                <input type="password" class="form-control" name="pass" placeholder="Password" required=""/> <br>
                                <input type="password" class="form-control" name="passconfirm" placeholder="Confirm Password" required=""/> <br>     
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </center></div>
  </div>
</html>

