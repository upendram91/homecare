<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Home Care</title>

    <link rel="stylesheet" href="style2.css" type="text/css" />

    <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="selectivizr.js"></script>
    <noscript><link rel="stylesheet" href="fallback.css" /></noscript>
    <![endif]-->

</head>

<body>
<div id="container">
    <form action="login.php" METHOD="POST">
        <div class="login">Password Recovery</div>
        <div class="username-text">
        <?php

            $recoveremail=$_POST['recoveremail'];
            include("database.inc");
            $sql1="select emp_pass from emp_reg where emp_email='$recoveremail'";
            if($res1=mysql_query($sql1))
            {
            if($row1=mysql_fetch_array($res1))
            {
            $password=$row1['emp_pass'];
                include("phpmailer/class.phpmailer.php");
                $body="The Login ID and Password for your account is as follows:\nLogin ID: ".$recoveremail."\nPassword: ".$password;
                $email1=$recoveremail;

                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->Username = "communitypassions@gmail.com";
                $mail->Password = "copassions123";
                $name="No Reply @ Co Passions";
                $mail->FromName = "Password Recovery @ Co Passions";
                $mail->Subject = "Password Recovery @ Co Passions";

                $mail->Body = $body;

                $mail->AddAddress($email1,$name);

                if(!$mail->Send())
                {

                    echo "Server Error! Please Contact Administrator.";
                }
                else
                {
                    echo "Check Your Mail! Continue Login";
                }
            }
            else
            {
            echo "Invalid Email! Try Again";
            }
            }
            else
            {
            echo "Invalid Email! Try Again";
            }
        ?>
        </div>
        <input type="submit" name="submit" value="GO" />
    </form>
</div>
</body>
</html>
