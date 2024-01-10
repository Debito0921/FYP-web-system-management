<?php
    include "config.php";

    echo "<script>console.log(".$_SESSION['email'].");</script>";
    // Check user login or not
    if(!isset($_SESSION['email'])){
        header('Location: login.php');
    }
    
    // logout
    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <title> Homepage </title>
        <link rel="stylesheet"  href ="css/menu.css"/>
        <script src="css/menu.js"></script>
    </head>
    <body>
    <header>
        <h1><img src="images/MMUnewLogo.png" alt="MMU" width = "270" height = "70"/></h1>
        <hr>
        <h2> Welcome to FYP Management System </h2>
        <hr>
    </header>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="homepage.php"><?php echo $_SESSION['name'] ?></a>
            <br/>
            <a href="proposal.html">Proposal</a>
            <a href="planning.html">Planning</a>
            <a href="project.html">Project Assignment</a>
            <a href="meeting.html">Meeting</a>
            <a href="tracking.html">Progress Tracking</a>
            <a href="result.html">Result</a>

            <a href="login.php">Logout</a>
        </div>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

    </body>
</html>