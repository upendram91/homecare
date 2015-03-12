<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION['username1']))
{
    if(isset($_SESSION['userpos']))
    {
        if($_SESSION['userpos']=="admin")
        {
            header("location:admin_home.php");
        }
       else if($_SESSION['userpos']=="member")
        {
            header("location:member_home.php");
        }
    }
}
?>
<html dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Home Care</title>

	<link rel="stylesheet" href="style.css" type="text/css" />

		<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="selectivizr.js"></script>
		<noscript><link rel="stylesheet" href="fallback.css" /></noscript>
	<![endif]-->

	</head>

	<body>
		<div id="container">
			<form action="admin_login_action.php" METHOD="POST">
				<div class="login">LOGIN</div>
				<h3 style="padding-left:41px;padding-top:59px;"><a href="index.html" style="text-decoration:none;"></a></h3>
				<div class="username-text">Username:</div>
				<div class="password-text">Password:</div>
				<div class="username-field">
					<input type="email" name="adminusername" value="<?php if(isset($_REQUEST['error'])){echo "Invalid Username";}?>" required />
				</div>
				<div class="password-field">
					<input type="<?php if(isset($_REQUEST['error'])){echo "password";}else{ echo "password";} ?>" name="adminpassword" value="<?php if(isset($_REQUEST['error'])){echo "Invalid Password";}?>"/>
				</div>
				<input type="checkbox" name="remember-me" id="remember-me" /><label for="remember-me">Remember Me </label>
				<div class="forgot-usr-pwd"><a href="forgot_password.php">Forgot Password</a>?</div>
				<input type="submit" name="submit" value="GO" />
			</form>
		</div>
	</body>
</html>
