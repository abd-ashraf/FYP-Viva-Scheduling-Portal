<?php

session_start();

$stu1 = $_POST['stu1'];
$stu2 = $_POST['stu2'];
$supID = $_SESSION['id'];
$date = $_POST['viva_date'];
$time = $_POST['viva_time'];
$viva_location = $_POST['viva_location'];
$group_ID = $_POST['group_ID'];

include 'connection.php';
$con = OpenCon();

$sql = "insert into viva (viva_location, viva_date, viva_time, supervisor_ID, group_ID) VALUES('$viva_location', '$date', '$time', '$supID', '$group_ID');";

$result = $con->query($sql);

$sql = "SELECT AUTO_INCREMENT
FROM information_schema.TABLES
WHERE TABLE_SCHEMA = 'fyp_viva_scheduling'
AND TABLE_NAME = 'viva'";

$result = $con->query($sql);

$data = $result->fetch_assoc();

$viva_ID = $data['AUTO_INCREMENT'] - 1;

$sql = "INSERT INTO stu_group (group_ID, study_center, supervisor_ID, viva_ID) VALUES ('$group_ID', '$viva_location', '$supID', '$viva_ID');";

$result = $con->query($sql);

$sql = "UPDATE user_stu SET group_ID='$group_ID', supervisor_ID='$supID' WHERE stu_ID='$stu1';";

echo $sql, '</br>';

$result = $con->query($sql);

$sql = "UPDATE user_stu SET group_ID='$group_ID', supervisor_ID='$supID' WHERE stu_ID='$stu2';";

echo $sql, '</br>';

$result = $con->query($sql);

// echo $sql, '</br>';

// echo $stu1, $stu2, $date, $time, $viva_location, $group_ID, '</br>';

// echo $_SESSION['id'], '</br>';

?>