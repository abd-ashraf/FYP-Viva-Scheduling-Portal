<?php
session_start();
if (!isset($_SESSION["email"]))
{
    header("location: restricted.html");
}
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
            <div style="margin-top: 20px;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Reschedule</strong> Viva
                                    </div>
                                    <div class="card-body card-block">


<?php

    include 'connection.php';
    $conn = OpenCon();

	$id = "$_GET[id]";
	    	?>
                <form action="edit_viva_php.php" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">  
                            <label for="stu_ID" class=" form-control-label">Viva ID</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="stu_ID" name="id" value="<?php echo $id; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row form-group">
                        <div class="col col-md-3">  
                            <label for="stu_ID" class=" form-control-label">Viva Date</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="stu_ID" name="date" class="form-control" required>
                        </div>
                    </div>
                    <br>

                    <div class="row form-group">
                        <div class="col col-md-3">  
                            <label for="stu_name" class=" form-control-label">Viva Time</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="time" id="stu_name" name="time" class="form-control" required>
                        </div>
                    </div>
                    <br>

            <div class="card-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-xl" style="margin-right: 20px;">
                    <i class="fa fa-dot-circle-o"></i> Update
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