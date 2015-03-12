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
<div id="templatemo_container">

    <div id="templatemo_leftcolumn" align="left">
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
                <li><a href="member_home.php">Home</a></li>
                <li><a href="search_by_date.php">Search By Date</a></li>
                <li><a href="search_by_patient.php">Search By Patient</a></li>                
            </ul>
            <div class="templatemo_menu_bottom"></div>
        </div>


    </div>

    <div id="templatemo_rightcolumn">
        <div id="templatemo_banner">
            <h1><marquee behavior="scroll" direction="left">Welcome to Staff Panel</marquee></h1>
        </div>
        
        <br />
        <form name="form1" method="post" action="#">
            <table style="background:black;margin-right:20px;padding-top:15px;padding-left:20px;padding-right:20px;padding-bottom:20px;font-size:15px;" width="97%" border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <th align='center' colspan='5' style='padding-top: 20px;padding-bottom: 20px;color: aqua;'>Upcoming Appointments</th>
                </tr>
                <?php
                $counter=0;
                include("database.inc");
                $user=$_SESSION['useremail'];
                $sql="select p.pat_id, p.pat_name, p.pat_add, v.visit_date, v.visit_time from visits v, staff s, patients p where s.s_id = v.s_id and p.pat_id = v.pat_id and s.s_email = '$user'";
                $res=mysql_query($sql);
                $count=mysql_num_rows($res);
                if($count!=0)
                {
                    echo "<tr>
            <td align='center' style='color:salmon;padding-top: 10px;padding-bottom: 10px;'>Date</td>
            <td align='center' style='color:salmon;padding-top: 10px;padding-bottom: 10px;'>Time</td>
            <td align='center' style='color:salmon;padding-top: 10px;padding-bottom: 10px;'>Patient Name</td>
            <td align='center' style='color:salmon;padding-top: 10px;padding-bottom: 10px;'>Patient Address</td>
            </tr>";
                    While($data=mysql_fetch_array($res))
                    {
                       
                           // $data1=mysql_fetch_array($res1);
                            $pat_name=$data['pat_name'];
                            $pat_id=$data['pat_id'];							
                            $pat_addr=$data['pat_add'];
							$v_time = $data['visit_time'];
							$v_date = $data['visit_date'];
                           // $time=strtotime($t);
                           // $date=date("j-n-Y");
                           // $t1=strtotime($date);
                            echo "
                    <tr>
                    <td align='center' style='color:white;padding-top: 8px;padding-bottom: 8px;'>$v_date</td>
                    <td align='center' style='color:white;padding-top: 8px;padding-bottom: 8px;'>$v_time</td>
                    <td align='center' style='color:white;padding-top: 8px;padding-bottom: 8px;'><a style='color:aqua; text-decoration:none;' href=\"pat_details.php?id=$pat_id\">$pat_name</td>
                    <td align='center' style='color:white;padding-top: 8px;padding-bottom: 8px;'>$pat_addr</td>
                    </tr>";
                            $counter++;
                        
                    }
                    if($counter==0)
                    {
                        echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No Upcoming Appointments</td>
    </tr>";
                    }
                }
                else
                {
                    echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No Upcoming Appointments</td>
    </tr>";
                }

                ?>
            </table>
            </br>
            </br>            
              <input type="button" value="Print This Page" onClick="window.print()">
    </form>
    </div>
</div>
</body>
</html>