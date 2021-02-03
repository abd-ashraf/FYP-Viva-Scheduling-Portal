<?php

include 'connection.php';
$con = OpenCon();

session_start();

if (!isset($_SESSION["email"]) || $_SESSION["user_type"] != 'user_stu')
{
    header("location: restricted.html");
}

// echo $_SESSION["user_type"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>View Viva</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <!-- <a class="logo" href="sup_index.html">
                            <img src="dash-logo.png" alt="CoolAdmin" />
                        </a> -->
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="stu_index.php">
                                <i class="fas fa-tachometer-alt"></i>Student Dashboard</a>
                        </li>
                        <li>
                            <a href="stu_upd_profile.php?id=<?php echo $_SESSION['id']; ?>">
                                <i class="fas fa-address-book"></i>Update Profile</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="dash-logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="stu_index.php">
                                <i class="fas fa-tachometer-alt"></i>Student Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="./view-viva.php">
                                <i class="fas fa-calendar-check"></i>View Viva</a>
                        </li>
                        <li>
                            <a href="stu_upd_profile.php?id=<?php echo $_SESSION['id']; ?>">
                                <i class="fas fa-address-book"></i>Update Profile</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button d-flex justify-content-end">
                                <div style="margin-left: 50rem" class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                <?php
                                                echo $_SESSION["name"];
                                                ?>
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="sup_index.php">
                                                        <?php
                                                        echo $_SESSION["name"];
                                                        ?>
                                                        </a>
                                                    </h5>
                                                    <span class="email">
                                                    <?php
                                                        echo $_SESSION["email"];
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="stu_index.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="./view-viva.php">
                                                        <i class="zmdi zmdi-calendar"></i>View Viva</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="./logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
        <!-- MAIN CONTENT-->
        <div class="main-content">
                

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 style="margin-left: 30px;" class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>Viva Info</h3>
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Supervisor ID</th>
                                                <th>Group ID</th>

                                            </tr>
                                        </thead>
                                        <?php

                                        // Prepare a select statement
                                        $group_ID = $_SESSION['group_ID'];
                                        $sql = "SELECT * FROM viva WHERE group_ID=$group_ID;";
                                        $result = $con->query($sql);

                                        if ($group_ID != NULL ){
                                            if(mysqli_num_rows($result) > 0)
                                        {
                                            while($rows = $result->fetch_assoc())
                                            {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $rows['viva_ID']; ?></td>
                                                            <td><?php echo $rows['viva_location']; ?></td>
                                                            <td><?php echo $rows['viva_date']; ?></td>
                                                            <td><?php echo $rows['viva_time']; ?></td>
                                                            <td><?php echo $rows['supervisor_ID']; ?></td>
                                                            <td><?php echo $rows['group_ID']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                    <?php
                                            }
                                        }
                                        }
                                        else { ?>
                                            <h3 class="text-secondary">Your viva hasn't been scheduled yet.</h3> <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        <div class="container-fluid">
                        <div class="row">
                            <h3 style="margin-left: 30px;" class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>Evaluation</h3>
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Group ID</th>
                                                <th>Supervisor ID</th>
                                                <th>Total Marks</th>
                                                <th>Obtained Marks ID</th>
                                                <th>Date</th>

                                            </tr>
                                        </thead>
                                        <?php

                                        $group_ID = $_SESSION['group_ID'];
                                        $sql = "SELECT * FROM evaluations WHERE group_ID='$group_ID';";
                                        $result = $con->query($sql);

                                        if ($group_ID != NULL ){
                                            if(mysqli_num_rows($result) > 0)
                                            {
                                            while($rows = $result->fetch_assoc())
                                            {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $rows['evaluation_ID']; ?></td>
                                                            <td><?php echo $rows['group_ID']; ?></td>
                                                            <td><?php echo $rows['supervisor_ID']; ?></td>
                                                            <td><?php echo $rows['total_marks']; ?></td>
                                                            <td><?php echo $rows['obtained_marks']; ?></td>
                                                            <td><?php echo $rows['evaluated_on']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                    <?php
                                            }
                                        }
                                        }
                                        else { ?>
                                            <h3 class="text-secondary">This viva is yet to be evaluated.</h3> <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2021 CICADA Tech. All rights reserved. Developed by Abdullah & Abdul Hai (<a href="https://github.com/abd-ashraf/FYP-Viva-Scheduling-Portal" target="_blank">source</a>).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
