<?php

    // $stu1 = $_POST['stu1'];
    // $stu2 = $_POST['stu2'];
    // $group_ID = $_POST['group-id'];
    $city = $_POST['city'];

    // echo $stu1, $stu2, $group_ID, $city;

    // if ($stu1 == NULL || $stu2 == NULL || $group_ID == NULL || $city == 0)
    // {
    //     header ("location: schedule-viva.php?error=no-input");
    // }

    // include 'connection.php';

    // $con = OpenCon();
    // $sql = "select * from user_stu where stu_ID = $stu1 or stu_ID = $stu2;";
    // $result = $con->query($sql);
    // if (mysqli_num_rows($result) >= 1)
    // {

    // }
    // else {
    //     header ("location: schedule-viva.php?error=sql-error");
    // }

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

    echo $min_city, ' ', $min_distance, '</br>';

		
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

	// // latitude and longitude of Two Points 
	// $latitudeFrom = 19.017656 ; 
	// $longitudeFrom = 72.856178; 
	// $latitudeTo = 40.7127; 
	// $longitudeTo = -74.0059; 
		
	// // Distance between Mumbai and New York 
	// print_r(twopoints_on_earth( $latitudeFrom, $longitudeFrom, 
	// 				$latitudeTo, $longitudeTo).' '.'miles'); 

?>