<?php

    $stu1 = $_POST['stu1'];
    $stu2 = $_POST['stu2'];
    $group_ID = $_POST['group-id'];
    $city = $_POST['city'];

    echo $stu1, $stu2, $group_ID, $city;

    // if ($stu1 == NULL || $stu2 == NULL || $group_ID == NULL || $city == 0)
    // {
    //     header ("location: schedule-viva.php?error=no-input");
    // }

    // include 'connection.php';

    // $con = OpenCon();
    // $sql = "select * from user_stu where stu_ID = $stu1 or stu_ID = $stu2;";
    // $result = $con->query($sql);
    // if (mysqli_num_rows($result) >= 1)
    // {

    // }
    // else {
    //     header ("location: schedule-viva.php?error=sql-error");
    // }
?>