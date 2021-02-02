<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['sup_ID'];
	$name=$_POST['sup_name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$dob=$_POST['sup_dob'];

	$sql = "SELECT * FROM user_sup WHERE sup_ID='$id';";
	
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) == 1)
	{
		header("location: add_sup.php?error=id-exists");
		die();
	}
	$sql = "SELECT * FROM user_sup WHERE email='$email';";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) == 1)
	{
		header("location: add_sup.php?error=email-exists");
		die();
	}

	    // Prepare a select statement
	    $sql = "INSERT INTO user_sup (sup_ID, sup_name, email, pass, sup_dob)
				VALUES ('$id', '$name', '$email', '$pass', '$dob')";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	header("location: add_sup.php?error=success");
			die();
	    	//header("location:stu_info.php");
	    }
	    else
	    {
	    	echo "ERROR. $sql";
	    }

?>
