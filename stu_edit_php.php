<?php
	session_start();
	if (!isset($_SESSION["email"]) || $_SESSION["user_type"] != 'user_sup' || $_SESSION["user_type"] != 'user_adm')
	{
		header("location: restricted.html");
	}
    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['stu_ID'];
	$name=$_POST['stu_name'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$city=$_POST['stu_city'];
	$dob=$_POST['stu_dob'];
	// $group_ID=$_POST['group_ID'];
	// $supervisor_ID=$_POST['supervisor_ID'];

	    // Prepare a select statement
	    $sql = "UPDATE user_stu SET stu_ID='$id', stu_name='$name', email='$email', pass='$pass', stu_city='$city', stu_dob='$dob' 
	    		WHERE stu_ID='$id';";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	if($_SESSION['user_type'] == 'user_adm')
	    	{
	    		header("location:stu_infoo.php");
	    	}
	    	if($_SESSION['user_type'] == 'user_sup')
	    	{
	    		header("location:stu_info.php");
	    	}
	    	if($_SESSION['user_type'] == 'user_stu')
	    	{
	    		header("location:stu_index.php");
	    	}

	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
