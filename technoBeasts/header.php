<?php
session_start();
// Check if session is not set
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

$userId=$_SESSION['userid'];
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Dashboard</title>

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- <script><?//php echo "alert($ses)";?></script> -->
    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3></span></h3>
        </div>

        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(img/user1.jpg)"></div>
                <h4><?php
                require_once('php/conn.php');
                $result = $conn->query("SELECT username FROM users WHERE userid = '$userId'");
                $row = $result->fetch_assoc();
                echo $row['username']
                ?></h4>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                        <a href="index.php" class="active">
                            <span class="las la-home"></span>
                            <small>Home</small>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="myaccount.php">
                            <span class="las la-user-alt"></span>
                            <small>Profile</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-users"></span>
                            <small>About Us</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-phone"></span>
                            <small>Contact Us</small>
                        </a>
                    </li> -->

                </ul>
            </div>
        </div>
    </div>

    <div class="main-content ">

        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>

                <div class="header-menu">

                    <div class="user">
                        <div class="bg-img" style="background-image: url(img/user1.jpg)"></div>

                        <form action="" method="post">
                               <button name="logout" class="btn btn-danger "><span class="las la-power-off" style="font-size:16px;"></span>Logout</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </header>


        <main>

            <div class="page-header">
                <h1>Dashboard</h1>
                <small>Home / Dashboard</small>
            </div>