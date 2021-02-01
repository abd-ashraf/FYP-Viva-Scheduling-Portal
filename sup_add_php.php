<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['sup_ID'];
	$name=$_POST['sup_name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$dob=$_POST['sup_dob'];

	    // Prepare a select statement
	    $sql = "INSERT INTO user_stu (sup_ID, sup_name, email, pass, stu_dob)
				VALUES ('$id', '$name', '$email', '$pass', '$dob')";

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
