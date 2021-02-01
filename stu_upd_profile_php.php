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
	    $sql = "UPDATE user_stu SET stu_ID='$id', stu_name='$name', email='$email', pass='$pass', stu_city='$city', stu_dob='$dob'
				WHERE stu_ID='$id';";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	echo "Updated Successfully";
	    	header("location:stu_index.php");
	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
