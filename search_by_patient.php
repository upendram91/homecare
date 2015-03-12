<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Homecare</title>
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
            <div class="title"><span>Homecare</span></div>
            <div class="tagline"><br />Help at your door step...</div>
        </div>
        <div id="templatemo_search">
            <br /><h2>Welcome <?php echo $_SESSION['username1']; ?>!</h2>
            <a href="admin_logout.php" style=" position: relative; text-decoration: none; font-size: 15px;">Logout</a>
        </div>

        <div id="templatemo_menu">
            <div class="templatemo_menu_top"></div>
            <ul>
                 <li><a href="member_home.php">Home</a></li>
                <li><a href="search_by_date.php">Search By Date</a></li>
				<li><a href="search_by_patient.php">Search By Patient</a></li>
            </ul>
            <div class="templatemo_menu_bottom"></div>
        </div>


    </div>

    <div id="templatemo_rightcolumn">
        <div id="templatemo_banner">
            <h1><marquee behavior="scroll" direction="left">Search by Patient</marquee></h1>
        </div>
        <br />
        <form id="form1" method="post" action="<?PHP $_SERVER['PHP_SELF']; ?>">
            <table align="center" style="background:black;margin-right:20px;padding-top:15px;padding-left:20px;font-size:15px;" width="97%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                
                </tr>
                <tr>
                    <td align="right" style="padding-right: 30px;padding-top: 20px;padding-bottom: 10px;">Select Patient</td>
                    <td>
                        <select name="patients">
                            <?php
                               include("database.inc");
                            //$id1=$_POST['pat_id'];
                            //echo $catid1;
                            $sql2="select pat_name from patients";
                            $res2=mysql_query($sql2);
                            echo "<option value='select'></option>";
                                 while($row2=mysql_fetch_array($res2))
                            {
                                echo "<option value='$row2[0]'>$row2[0]</option>";
                            }
                          
                            ?>
                        </select>
                    </label></td>
                </tr>
                 <tr>
                    <td align="right" style="padding-right: 30px;padding-top: 20px;padding-bottom: 10px;">Select Date</td>
                    <td>
                        <select name="visitdate">
                            <?php
                               include("database.inc");
                            //$id1=$_POST['pat_id'];
                            //echo $catid1;
                            $sql3="select distinct visit_date from visits";
                            $res3=mysql_query($sql3);
                            echo "<option value='select'></option>";
                                 while($row3=mysql_fetch_array($res3))
                            {
                                echo "<option value='$row3[0]'>$row3[0]</option>";
                            }
                          
                            ?>
                        </select>
                    </label></td>
                </tr>
                <tr>
                    <td align="right" style="padding-right: 30px;padding-top: 20px;padding-bottom: 10px;">Select Time</td>
                    <td>
                        <select name="visittime">
                            <?php
                               include("database.inc");
                            //$id1=$_POST['pat_id'];
                            //echo $catid1;
                            $sql4="select distinct visit_time from visits";
                            $res4=mysql_query($sql4);
                            echo "<option value='select'></option>";
                                 while($row4=mysql_fetch_array($res4))
                            {
                                echo "<option value='$row4[0]'>$row4[0]</option>";
                            }
                          
                            ?>
                        </select>
                    </label></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-bottom: 20px;" align="center"><label>
                        <input type="submit" value="search" name="search">
                    </label></td>
                </tr>
            </table>
            </br>
            </br>
            
			<?php
			if(isset($_POST['patients']))
			{
				if(isset($_POST['visitdate']))
				{
					?>
                    <table style="background:black;margin-right:20px;padding-top:15px;padding-left:20px;padding-right:20px;padding-bottom:20px;font-size:15px;" width="97%" border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <th align='center' colspan='5' style='padding-top: 20px;padding-bottom: 20px;color: aqua;'>Staff Visting </th>
                </tr>
			<?php
				include("database.inc");
             $pat_name = $_POST['patients'];
			$visitdate = $_POST['visitdate'];
			$visittime = $_POST['visittime'];
			$name=$_SESSION['username1'];
			$sql4="select s.s_name,s.s_phone from staff s where s.s_id in (select v.s_id from visits v where v.pat_id in (select pat_id from patients where pat_name = '$pat_name')and 	
			 	v.visit_date='$visitdate' and v.visit_time='$visittime')";
             $res4=mysql_query($sql4);
			 $count=mysql_num_rows($res4);
               $counter=0;
			    if($count!=0)
                {
                    echo "<tr>
            <td align='center' style='padding-top: 10px;padding-bottom: 10px;'>Name</td>
            <td align='center' style='padding-top: 10px;padding-bottom: 10px;'>Contact</td>
            </tr>";
                    While($data=mysql_fetch_array($res4))
                    {
                       
                           // $data1=mysql_fetch_array($res1);
                            $s_name=$data['s_name'];
                            $s_phone=$data['s_phone'];
							echo "
                    <tr>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$s_name</td>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$s_phone</td>
                    </tr>";
                            $counter++;
                        
                    }
                    if($counter==0)
                    {
                        echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No appointment is scheduled for patient on this day</td>
    </tr>";
                    }
                }
				
                else
                {
                    echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No appointment is scheduled for patient on this day</td>
    </tr>";
                }
				}
				
			}
			
                ?>	
        </table>
        </form>
		
    </div>
</div>
</body>
</html>