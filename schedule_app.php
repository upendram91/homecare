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
    	<h1>Schedule Appointments</h1>
    </div>
    <br />
    <form name="form1" method="post" action="schedule_app.php">
    <table style="margin-right:20px;padding-top:15px;padding-left:100px;font-size:18px;" width="97%" border="0" cellpadding="0" cellspacing="0">
       
       <tr>
                    <th style="color:salmon;" align="left">Select Patient </th>
                    
                    <td>
                        <select required name="patients">
                            <?php
                               include("database.inc");
                            //$id1=$_POST['pat_id'];
                            //echo $catid1;
                            $sql1="select pat_id from patients";
                            $res1=mysql_query($sql1);
                            echo "<option value='select'>Select</option>";
                                 while($row1=mysql_fetch_array($res1))
                            {
                                echo "<option value='$row1[0]'>$row1[0]</option>";
                            }
                          
                            ?>
                        </select>
                    </label></td>
                </tr>
            <tr>
          <td height="15">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
                <tr>
                    <th style="color:salmon;" align="left">Select Staff</th>
                    <td>
                        <select name="staff" required="required">
                            <?php
                               include("database.inc");
                            //$id1=$_POST['pat_id'];
                            //echo $catid1;
                            $sql2="select s_id from staff";
                            $res2=mysql_query($sql2);
                            echo "<option value='select'>Select</option>";
                                 while($row2=mysql_fetch_array($res2))
                            {
                                echo "<option value='$row2[0]'>$row2[0]</option>";
                            }
                          
                            ?>
                        </select>
                    </label></td>
                </tr>
        <tr>
          <td height="15">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
             <tr>
                    <th style="color:salmon;" align="left">Select Date</th>
        			<td>
                    <input align="right" type="text" id="datepicker" name="date1" required="required"/>
                    </td>
       </tr>
       <tr>
          <td height="15">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th style="color:salmon;" align="left">Select Time</th>
          <td><select name="time1" id="time1" required="required">
              <option value="select">Select</option>
              <option value="10:00:00">10:00:00</option>
              <option value="12:00:00">12:00:00</option>
              <option value="14:00:00">14:00:00</option>
           	 <option value="16:00:00">16:00:00</option>
              
            </select>
            </td>
        </tr>
       
        <tr>
          <td height="30">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td align="center" colspan="5" style="padding-bottom: 20px;"><label>
              <input type="submit" value="schedule" name="schedule">
            </label>
          </td>
        </tr>
      </table>
      </br>
      <?php
if(isset($_POST['schedule']))
{
	?>
    <table style="background:black;margin-right:20px;padding-top:15px;padding-bottom:20px;font-size:15px;" width="97%" border="0" cellpadding="0" cellspacing="0">
            <tr>
            <?php
	$pid = $_POST['patients'];
	$sid = $_POST['staff'];
	$date2= $_POST['date1'];
	$date3 = date("Y-m-d", strtotime($date2));
	$time2 = $_POST['time1'];
	include("database.inc");
	$sql1="INSERT INTO visits(pat_id,s_id,visit_date,visit_time) VALUES('$pid','$sid','$date3','$time2')";
	if(mysql_query($sql1))
	{
    ?><td colspan="2" align="center" style="color: green;">Successfully Scheduled</td><?php
	}
	else
	{
    ?><td colspan="2" align="center" style="color: red;">Please try with other date and time options</td><?php
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