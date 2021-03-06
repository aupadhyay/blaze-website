<?php
    session_start();

    if(isset($_SESSION['loggedin']) == false){
        $_SESSION['loggedin'] = false;
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

</head>

<body>

    <!-- Navigation -->
    <?php require('header.php') ?>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('images/DSC_9360.JPG');"></div>
                <div class="carousel-caption">
                    <h1 style="font-size:72px;">Code.</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/DSC_9358.JPG');"></div>
                <div class="carousel-caption">
                    <h1 style="font-size:72px;">Create.</h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('images/DSC_9359.JPG');"></div>
                <div class="carousel-caption">
                    <h1 style="font-size:72px;">Design.</h1>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header blaze">
                    Blaze - Summer Classes 2016
                </h1>
            </div>
            <div class="col-lg-12">
                <p style="font-size:24px;">Ever wanted to build/design/code a game or website? In any one of our 5 day courses, you have the opportunity to do just that. We'll teach you the basics of programming and help you create a game/website of your choice with our help. No prior knowledge necessary. Sign up today!</p>
            </div>
        </div>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Build something amazing.
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Lua/Corona SDK Programming</h4>
                    </div>
                    <div class="panel-body">
                        <p>Corona SDK is an up coming development platform that lets beginners create their own games for iOS and Android easily. We'll lead you step by step into the world of programming with the aid of this amazing development plaform. <br><br> 
                        <b>Result: </b>A mobile game to show friends/family <br> 
                        <b>When: (1 session left) </b><br>
                            <span style="padding-left:50px;"><strike>July 11-15, 2016</span></strike> <br>
                            <span style="padding-left:50px;">July 25-29,2016</span> <br>
                            <span style="padding-left:50px;">3PM - 7PM</span> <br>

                        <b>Where: </b>Near Mission San Jose High School</p>
                        <a href="learnmore.php?classid=1" class="btn btn-info">Learn More</a>

                        <a href="signup.php?class=1" class="btn btn-success">Register for this class</a>
                    </div>
                </div>
            </div>
            <!--div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">

                        <h4> <span class="glyphicon glyphicon-signal" aria-hidden="true"></span> HTML/Web Development</h4>
                    </div>
                    <div class="panel-body">
                        <p>Websites are used in our everyday lives. They allow us to connect with people all across the world, access information from anywhere, and create amazing tools. Creating these websites is very simple and can be extremely beneficial in the long run.  <br><br> 
                        <b>Result: </b> Your own personal website <br> 
                        <b>When: (1 session) </b><br>
                            <span style="padding-left:50px;">July 18-22, 2016</span> <br>
                            <span style="padding-left:50px;">3PM - 7PM</span> <br>
                        <b>Where: </b>Near Mission San Jose High School</p>
                        
                        <a href="learnmore.php?classid=2" class="btn btn-info">Learn More</a>
                        <a href="signup.php?class=2" class="btn btn-success">Register for this class</a>
                    </div>
                </div>
            </div-->
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i>Java Game Development</h4>
                    </div>
                    <div class="panel-body">
                        <p>Java has been used for years to develop games ranging from Minecraft to complex FPS Games. In this course, we'll teach you the basics of Java Programming as well as the fun, game creation part of Java. <br><br><br>
                        <b>Result: </b>Your own Java game <br> 
                        <b>When: (1 session) </b><br>
                            <span style="padding-left:50px;">August 1-5, 2016</span> <br>
                            <span style="padding-left:50px;">3PM - 7PM</span> <br>
                        <b>Where: </b>Near Mission San Jose High School</p>
                        <a href="learnmore.php?classid=3" class="btn btn-info">Learn More</a>
                        <a href="signup.php?class=3" class="btn btn-success">Register for this class</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Classes in Action</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" width="100%" height="100%" src="images/teaching.png" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" width="100%" height="100%" src="images/DSC_9361.JPG" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" width="100%" height="100%" src="images/DSC_9362.JPG" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
               <img class="img-responsive img-portfolio img-hover" width="100%" height="100%" src="images/DSC_9406.JPG" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" width="100%" height="100%" src="images/DSC_9366.JPG" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <img class="img-responsive img-portfolio img-hover" width="100%" height="100%" src="images/DSC_9367.JPG" alt="">
            </div>
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Teachers</h2>
            </div>
            <div class="col-md-6">

                <center><img src="images/abhi.jpg" width="50%" alt="" style="border-radius:50%">
                <h1>Abhi Upadhyay </h1>
                <p>Started programming at age 8 <br> Has won 4 hackathons <br> 4 apps on the iOS and Android App Store <br> Fluent in: Java, C++, HTML, JavaScript, Lua, Python, and PHP</p></center>

            </div>
            <div class="col-md-6">
                <center><img src="images/cyrus.png" width="50%" alt=""style="border-radius:50%">
                <h1>Cyrus Vachha</h1>
                <p>Started programming at age 8 with Abhi <br> Awarded in three programming competitions <br> 4 apps on the iOS and Android App Store <br> Knowledge of:  Lua, Python, and Java</p></center></center>
                <p></p>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Blaze Studios 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.lazyload.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
