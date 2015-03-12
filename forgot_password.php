<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Home Care</title>

    <link rel="stylesheet" href="style1.css" type="text/css" />

    <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="selectivizr.js"></script>
    <noscript><link rel="stylesheet" href="fallback.css" /></noscript>
    <![endif]-->

</head>

<body>
<div id="container">
    <form action="forgot_password_action.php" METHOD="POST">
        <div class="login">Password Recovery</div>
        <div class="username-text">Enter your Registered Email ID:</div>
        <div class="username-field">

            <input type="email" name="recoveremail" value="<?php if(isset($_REQUEST['error'])){echo "Invalid Username";}?>" required="required" />
        </div>
        <input type="submit" name="submit" value="GO" />
    </form>
</div>
</body>
</html>
