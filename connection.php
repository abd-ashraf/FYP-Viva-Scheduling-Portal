<?php
    
    // Initialize the session
    //session_start();
     
    // Include config file
    //require_once "config.php";

    function OpenCon() 
    {

        $servername = "localhost";
        $user = "root";
        $pass = "";
        $db = "fyp_viva_scheduling";

        //Making Connection
        $conn = new mysqli ($servername,$user, $pass, $db);

        //verify connection 
        if ($conn->connect_error)
        {
            die("Connection failed... ".$conn->connect_error."<br>");
        }

        return $conn;
    }


    function CloseCon($conn)
    {
        $conn->close();
    }

?>
