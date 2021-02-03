<?php
	session_start();
	if (!isset($_SESSION["email"]) || $_SESSION["user_type"] != 'user_sup')
	{
		header("location: restricted.html");
	}
    include 'connection.php';
    $conn = OpenCon();

	$date=$_POST['date'];
	$time=$_POST['time'];
	$id=$_POST['id'];
	// $group_ID=$_POST['group_ID'];
	// $supervisor_ID=$_POST['supervisor_ID'];

	    // Prepare a select statement
	    $sql = "UPDATE viva SET viva_date='$date', viva_time='$time'
	    		WHERE viva_ID='$id';";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    		header("location:reschedule-viva.php");

	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
