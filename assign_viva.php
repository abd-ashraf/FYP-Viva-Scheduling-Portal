<?php
session_start();

include 'connection.php';
$con = OpenCon();

include 'mail.php';

$stu1 = $_POST['stu1'];
$stu2 = $_POST['stu2'];
$supID = $_SESSION['id'];
$date = $_POST['viva_date'];
$time = $_POST['viva_time'];
$viva_location = $_POST['viva_location'];
$group_ID = $_POST['group_ID'];

send_mail($group_ID, $stu1, $stu2, $viva_location, $date, $time, $con);

$sql = "insert into viva (viva_location, viva_date, viva_time, supervisor_ID, group_ID) VALUES('$viva_location', '$date', '$time', '$supID', '$group_ID');";

$result = $con->query($sql);

$sql = "SELECT AUTO_INCREMENT
FROM information_schema.TABLES
WHERE TABLE_SCHEMA = 'fyp_viva_scheduling'
AND TABLE_NAME = 'viva'";

$result = $con->query($sql);

$data = $result->fetch_assoc();

$viva_ID = $data['AUTO_INCREMENT'] - 1;

$sql = "INSERT INTO stu_group (group_ID, study_center, supervisor_ID, viva_ID) VALUES ('$group_ID', '$viva_location', '$supID', '$viva_ID');";

$result = $con->query($sql);

$sql = "UPDATE user_stu SET group_ID='$group_ID', supervisor_ID='$supID' WHERE stu_ID='$stu1';";

echo $sql, '</br>';

$result = $con->query($sql);

$sql = "UPDATE user_stu SET group_ID='$group_ID', supervisor_ID='$supID' WHERE stu_ID='$stu2';";

echo $sql, '</br>';

$result = $con->query($sql);

echo $sql, '</br>';

echo $stu1, $stu2, $date, $time, $viva_location, $group_ID, '</br>';

echo $_SESSION['id'], '</br>';

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
	<title>Viva Confirmation</title>

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
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">

								<div class="card">
									<div class="card-header">
										<strong class="card-title">Notice</strong>
									</div>
									<div class="card-body">
										<div class="alert alert-primary" role="alert">
											The viva has successfullt been scheduled on <strong> <?php echo $date, ' ', $time, '. '; ?> </strong> Email Notification has been sent to all concerning parties.
										</div>
										<div class="alert alert-dark" role="alert">
                                            <h3 style="text-align: center;">Viva details are as follow</h3>
                                            <strong>Location: </strong> <?php echo $viva_location, '</br>'; ?>
                                            <strong>Group ID: </strong> <?php echo $group_ID, '</br>'; ?>
                                            <strong>Supervisor ID: </strong> <?php echo $supID, '</br>'; ?>
                                            <strong>1st Student ID: </strong> <?php echo $stu1, '</br>'; ?>
                                            <strong>2nd Student ID: </strong> <?php echo $stu2, '</br>'; ?>
                                            <strong>Date: </strong> <?php echo $date, '</br>'; ?>
                                            <strong>Time: </strong> <?php echo $time, '</br>'; ?>
                                            
										</div>
									</div>
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
		<!-- END PAGE CONTAINER-->

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
