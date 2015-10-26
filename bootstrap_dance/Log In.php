<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
<style>
body{
	background-image:url(../bootstrap_dance/images/photo_splash_signin_1141x759_v4.jpg);
	top:100px;
	position:relative;
	
}
.footer{
	background-color:#000;	
	position:absolute;
	top:360px;
	left:0px;
	width:100%;
	height:100px;
	}

</style>	
	</head>
	
<body>
	<form method="post" action="lOG In.php">
	<table width="400px" border="5" align="center" bgcolor="#999999" cellpadding="10px;">
		<tr>
			<td align="center" colspan="5"><h1>Login Panel</h1></td>
		</tr>
		
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" placeholder="xyz@gmail.com"></td>
		</tr>
		
		<tr>
			<td>Password: </td>
			<td><input type="password" name="pass" placeholder="password"></td>
		</tr>
		
		<tr>
			<td align="center" colspan="5"><input type="submit" name="submit" value="LogIn"></td>
		</tr>
	</table>
<center><font color="red" size="6">Not Registered Yet? </font><a href="registration.php"><font color="yellow">Sign Up Here</font></a></center>
	
</body>
</html>`