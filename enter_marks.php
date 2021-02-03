<?php
	session_start();
	if (!isset($_SESSION["email"]) || $_SESSION["user_type"] != 'user_sup')
	{
		header("location: restricted.html");
	}
    include 'connection.php';
    $conn = OpenCon();

	$total=$_POST['total'];
	$obtained=$_POST['obtained'];
    $supervisor_ID = $_GET['sup_id'];
    $group_ID = $_GET['group_id'];
	// $group_ID=$_POST['group_ID'];
	// $supervisor_ID=$_POST['supervisor_ID'];

	    // Prepare a select statement
        $sql = "INSERT INTO evaluations (group_ID, supervisor_ID, total_marks, obtained_marks)
                VALUES ('$group_ID', '$supervisor_ID', '$total', '$obtained');";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    		header("location:evaluations.php");

	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
