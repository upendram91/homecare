<?php
session_start();
if(isset($_SESSION['username1']))
    unset($_SESSION['username1']);
if(isset($_SESSION['useremail']))
    unset($_SESSION['useremail']);
if(isset($_SESSION['userpos']))
    unset($_SESSION['userpos']);
header("location:index.html");
?>
