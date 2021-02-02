<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['stu_ID'];
	$name=$_POST['stu_name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$city=$_POST['stu_city'];
	$dob=$_POST['stu_dob'];

	$sql = "SELECT * FROM user_stu WHERE stu_ID='$id';";
	
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) == 1)
	{
		header("location: add_stu.php?error=id-exists");
		die();
	}
	$sql = "SELECT * FROM user_stu WHERE email='$email';";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) == 1)
	{
		header("location: add_stu.php?error=email-exists");
		die();
	}

	    // Prepare a select statement
	    $sql = "INSERT INTO user_stu (stu_ID, stu_name, email, pass, stu_city, stu_dob)
				VALUES ('$id', '$name', '$email', '$pass', '$city', '$dob')";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	header("location: add_stu.php?error=success");
			die();
	    	//header("location:stu_info.php");
	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
