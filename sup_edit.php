<?php

    include 'connection.php';
    $conn = OpenCon();

	$id = "$_GET[id]";

	    // Prepare a select statement
	    $sql="SELECT * FROM user_sup WHERE sup_ID=$id";

	    $result = $conn->query($sql);

	    if($rows = $result->fetch_assoc())
	    {
	    	echo "
				<form method='POST' action='sup_edit_php.php'>
					<label>Supervisor ID:</label><input type='text' name='sup_ID' value='$rows[sup_ID]'>
					<br><br>
					<label>Supervisor Name:</label><input type='text' name='sup_name' value='$rows[sup_name]'>
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
