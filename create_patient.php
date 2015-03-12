<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Care</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="runnable.css" />
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
    	<h1>Add Patient</h1>
    </div>
        <br />
    <form name="form1" method="post" action="create_patient.php">
    <table style="margin-right:20px;padding-top:15px;padding-left:100px;font-size:15px;" width="97%" border="0" cellpadding="0" cellspacing="0">
        

        <tr>
          <th style="color:salmon;" align="left">Name </th>
          <td><input name="name" type="text" id="name" required="required" size="26"/></td>
        </tr>
        <tr>
          <th style="color:salmon;" align="left">Date of Birth </th>
          <td><input type="text" id="datepicker" name="dob" required="required" size="26"/></td>
          
        </tr>
        <tr>
          <th style="color:salmon;" align="left">Address</th>
          <td><input name="address" type="text" id="address" required="required" size="26"/></td>
        </tr>
        <tr>
          <th style="color:salmon;" align="left">Phone </th>
          <td><input name="phone" type="text" id="phone" required="required" size="26"/></td>
        </tr>
        
        </table>
        </br>
        </br>
        <table style="margin-right:20px;padding-top:15px;font-size:15px;" width="97%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" colspan="2" style="padding-bottom: 20px;">
              <input type="submit" name="submit" id="submit" value="Add Patient">
            
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
	$dob = $_POST['dob'];
	$dob1 = date("Y-m-d", strtotime($dob));
	$add = $_POST['address'];
	$phone = $_POST['phone'];
	include("database.inc");
	$sql1="INSERT INTO patients(pat_name,pat_dob,pat_add,pat_phone) VALUES('$name','$dob1','$add','$phone')";
	if(mysql_query($sql1))
	{
    ?><td colspan="2" align="center" style="color: green;">Patinet Successfully Created</td><?php
	}
	else
	{
    ?><td colspan="2" align="center" style="color: red;">Patient Creation Failed</td><?php
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