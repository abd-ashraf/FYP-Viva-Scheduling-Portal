<?php

function connect_db()
{
    $servername = "localhost";
	$user = "root";
	$pass = "";
	$db = "fyp_viva_scheduling";

	//Making Connection
    $conn = new mysqli ($servername,$user, $pass, $db);
    
    return $conn;
}

?>