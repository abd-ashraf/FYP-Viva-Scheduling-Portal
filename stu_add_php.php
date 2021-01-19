<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST[stu_ID];
	$name=$_POST[stu_name];
	$city=$_POST[stu_city];

	    // Prepare a select statement
	    $sql = "INSERT INTO user_stu (stu_ID, stu_name, stu_city)
				VALUES ('$id', '$name', '$city')";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	header("location:stu_info.php");
	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
