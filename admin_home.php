<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Care</title>
<meta name="keywords" content="Communities, Passions, Communities of Passions, Community Hub" />
<meta name="description" content="Communities of Passions, Hub for Developing Skills" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
session_start();
if(!isset($_SESSION['username1']))
{
    header("location:login.php");
}

?>
<div id="templatemo_container">

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
    	<h1>Welcome to Admin Panel</h1>
    </div>
    <center>
    <h3>Please select an option to continue</h3>
    </center>

	    
</div>
</div>
</body>
</html>