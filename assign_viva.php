<?php

$date = $_POST['viva_date'];
$time = $_POST['viva_time'];
$viva_location = $_POST['viva_location'];
$group_ID = $_POST['group_ID'];

include 'connection.php';
$con = OpenCon();

$sql = "insert into viva (viva_location, viva_date, viva_time, group_ID) VALUES('$viva_location', '$date', '$time', '$group_ID');";

$result = $con->query($sql);

if ($con->connect_error)
{
    die("Connection failed... ".$conn->connect_error."<br>");
}

echo $sql;

?>