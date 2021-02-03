<!DOCTYPE html>
<?php
    session_start();

    if (!isset($_SESSION["email"]) || $_SESSION["user_type"] != 'user_sup')
    {
        header("location: restricted.html");
    }

    include 'connection.php';
    $conn = OpenCon();

?>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Viva Scheduler</title>

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
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<script src="populate-city.js"></script>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <!-- <a class="logo" href="sup_index.html">
                            <img src="dash-logo.png" alt="cicada" />
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
                        <li class="has-sub">
                            <a class="js-arrow" href="sup_index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="schedule-viva.php.php">
                                <i class="fas fa-chart-bar"></i>Schedule Viva</a>
                        </li>
                        <li>
                            <a href="stu_info.php">
                                <i class="fas fa-address-card"></i>Student Info</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="sup_index.php">
                    <img src="dash-logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="sup_index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="schedule-viva.php">
                                <i class="fas fa-chart-bar"></i>Schedule Viva</a>
                        </li>
                        <li>
                            <a href="reschedule-viva.php">
                                <i class="fas fa-chart-bar"></i>Reschedule Viva</a>
                        </li>
                        <li>
                            <a href="evaluations.php">
                                <i class="fas fa-chart-bar"></i>Evaluations</a>
                        </li>
                        <li>
                            <a href="stu_info.php">
                                <i class="fas fa-address-card"></i> Student Info</a>
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
                                                    <a href="sup_index.php">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="./schedule-viva.php">
                                                        <i class="zmdi zmdi-calendar"></i>Scheduler</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="stu_info">
                                                        <i class="zmdi zmdi-collection-item"></i>View Students</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
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
                <div class="col-lg-12">
                <?php
                if (isset($_GET['error']))
                {
                    if ($_GET['error'] == 'no-input')
                    {
                    ?>
                        <div class="row col-12">
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                <span class="badge badge-pill badge-danger">Error!</span>
                                                All fields are required.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>    
                        </div>
                    <?php
                    }
                    if($_GET['error'] == 'sql-error'){
                    ?>
                        <div class="row col-12">
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                <span class="badge badge-pill badge-danger">Error!</span>
                                                Student record not found.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>   
                        </div>
                    <?php
                    }
                    if($_GET['error'] == 'same-id'){
                        ?>
                            <div class="row col-12">
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                    <span class="badge badge-pill badge-danger">Error!</span>
                                                    Student ID can't be same.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>   
                            </div>
                        <?php
                        }
                    if($_GET['error'] == 'city-mismatch'){
                        ?>
                            <div class="row col-12">
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                    <span class="badge badge-pill badge-danger">Error!</span>
                                                    Students study center don't match. Please ensure students in a group have same study centers assigned.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>   
                            </div>
                        <?php
                        }
                    if($_GET['error'] == 'wrong-city'){
                        ?>
                            <div class="row col-12">
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                    <span class="badge badge-pill badge-danger">Error!</span>
                                                    Incorrect city selected. Students syudy center is in <?php echo $_GET['stu_city'] ?>.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>   
                            </div>
                        <?php
                        }
                    if($_GET['error'] == 'viva-exists'){
                        ?>
                            <div class="row col-12">
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                    <span class="badge badge-pill badge-danger">Error!</span>
                                                    The selected student's viva has already been scheduled.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>   
                            </div>
                        <?php
                        }
                    
                } ?>
                                <div class="card">
                                    <div class="card-header">Viva Group</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Enter Student's Info</h3>
                                        </div>
                                        <hr>
                                        <form action="grouping.php" method="post" novalidate="novalidate">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">1st Student ID</label>
                                                        <input id="cc-exp" name="stu1" type="text" class="form-control"
                                                             placeholder="Student ID" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">2nd Student ID</label>
                                                        <input id="cc-exp" name="stu2" type="text" class="form-control"
                                                             placeholder="Student ID" autocomplete="off" requierd> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                        <label for="cc-exp" class="control-label mb-1">Group ID</label>
                                                        <input id="cc-exp" name="group-id" type="text" class="form-control"
                                                            placeholder="Group ID" autocomplete="off" requierd> 
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <select id="locality-dropdown" name="city" class="form-control bg-dark text-light">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="btn btn-lg btn-info btn-block" type="submit" class="col-12" value="Make Group">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <div class="container-fluid">
                        <div class="row">
                            <h3 style="margin-left: 30px;" class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>Students Info</h3>
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th class="text-right">DOB</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        // Prepare a select statement
                                        $sql = "SELECT * FROM user_stu";

                                        $result = $conn->query($sql);

                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($rows = $result->fetch_assoc())
                                            {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $rows['stu_ID']; ?></td>
                                                            <td><?php echo $rows['stu_name']; ?></td>
                                                            <td><?php echo $rows['stu_city']; ?></td>
                                                            <td class="text-right"><?php echo $rows['stu_dob']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                    <?php
                                            }
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
