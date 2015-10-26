<?php

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>--Sign Up & Login Page--</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/full-slider.css" rel="stylesheet">
</head>

<body>
	
	   <h1 align="center" style="margin-top:0px">Register or Sign In</h1>

 		<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <!--<ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol> -->

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url(images/1.jpg); -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px)"></div>
               
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url(images/2.jpg);"></div>
                
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url(images/3.jpg);"></div>
                
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <!-- <span class="icon-prev"></span> -->
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <!-- <span class="icon-next"></span> -->
        </a>

    </header>

    
	<form method="post" action="signup.php" style="left:200px; position:absolute; top:100px; background-color:#066">
	<table border="5px solid" align="center" cellpadding="20px" cellspacing="20px">
    	<tr>
        	<td colspan="5" align="center" height="50px" style="font-size:36px">Sign Up</td>
        </tr>
        <tr>
        	<td>Username : </td>
            <td><input type="text" name="username" placeholder="abc" style="height:20px" /></td>
        </tr>
        <tr>    
            <td>Email : </td>
            <td><input type="text" name="email" placeholder="xyz@gmail.com" /></td>
        </tr>
        <tr>    
            <td>Password : </td>
            <td><input type="password" name="password" placeholder="*******" /></td>
        </tr>
        <tr>
        	<td colspan="2px" align="center"><input type="submit" name="submit" value="Sign Up" /></td>
        </tr>
    </table>
    
    </form>
    <?php
	
    $con = mysqli_connect("localhost","root","","dance_db") or die(mysqli_error($con));

	if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($username==''){
            echo "<script>alert('PLEASE ENTER YOUR NAME!')</script>";
            exit();
        }
        if($email==''){
            echo "<script>alert('PLEASE ENTER YOUR EMAIL!')</script>";
            exit();
        }
        if($password==''){
            echo "<script>alert('PLEASE ENTER YOUR PASSWORD!')</script>";
            exit();
        }

        $sql = "SELECT * FROM users where email = '$email'";
        $res = mysqli_query($con,$sql);

        if(mysqli_num_rows($res)>0){
            echo "<script>alert('Email $email is already exists, plz try another')</script>";
            exit();
        }

        $sql = "insert into users (username,email,password) values ('$username','$email','$password')";
        if(mysqli_query($con,$sql)){
            echo "<script>alert('Registration Successfull')</script>";
        }
    }
	
	?>
    <form method="post" action="signup.php" style="right:200px; position:absolute; top:130px; background-color:#066">
    <table border="5px solid" align="center" cellpadding="20px" cellspacing="20px">
    	<tr>
        	<td colspan="5" align="center" height="50px" style="font-size:36px">Login</td>
        </tr>
       
        <tr>    
            <td>Email : </td>
            <td><input type="text" name="email" placeholder="xyz@gmail.com" /></td>
        </tr>
        <tr>    
            <td>Password : </td>
            <td><input type="password" name="password" placeholder="******" /></td>
        </tr>
        <tr>
        	<td colspan="2px" align="center"><input type="submit" name="login" value="Login" /></td>
        </tr>
    </table>
	</form>
     <script src="js/jquery.js"></script>

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
<?php

    $con = mysqli_connect("localhost","root","","dance_db") or die(mysqli_error($con));

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users where email = '$email' AND password = '$password'";

        $res = mysqli_query($con,$sql);

        if(mysqli_num_rows($res)>0){

            $_SESSION['email']=$email;

            echo "<script>window.open('home.php','_self')</script>";
            
        }
        else{
            echo "Email or password is incorrect";
        }

        
    }
?>