<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Care</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="script.js"></script>
    <link rel="stylesheet" href="runnable.css" />
    <script type="text/javascript">
        function validatePass(p1, p2) {
            if (p1.value != p2.value || p1.value == '' || p2.value == '') {
                p2.setCustomValidity('Password incorrect');
            } else {
                p2.setCustomValidity('');
            }
        }
    </script>
</head>

<body>
<?php
session_start();
if(!isset($_SESSION['username1']))
{
    header("location:login.php");
}
?>
<div id="templatemo_container" align="left">
<div id="templatemo_leftcolumn">
	<div id="templatemo_sitetitle">
		<div class="title"><span>Home Care</span></div>
        <div class="tagline"><br />Help at your door step...</div>
    </div>
    <div id="templatemo_search">
        <br /><h2>Welcome <?php echo $_SESSION['username1']; ?>!</h2>
        <a href="admin_logout.php" style=" position: relative; text-decoration: none; font-size: 15px;">Logout</a>
    </div>

    <div id="templatemo_menu">
    	<div class="templatemo_menu_top"></div>
        <ul>
          	<li><a href="create_employee.php">Add Staff</a></li>
            <li><a href="create_patient.php">Add Patient</a></li>
            <li><a href="schedule_app.php">Schedule Appointments</a></li>
        </ul>
      <div class="templatemo_menu_bottom"></div>
    </div>


</div>

<div id="templatemo_rightcolumn">
	<div id="templatemo_banner">
    	<h1>Add Staff</h1>
    </div>
        <br />
    <form name="form1" method="post" action="create_employee.php">
    <table style="margin-right:20px;padding-top:15px;padding-left:100px;font-size:15px;" width="97%" border="0" cellpadding="0" cellspacing="0">
        

        <tr>
          <th style="color:salmon;" align="left">Name </th>
          <td><input name="name" type="text" id="name" required="required" size="26"/></td>
        </tr>
        <tr>
          <th style="color:salmon;" align="left">Phone </th>
          <td><input name="phone" type="text" id="phone" required="required" size="26"/></td>
        </tr>
        <tr>
          <th style="color:salmon;" align="left">Email ID</th>
          <td><input name="email" type="email" id="email" required="required" size="26"/></td>
        </tr>
        <tr>
          <th style="color:salmon;" align="left">Employee Password </th>
          <td><input name="pass" type="password" id="pass" required="required" size="26"/></td>
        </tr>
        
        <tr>
            <th style="color:salmon;" align="left">Confirm Password </th>
            <td><input name="cpass" type="password" id="cpass" required="required" size="26" onfocus="validatePass(document.getElementById('pass'), this);" oninput="validatePass(document.getElementById('pass'), this);"/></td>
        </tr>
        </table>
        </br>
        </br>
        <table style="margin-right:20px;padding-top:15px;font-size:15px;" width="97%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" colspan="2" style="padding-bottom: 20px;">
              <input type="submit" name="submit" id="submit" value="Add Staff">
            
          </td>
        </tr>
      </table>
</br>
<?php
if(isset($_POST['submit']))
{
	?>
    <table style="background:black;margin-right:20px;padding-top:15px;padding-bottom:20px;font-size:15px;" width="97%" border="0" cellpadding="0" cellspacing="0">
            <tr>
            <?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	include("database.inc");
	$staff='staff';
	$sql1="INSERT INTO staff(s_name,s_phone,s_email,s_password,isadmin) VALUES('$name','$phone','$email','$password','$staff')";
	if(mysql_query($sql1))
	{
		/* $to      = $email; //Send email to the user
			$subject = 'Employee account created'; // Give the email a subject 
			$message = '

					Your account has been created, you can login using your email id and the below password!

					

					'.$password.'

					'; // Our message above including the link
					
			$headers = 'From:noreply@homecare.com' . "\r\n"; // Set from headers
			mail($to, $subject, $message, $headers); // Send the email */
    ?><td colspan="2" align="center" style="color: green;">Employee Successfully Created</td><?php
	}
	else
	{
    ?><td colspan="2" align="center" style="color: red;">Employee Creation Failed</td><?php
	}
	?>
            </tr>
        </table> 
<?php
	}
?>
    </form>
	    
</div>
</div>

</body>
</html>