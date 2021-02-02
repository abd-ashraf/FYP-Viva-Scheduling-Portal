<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['sup_ID'];
	$name=$_POST['sup_name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$dob=$_POST['sup_dob'];

	    // Prepare a select statement
	    $sql = "INSERT INTO user_sup (sup_ID, sup_name, email, pass, sup_dob)
				VALUES ('$id', '$name', '$email', '$pass', '$dob')";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	header("location:add_sup.php");
	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
