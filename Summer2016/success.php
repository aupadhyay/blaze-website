<?php
	session_start();
	$message = "Thanks for signing up!";
	if(isset($_POST['studentfname'])){
		$studentfname = $_POST['studentfname'];
		$studentlname = $_POST['studentlname'];
		$studentemail = $_POST['studentemail'];
		$parentfname = $_POST['parentfname'];
		$parentlname = $_POST['parentlname'];
		$parentemail = $_POST['parentemail'];
		$parentnum = $_POST['parentnum'];
		$payment = $_POST['payment'];
		$message = "Thanks for signing up!";

		$_SESSION['studentfname'] = $_POST['studentfname'];
		$_SESSION['studentlname'] = $_POST['studentlname'];
		$_SESSION['studentemail'] = $_POST['studentemail'];
		$_SESSION['parentfname'] = $_POST['parentfname'];
		$_SESSION['parentlname'] = $_POST['parentlname'];
		$_SESSION['parentemail'] = $_POST['parentemail'];
		$_SESSION['parentnum'] = $_POST['parentnum'];
		$_SESSION['payment'] = $_POST['payment'];



		$classid = $_POST['classid'];
		$accountid = $_POST['accountid'];
		$_SESSION['accountid'] = $accountid;

		if($classid == 1){
			if ($_POST['dates'] == "2") {
				$table = "lua2-signups";
				$paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9XZV9QUUJ8RSS";
			}else{
				$table = "lua-signups";
				$paypal = "http://blazegamestudios.com/Summer2016/limit.php";
			}
		//}elseif ($classid == 2) {
		//	$table = "html-signups";
		//	$paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7V8L4Z6Q646TG";
		}elseif ($classid == 3) {
			$table = "java-signups";
			$paypal = "https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L2R8AJFGVHMN8";
		}
		require("../../server.php");

		$checkforfive = "SELECT * FROM `". $table ."`";
		$result2 = mysqli_query($conn, $checkforfive);
		if ($result2 == FALSE) {
			echo "Something went wrong :( Please go back to the home page." ;
		}
		
		if (mysqli_num_rows($result2) >= 5) {
	    	header("Location: limit.php");
		}

		$checkifregistered = "SELECT * FROM `". $table ."` WHERE `accountid`=" . $accountid;
		$result3 = mysqli_query($conn, $checkifregistered);
		if ($result3 == FALSE) {
			$message =  "Something went wrong :( Please go back to the home page." ;
		}
		if (mysqli_num_rows($result3) >= 1) {
	    	$message = "You are already registered for this class!";
		}else{

			require('header.php');
			$sql ="INSERT INTO `" . $table . "` ( `accountid`, `studentfname`,`studentlname`, `studentemail`, `parentfname`, `parentlname`, `parentemail`, `parentnum`, `payment`) VALUES ( '". $accountid ."',  '". $studentfname ."' , '". $studentlname ."' , '". $studentemail ."' , '". $parentfname ."' , '". $parentlname ."' , '". $parentemail ."' , '". $parentnum ."' , '". $payment ."' )";
			$_SESSION['sql'] = $sql;

	
			if($payment == "paypal"){
				header("Location: " . $paypal);
			}else{
				$result = mysqli_query($conn, $sql);
				require 'PHPMailer-master/PHPMailerAutoload.php';
				include '../../gmail.php';
				$mail = new PHPMailer;
				$mail->isSMTP();
				$mail->SMTPDebug = 0;
				$mail->Host = gethostbyname('smtp.gmail.com');
				$mail->Port = 587;
				$mail->SMTPAuth = true;
				$mail->IsHTML(true);
				$mail->Username = "blazegamestudios@gmail.com";
				$mail->Password = $pass;
				$mail->setFrom('abhi.upadhyay01@gmail.com', 'BLAZE UPDATE');
				$mail->addAddress('abhi.upadhyay01@gmail.com', 'Abhi Upadhyay');
				$mail->Subject = 'BLAZE UPDATE - Class Signup';
				$mail->Body = $table . '<br> New signup: '. $studentfname . ' ' . $studentlname . '<br> Payment Type: ' .  $payment . '<br>' . $_SESSION['sql'] ;
				if (!$mail->send()) {
				    //echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
				    //echo "Message sent!";
				}
				$mailUser = new PHPMailer;
				$mailUser->isSMTP();
				$mailUser->SMTPDebug = 0;
				$mailUser->Host = gethostbyname('smtp.gmail.com');
				$mailUser->Port = 587;
				$mailUser->SMTPAuth = true;
				$mailUser->IsHTML(true);
				$mailUser->Username = "blazegamestudios@gmail.com";
				$mailUser->Password = $pass;
				$mailUser->setFrom('abhi.upadhyay01@gmail.com', 'Blaze Studios');
				$mailUser->addAddress($studentemail, $studentfname . " " . $studentlname);
				$mailUser->addAddress($parentemail, $parentfname . " " . $parentlname);
				$mailUser->Subject = 'Blaze Studios - Registration Confirmation';
				$mailUser->Body =  "Thanks for registering for our class! We'll send you some more information soon!";
				if (!$mailUser->send()) {
				    //echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
				    //echo "Message sent!";
				}
        		
			}
			mysqli_close($conn);
		}
	
	}
?>


<html>
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
		<script src="https://code.jquery.com/jquery-2.2.2.js"></script>
	</head>
	<body>
		<?php require('header.php'); ?>

		<div class="container">
			<div class="jumbotron">
				<h1><?php echo $message; ?></h1>
			</div>
		</div>
	</body>
</html>