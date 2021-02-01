<?php

    include 'connection.php';
    $conn = OpenCon();

    $type = "$_GET[type]";
	$id = "$_GET[id]";


	    // Prepare a select statement
	    $sql="DELETE FROM user_sup WHERE sup_ID=$id";

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