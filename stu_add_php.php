<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['stu_ID'];
	$name=$_POST['stu_name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$city=$_POST['stu_city'];
	$dob=$_POST['stu_dob'];

	    // Prepare a select statement
	    $sql = "INSERT INTO user_stu (stu_ID, stu_name, email, pass, stu_city, stu_dob)
				VALUES ('$id', '$name', '$email', '$pass', '$city', '$dob')";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	echo "Data Added Successfully";
	    	//header("location:stu_info.php");
	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
