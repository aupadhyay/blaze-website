<?php
	session_start();

	$classid = $_GET['class'];
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
                            <form class="form-signin" id="login" action="login.php" method="POST">       
                                <h1 class="form-signin-heading">Log In</h1>
                                <p style="font-size: 15px;">(If you're already logged in, please do so again to verify your account)</p>
                                <p style="color:red; font-size:20px;" id="message"></p>
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
                                <input type="hidden" class="form-control" name="class" value="<?php echo $classid; ?>"> <br>
                                <input type="password" class="form-control" name="passconfirm" placeholder="Confirm Password" required=""/> <br>     
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </center></div>
	</div>

		<script>
			$(document).ready(function() {

    // process the form
    		$('#login').submit(function(event) {
    		console.log("test");
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
        	'class' : <?php echo $classid; ?>,
            'email' : $('input[name=email]').val(),
            'pass'  : $('input[name=pass]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'login.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        })
            // using the done promise callback
            .done(function(data) {
            if(data['success'] == true){
                // log data to the console so we can see
                if(data['classid'] == 1){
                	window.location.href = 'luasignup.php?account=' + data['accountid'] + "&class=" + data['classid'];
                //}if(data['classid'] == 2){
                	//window.location.href = 'htmlsignup.php?account=' + data['accountid'] + "&class=" + data['classid'];
                }if(data['classid'] == 3){
                	window.location.href = 'javasignup.php?account=' + data['accountid'] + "&class=" + data['classid'];
                }

            }else{
                $('#message').text("Invalid email or password!");
            
            }

            if(data['signedup'] == true){
                window.location.href = 'signedup.php';
            }

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});
		</script>
	</body>
</html>

