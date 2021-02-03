<?php
    session_start();

    if (!isset($_SESSION["email"]) || $_SESSION["user_type"] != 'user_sup')
    {
        header("location: restricted.html");
    }

    $stu1 = $_POST['stu1'];
    $stu2 = $_POST['stu2'];
    $group_ID = $_POST['group-id'];
    $city = $_POST['city'];

    //ERROR HANDLING!! UNCOMMENT

    if ($stu1 == NULL || $stu2 == NULL || $group_ID == NULL || $city === '0')
    {
        header("location: schedule-viva.php?error=no-input");
        die();
    }
    if ($stu1 == $stu2)
    {
        header("location: schedule-viva.php?error=same-id");
        die();
    }

    include 'connection.php';

    $con = OpenCon();
    $sql1 = "select * from user_stu where stu_ID = $stu1;";
    $result1 = $con->query($sql1);
    $row1 = array();
    $row2 = array();
    if (mysqli_num_rows($result1) == 1)
    {
        $row1 = $result1->fetch_assoc();   
    }
    else {
        header ("location: schedule-viva.php?error=sql-error");
        die();
    }

    $sql2 = "select * from user_stu where stu_ID = $stu2;";
    $con = OpenCon();
    $result2 = $con->query($sql2);
    if (mysqli_num_rows($result2) == 1)
    {
        $row2 = $result2->fetch_assoc();  
    }
    else {
        header ("location: schedule-viva.php?error=sql-error");
        die();
    }
    if ($row1['stu_city'] != $row2['stu_city'])
    {
        header ("location: schedule-viva.php?error=city-mismatch");
        die();
    }
    if ($row1['stu_city'] != $city)
    {
        $stu_city = $row1['stu_city'];
        header ("location: schedule-viva.php?error=wrong-city&stu_city=$stu_city");
        die();
    }
    $sql = "SELECT group_ID FROM user_stu WHERE stu_ID='$stu1';";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['group_ID'];
    if ($id != NULL)
    {
        header ("location: schedule-viva.php?error=viva-exists");
        die();
    }
    $sql = "SELECT group_ID FROM user_stu WHERE stu_ID='$stu2';";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['group_ID'];
    if ($id != NULL)
    {
        header ("location: schedule-viva.php?error=viva-exists");
        die();
    }

    $cities = file_get_contents("cities.json");

    $cities_array = json_decode($cities, true);

    $lat = 0;
    $lon = 0;

    foreach ($cities_array['city'] as $city_center)
    {
        if ($city == strtoupper($city_center['name']))
        {
            $lat = $city_center['lat'];
            $lon = $city_center['lon'];
            break;
        }
    }

    $fast_owned = array(
        array("name"=>"LAHORE", "lat"=>31.582045, "lon"=>74.329376),
        array("name"=>"ISLAMABAD", "lat"=>33.738045, "lon"=>73.084488),
        array("name"=>"KARACHI", "lat"=>24.860966, "lon"=>66.990501),
        array("name"=>"FAISALABAD", "lat"=>31.582045, "lon"=>74.329376),
        array("name"=>"PESHAWAR", "lat"=>34.025917, "lon"=>71.560135)
    );

    $min_city = $city;
    $min_distance = 99999999.99;

    foreach ($fast_owned as $campus)
    {
        $new_distance = twopoints_on_earth($lat, $lon, $campus['lat'], $campus['lon']);
        if ($new_distance < $min_distance)
        {
            $min_distance = $new_distance;
            $min_city = $campus["name"];
        }
    }

    // echo $min_city, ' ', $min_distance, '</br>';

		
	function twopoints_on_earth($latitudeFrom, $longitudeFrom, 
									$latitudeTo, $longitudeTo) 
	{ 
		$long1 = deg2rad($longitudeFrom); 
		$long2 = deg2rad($longitudeTo); 
		$lat1 = deg2rad($latitudeFrom); 
		$lat2 = deg2rad($latitudeTo); 
			
		//Haversine Formula 
		$dlong = $long2 - $long1; 
		$dlati = $lat2 - $lat1; 
			
		$val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2); 
			
		$res = 2 * asin(sqrt($val)); 
			
		$radius = 3958.756; 
			
		return ($res*$radius); 
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
    <title>Viva Assignment</title>

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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg8qzb_ayd85tBny7XTrITBnVyzeTV7_M&callback=initMap"
  type="text/javascript"></script>


    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style type="text/css">
    #map {
        height: 100%;
}

/* Optional: Makes the sample page fill the window. */
#map_container {
    height: 500px;
    width: 500px;
    background-color: green;
}
    </style>
    <script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8,
        });
    }
</script>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Viva Group</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Viva Scheduler</h3>
                                        </div>
                                        <hr>
                                        <form action="assign_viva.php" method="post" novalidate="novalidate">
                                            <div class="col-12">
                                            <div class="alert alert-success" role="alert">
                                                <?php
                                                echo "Nearest FAST Campus from the given location ($city) is <strong>$min_city.</strong> It can be changed as well.";
                                                ?>
                                            </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                        <label for="cc-exp" class="control-label mb-1">Viva Station</label>
                                                        <select name="viva_location" id="" class="form-control bg-dark text-light"> 
                                                            <option value="<?php echo $min_city ?>"> <?php echo $min_city ?> </option>
                                                            <option value="LAHORE">LAHORE</option>
                                                            <option value="KARACHI">KARACHI</option>
                                                            <option value="ISLAMABAD">ISLAMABAD</option>
                                                            <option value="FAISALABAD">FAISALABAD</option>
                                                            <option value="PESHAWAR">PESHAWAR</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div id="map_container" >
                                                <div id="map" class="d-flex justify-content-center">
                                                
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="viva_date" class="control-label mb-1">Viva Date</label>
                                                        <input id="cc-exp" name="viva_date" type="date" class="form-control"
                                                             autocomplete="off" requierd> 
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="viva_time" class="control-label mb-1">Viva Time</label>
                                                        <input id="cc-exp" name="viva_time" type="time" class="form-control"
                                                             autocomplete="off" requierd> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">1st Student ID</label>
                                                        <input id="stuID1" name="stu1" type="text" class="form-control"
                                                             value="<?php echo $stu1 ?>" autocomplete="off" requierd readonly> 
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="stuID2" class="control-label mb-1">2nd Student ID</label>
                                                        <input id="cc-exp" name="stu2" type="text" class="form-control"
                                                            value="<?php echo $stu2 ?>" autocomplete="off" requierd readonly> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                        <label for="cc-exp" class="control-label mb-1">Group ID</label>
                                                        <input id="cc-exp" name="group_ID" type="text" class="form-control"
                                                            value="<?php echo $group_ID ?>" autocomplete="off" requierd readonly> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="btn btn-lg btn-info btn-block" type="submit" class="col-12" value="Schedule Viva">
                                            </div>
                                        </form>
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
