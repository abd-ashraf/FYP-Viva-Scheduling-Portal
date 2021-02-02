<?php

function send_mail($group_ID, $stu1, $stu2, $viva_location, $date, $time, $con){
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );

    $from = "f180300@cfd.nu.edu.pk";

    $stu1email=ret_email($stu1,$con);
    $stu2email=ret_email($stu2,$con);

	$to = "$stu1email , $stu2email";

    $subject = "FYP Viva Notifier";

    $message = "
		<html>
		<head>
			<style>
				table, th, td {
								  border: 1px solid black;
								  border-collapse: collapse;
							}
				th, td {
						  padding: 15px;
						}
				th {
					  text-align: left;
					}
				table {
						  border-spacing: 5px;
						}
			</style>
		</head>
		<body>
					<p>You are required to appear for VIVA according to below given details:</p>
					<table>
						<tr style='background-color: #add8e6;'>
							<th>Group ID</th><th>Student ID 1</th><th>Student ID 2</th><th>Viva Date and Time</th><th>Viva Station</th>
						</tr>
						<tr>
							<td><?php echo '$group_ID'; ?></td> <td><?php echo '$stu1'; ?></td> <td><?php echo '$stu2'; ?></td> <td><?php echo '$date -- $time'; ?></td> <td><?php echo '$viva_location'; ?></td>
						</tr>
					</table>
		</body>
		</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    if(mail($to,$subject,$message, $headers)) 
    {
		echo "The email message was sent.";
    } 
    else 
    {
    	echo "The email message was not sent.";
    }
}

function ret_email($std, $con){

	// Prepare a select statement
    $sql="SELECT * FROM user_stu WHERE $std=stu_ID;";

    $result = $con->query($sql);

    if(mysqli_num_rows($result) > 0)
    {
        while($rows = $result->fetch_assoc())
        {
        	$stuemail=$rows['email'];
		}
	}
	return $stuemail;
}

?>

