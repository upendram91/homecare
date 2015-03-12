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
if($_SESSION['userpos']=="staff")
{
    header("location:member_home.php");
}
else if($_SESSION['userpos']=="admin")
{
    header("location:admin_home.php");
}
?>
<div id="templatemo_container">
<div id="templatemo_leftcolumn">
    <div id="templatemo_sitetitle">
        <div class="title">Co <span>Passions</span></div>
        <div class="tagline"><br />Skill Development Hub</div>
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
    <h3 align="center" style="background:black;margin-right:18px;padding-top:15px;">Add Staff</h3>
    <br />
    <form name="form1" method="post" action="create_employee_action.php">
        <table style="background:black;margin-right:20px;padding-top:15px;padding-bottom:20px;font-size:15px;" width="97%" border="0" cellpadding="0" cellspacing="0">
            <tr>
<?php
include("database.inc");
$sql1="SELECT * FROM emp_reg ORDER BY emp_user_id DESC LIMIT 1";
if($res1=mysql_query($sql1))
{
    $data1=mysql_fetch_array($res1);
    $uid = $data1['emp_user_id'];
    $uid++;
}

$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$pass=$_POST['pass'];



$sql2="insert into staff(s_name,s_phone,s_password,s_email,isadmin) values('$name','$phone','$pass','$email','staff')";



if(mysql_query($sql2))
{
    ?><td colspan="2" align="center" style="color: green;">Staff Successfully Created</td><?php
}
else
{
    ?><td colspan="2" align="center" style="color: red;">Staff Creation Failed</td><?php
}
?>
            </tr>
        </table>
    </form>

</div>
</div>
<div align="center"><br><br><img src="images/right_image.jpg"></div>
</body>
</html>