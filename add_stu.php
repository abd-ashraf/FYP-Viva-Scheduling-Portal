<?php

$error = $_GET['error'];

session_start();

if (!isset($_SESSION["email"]) || $_SESSION["user_type"] != 'user_adm')
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
    <title>Add Student</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

</head>
<script src="populate-city.js"></script>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="sup_index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
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
                            <a href="adm_index.php">
                                <i class="fas fa-tachometer-alt"></i>Admin Index Dashboard</a>
                        </li>
                        <li>
                            <a href="stu_infoo.php">
                                <i class="fas fa-address-book"></i>Student Info</a>
                        </li>
                        <li>
                            <a href="add_stu.php">
                                <i class="fas fa-user-plus"></i>Add Student</a>
                        </li>
                        <li>
                            <a href="sup_info.php">
                                <i class="far fa-address-book"></i>Supervisor Info</a>
                        </li>
                        <li>
                            <a href="add_sup.php?error=no-error">
                                <i class="fas fa-user-plus"></i>Add Supervisor</a>
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
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="adm_index.php">
                                <i class="fas fa-tachometer-alt"></i>Admin Index Dashboard</a>
                        </li>
                        <li>
                            <a href="stu_infoo.php">
                                <i class="fas fa-address-book"></i>Student Info</a>
                        </li>
                        <li class="active">
                            <a href="add_stu.php?error=no-error">
                                <i class="fas fa-user"></i>Add Student</a>
                        </li>
                        <li>
                            <a href="sup_info.php">
                                <i class="far fa-address-book"></i>Supervisor Info</a>
                        </li>
                        <li>
                            <a href="add_sup.php">
                                <i class="fas fa-user"></i>Add Supervisor</a>
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
                                                        <a href="adm_index.php">
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
                    <div class="container-fluid">
                        <div class="row">
                            
                            
                            <div class="col-lg-12">
                            <?php
                                if ($error == 'id-exists')
                                {
                                    ?> 
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-danger">Error</span>
                                            Given student ID already exixts in the database.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php
                                }
                                ?>
                            <?php
                                if ($error == 'email-exists')
                                {
                                    ?> 
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-danger">Error</span>
                                                Given student email already exixts in the database.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php
                                }
                                ?>
                            <?php
                                if ($error == 'success')
                                {
                                    ?> 
                                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                                            <span class="badge badge-pill badge-primary">Success</span>
                                            Student record has successfully been added.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php
                                }
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Student</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="stu_add_php.php" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">  
                                                    <label for="stu_ID" class=" form-control-label">Student ID</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="stu_ID" name="stu_ID" placeholder="Enter New Student ID" class="form-control" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">  
                                                    <label for="stu_name" class=" form-control-label">Student Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="stu_name" name="stu_name" placeholder="Enter Student Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" placeholder="Assign email to student" class="form-control" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="pass" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="pass" name="pass" placeholder="Assign a complex password" class="form-control" required>       
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="stu_city" class=" form-control-label">Select City</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select id="locality-dropdown" name="stu_city" id="stu_city" class="form-control" required>
                                                </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="stu_dob" class=" form-control-label">Student DoB</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="stu_dob" name="stu_dob" class="form-control">
                                                </div>
                                            </div>
                                    <div class="card-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-xl" style="margin-right: 20px;">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-xl">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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
