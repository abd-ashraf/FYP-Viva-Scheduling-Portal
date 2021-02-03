<?php
session_start();
if (!isset($_SESSION["email"]) || $_SESSION["user_type"] != 'user_sup')
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
    <title>Student Info</title>

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


    <!-- Added after for table-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
        .table-wrapper {
            width: 90%;
            margin: 30px auto;
            background: #fff;
            padding: 20px;  
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        .table-title .add-new {
            float: right;
            height: 50px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
        .table-title .add-new i {
            margin-right: 4px;
        }
        table.table {
            table-layout: fixed;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table th:last-child {
            width: 100px;
        }
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }    
        table.table td a.add {
            color: #27C46B;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }    
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        table.table .form-control.error {
            border-color: #f50000;
        }
        table.table td .add {
            display: inline;
        }
        </style>
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function(){
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                    '<td><input type="text" class="form-control" name="department" id="department"></td>' +
                    '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
                    '<td>' + actions + '</td>' +
                '</tr>';
                $("table").append(row);     
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function(){
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function()
                                    {
                                        if(!$(this).val())
                                        {
                                            $(this).addClass("error");
                                            empty = true;
                                        } 
                                        else
                                        {
                                            $(this).removeClass("error");
                                        }
                                    }
                            );

                $(this).parents("tr").find(".error").first().focus();
                if(!empty)
                {
                    input.each(function()
                                        {
                                            $(this).parent("td").html($(this).val());
                                        }
                                );         

                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }       
            });

            // Delete row on delete button click
            $(document).on("click", ".delete", function(){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });


        </script>
</head>

<body class="animsition" >
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
                        <li>
                            <a href="schedule-viva.php">
                                <i class="fas fa-chart-bar"></i>Schedule Viva</a>
                        </li>
                        <li>
                            <a href="reschedule-viva.php">
                                <i class="fas fa-chart-bar"></i>Reschedule Viva</a>
                        </li>
                        <li class="active">
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

<?php

    include 'connection.php';
    $conn = OpenCon();
?>

                <!-- BootStrap Table-->
                <div class="container-lg">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-10"><h2><b>Choose a viva to evaluete</b></h2></div>
                                    
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Supervisor ID</th>
                                        <th>Group ID</th>
                                        <th>Reschedule</th>
                                    </tr>
                                </thead>
<?php

    // Prepare a select statement
    $id = $_SESSION['id'];
    $sql="SELECT * FROM viva WHERE supervisor_ID='$id';";

    $result = $conn->query($sql);

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
                        <td>
                            <a class="edit" title="Edit" href="mark_viva.php?id=<?php echo $rows['viva_ID']; ?>" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> 

                        </td>
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
                <div class="container-lg">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-10"><h2><b>Current Evaluations</b></h2></div>
                                    
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Group ID</th>
                                        <th>Supervisor ID</th>
                                        <th>Total Marks</th>
                                        <th>Obtained Marks</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
<?php

    // Prepare a select statement
    $id = $_SESSION['id'];
    $sql="SELECT * FROM evaluations WHERE supervisor_ID='$id';";

    $result = $conn->query($sql);

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

?>

                            </table>
                        </div>
                    </div>
                </div>     
                <!-- END MAIN CONTENT-->
                <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2021 CICADA Tech. All rights reserved. Developed by Abdullah & Abdul Hai (<a href="https://github.com/abd-ashraf/FYP-Viva-Scheduling-Portal" target="_blank">source</a>).</p>
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
