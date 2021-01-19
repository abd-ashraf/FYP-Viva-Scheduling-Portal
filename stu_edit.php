<?php

    include 'connection.php';
    $conn = OpenCon();

	$id = "$_GET[id]";

	    // Prepare a select statement
	    $sql="SELECT * FROM user_stu WHERE stu_ID=$id";

	    $result = $conn->query($sql);

	    if($rows = $result->fetch_assoc())
	    {
	    	echo "
				<form method='POST' action='stu_edit_php.php'>
					<label>Student ID:</label><input type='text' name='stu_ID' value='$rows[stu_ID]'>
					<br><br>
					<label>Student Name:</label><input type='text' name='stu_name' value='$rows[stu_name]'>
					<br><br>
					<label>Student City:</label><input type='text' name='stu_city' value='$rows[stu_city]'>
					<br><br>
					<input type='submit' name='add'>
				</form>
	    	";
	    }
	    else
	    {
	    	echo "ERROR.";
	    }

		?>
