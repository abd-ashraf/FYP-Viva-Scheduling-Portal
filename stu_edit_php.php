<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['stu_ID'];
	$name=$_POST['stu_name'];
	$city=$_POST['stu_city'];

	    // Prepare a select statement
	    $sql = "UPDATE user_stu SET stu_ID='$id', stu_name='$name', stu_city='$city' 
	    		WHERE stu_ID='$id';";

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
