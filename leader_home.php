<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Co-Passions</title>
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
if($_SESSION['userpos']=="admin")
{
    header("location:admin_home.php");
}
else if($_SESSION['userpos']=="member")
{
    header("location:member_home.php");
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
                <li><a href="view_list_passions_leader.php">View List of Passions</a></li>
                <li><a href="join_cop_leader.php">Join COP</a></li>
                <li><a href="upload_documents_kmp_leader.php">Upload Documents to KMP</a></li>
                <li><a href="view_all_cop_leader.php">View All COP Members</a></li>
                <li><a href="approve_new_cop_leader.php">Approve/Reject New COP</a></li>
                <li><a href="create_events_leader.php">Create Events</a></li>
                <li><a href="create_new_cop_leader.php">Create New COP</a></li>
            </ul>
            <div class="templatemo_menu_bottom"></div>
        </div>


    </div>

    <div id="templatemo_rightcolumn">
        <div id="templatemo_banner">
            <h1>Welcome to Leader Panel</h1>
        </div>
        <h3 align="center" style="background:black;margin-right:18px;padding-top:15px;">Event Notifications</h3>
        <br />
        <form name="form1" method="post" action="#">
            <table style="background:black;margin-right:20px;padding-top:15px;padding-left:20px;padding-right:20px;padding-bottom:20px;font-size:15px;" width="97%" border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <th align='center' colspan='5' style='padding-top: 20px;padding-bottom: 20px;color: aqua;'>Upcoming Events</th>
                </tr>
                <?php
                $counter=0;
                include("database.inc");
                $user=$_SESSION['useremail'];
                $sql="select DISTINCT * from cop_join_req where emp_email='$user' AND status='Approved'";
                $res=mysql_query($sql);
                $count=mysql_num_rows($res);
                if($count!=0)
                {
                    echo "<tr>
            <td align='center' style='padding-top: 10px;padding-bottom: 10px;'>Category</td>
            <td align='center' style='padding-top: 10px;padding-bottom: 10px;'>Sub-Category</td>
            <td align='center' style='padding-top: 10px;padding-bottom: 10px;'>Event Name </td>
            <td align='center' style='padding-top: 10px;padding-bottom: 10px;'>Event Place </td>
            <td align='center' style='padding-top: 10px;padding-bottom: 10px;'>Event Date/Time </td>
            </tr>";
                    While($data=mysql_fetch_array($res))
                    {
                        $cat=$data['cat_name'];
                        $sql1="select * from  cop_events where cat_name='$cat'";
                        $res1=mysql_query($sql1);
                        $count1=mysql_num_rows($res1);
                        if($count1!=0)
                        {
                            $data1=mysql_fetch_array($res1);
                            $cat1=$data1['cat_name'];
                            $subcat1=$data['sub_cat_name'];
                            $t=$data1['event_date'];
                            $time=strtotime($t);
                            $date=date("j-n-Y");
                            $t1=strtotime($date);
                            echo "
                    <tr>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$cat1</td>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$subcat1</td>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$data1[event_name]</td>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$data1[event_place]</td>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$data1[event_date]/$data1[event_time]</td>
                    </tr>";
                            $counter++;
                        }
                    }
                    if($counter==0)
                    {
                        echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No Upcoming Events</td>
    </tr>";
                    }
                }
                else
                {
                    echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No Upcoming Events</td>
    </tr>";
                }

                ?>
            </table>
    </div>
</div>
<div align="center"><br><br><img src="images/right_image.jpg"></div>
</body>
</html>