<?php
include("database.inc");
$useremail1 = $_POST['adminusername'];
$password1 = $_POST['adminpassword'];
$table_name = "staff";

$query = "select * from $table_name where s_email='$useremail1'";
    if($res = mysql_query($query))
    {

        if($row = mysql_fetch_array($res))
        {

            if($row['s_password'] == $password1)
                {
                    if($row['isadmin']=='admin')
                    {
                    session_start();
                    $_SESSION['username1'] = $row['s_name'];
                    $_SESSION['useremail'] = $row['s_email'];
                    $_SESSION['userpos'] = $row['isadmin'];
                    header("location:admin_home.php");
                    }
                    else if($row['isadmin']=='staff')
                    {
                    session_start();
                    $_SESSION['username1'] = $row['s_name'];
                    $_SESSION['useremail'] = $row['s_email'];
                    $_SESSION['userpos'] = $row['isadmin'];
                    header("location:member_home.php");
                    }
                }
                else
                {
                    session_start();
                    header("location:login.php?error=invalid");
                }
        }
        else
        {
            session_start();
            header("location:login.php?error=invalid");
        }
    }
    else
    {
        session_start();
        header("location:login.php?error=invalid");
    }
?>