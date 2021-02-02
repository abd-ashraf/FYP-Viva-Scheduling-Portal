<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['sup_ID'];
	$name=$_POST['sup_name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$dob=$_POST['sup_dob'];
	$groups_under_supervision=$_POST['groups_under_supervision'];
	$upcomming_viva=$_POST['upcomming_viva'];

	    // Prepare a select statement
	    $sql = "UPDATE user_sup SET sup_ID='$id', sup_name='$name', email='$email', pass='$pass', sup_dob='$dob', groups_under_supervision='$groups_under_supervision', upcomming_viva='$upcomming_viva'
	    		WHERE sup_ID='$id';";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	header("location:sup_info.php");
	    }
	    else
	    {
	    	echo("Error description: " . mysqli_error($conn));
	    }

?>
