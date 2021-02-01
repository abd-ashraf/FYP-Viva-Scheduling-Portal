<?php

    include 'connection.php';
    $conn = OpenCon();

	$id=$_POST['sup_ID'];
	$name=$_POST['sup_name'];

	    // Prepare a select statement
	    $sql = "UPDATE user_sup SET sup_ID='$id', sup_name='$name' 
	    		WHERE sup_ID='$id';";

	    $result = $conn->query($sql);

	    if($result)
	    {
	    	header("location:sup_info.php");
	    }
	    else
	    {
	    	echo "ERROR.";
	    }

?>
