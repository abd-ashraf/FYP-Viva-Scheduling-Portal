<?php

    include 'connection.php';
    $conn = OpenCon();

    $type = "$_GET[type]";
	$id = "$_GET[id]";


	    // Prepare a select statement
	    $sql="DELETE FROM user_stu WHERE stu_ID=$id";

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