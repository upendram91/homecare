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
            <h1><marquee behavior="scroll" direction="left">Patient Details</marquee></h1>
        </div>
      
        <form name="form1" method="get" action="pat_details.php">
            <table style="background:black;margin-right:20px;padding-top:15px;padding-left:20px;padding-bottom:20px;padding-right:20px;font-size:15px;" width="97%" border="1" cellpadding="0" cellspacing="0">
            <tr>
                    <th align='center' colspan='5' style='padding-top: 20px;padding-bottom: 20px;color: aqua;'>Patient Demographics</th>
                </tr>
                <?php
                include('database.inc');
                $emp_email=$_SESSION['username1'];
				//$pat_id=$_POST['id'];
				//$pat_id = $_POST['id'];
				$uri =  $_SERVER['REQUEST_URI']; //it will print full url
				$urlArray = explode('=', $uri); //convert string into array with explode
				$id = $urlArray[1];
				$sql="select * from patients where pat_id='$id'";
                $data=mysql_query($sql);
                while($res=mysql_fetch_array($data))
                {
                    ?>
                    <tr>
                        <td style="padding-bottom: 10px;padding-top: 10px; padding-left: 20px"><?php
                            $pat_name=$res['pat_name'];
                            echo "Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:";
                            echo $pat_name;
                            echo "</br></br>";
                            echo "Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ";
							echo $res['pat_add'];
							echo "</br></br>";
                            echo "Date of Birth&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:";
							echo $res['pat_dob'];
                            echo "</br></br>";							
							echo "History&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:";
							echo $res['pat_history'];
                            echo "</br></br>";							
							echo "Phone Number &nbsp;&nbsp;&nbsp;:";
							echo $res['pat_phone'];
                            ?>
                        </td>
                    </tr>
                    <?php

                }

                ?>
                
            </table>
            </br>
            </br>
            <table style="background:black;margin-right:20px;padding-top:15px;padding-left:20px;padding-right:20px;padding-bottom:20px;font-size:15px;" width="97%" border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <th align='center' colspan='5' style='padding-top: 20px;padding-bottom: 20px;color: aqua;'>Interventions To Be Done</th>
                </tr>
			<?php
			$counter=0;
            $sql="select i.int_desc from interventions i where i.int_id in(select di.int_id from diag_int di, diagnosis d where di.diag_id = d.diag_id and d.diag_id in(select pd.diag_id from pat_diag pd, patients p where pd.pat_id = p.pat_id and p.pat_id = '$id'));";
			$data1=mysql_query($sql);
            $count1=mysql_num_rows($data1);
			if($count1!=0)
                {
                    While($data2=mysql_fetch_array($data1))
                    {
                       
                            $i_desc=$data2['int_desc'];
                                                     
                            echo "
                    <tr>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$i_desc</td>
                    </tr>";
                            $counter++;
                        
                    }
                    if($counter==0)
                    {
                        echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No interventions</td>
    </tr>";
                    }
                }
                else
                {
                    echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No interventions</td>
    </tr>";
                }

                ?>
            </table>
        </br>
        </br>
        <table style="background:black;margin-right:20px;padding-top:15px;padding-left:20px;padding-right:20px;padding-bottom:20px;font-size:15px;" width="97%" border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <th align='center' colspan='5' style='padding-top: 20px;padding-bottom: 20px;color: aqua;'>Medications To Be Given</th>
                </tr>
			<?php
			$counter=0;
            $sql="select m.med_desc from medications m where m.med_id in(select dm.med_id from diag_med dm, diagnosis d where dm.diag_id = d.diag_id and d.diag_id in(select pd.diag_id from pat_diag pd, patients p where pd.pat_id = p.pat_id and p.pat_id = '$id'))";
			$res1=mysql_query($sql);
            $count2=mysql_num_rows($res1);
			if($count2!=0)
                {
                    While($res2=mysql_fetch_array($res1))
                    {
                       
                            $m_desc=$res2['med_desc'];
                                                     
                            echo "
                    <tr>
                    <td align='center' style='padding-top: 8px;padding-bottom: 8px;'>$m_desc</td>
                    </tr>";
                            $counter++;
                        
                    }
                    if($counter==0)
                    {
                        echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No medications</td>
    </tr>";
                    }
                }
                else
                {
                    echo "<tr>
    <td align='center' colspan='5' style='padding-top: 10px;padding-bottom: 10px;color: red;'>No medications</td>
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