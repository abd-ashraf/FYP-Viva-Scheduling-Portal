<?php
	
	// Initialize the session
	//session_start();
	 
	// Include config file
	//require_once "config.php";

	include "connection.php";

	$conn = OpenCon();

	//verify connection 
	if ($conn->connect_error)
	{
		die("Connection failed... ".$conn->connect_error."<br>");
	}
	echo "Connection Successful <br>";

	//Define Variables and intialize them with form input value
	$email = $_POST["email"];
	$password = $_POST['password'];
	$ToU = $_POST['ToU'];

	if ($ToU == '0') {
		echo"<script>alert('Error login');</script>";
		die();
	}

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
			// Prepare a select statement
		$sql="SELECT * FROM  $ToU WHERE  email='$email' and pass='$password'";

		$result = $conn -> query($sql);

		$data = $result->fetch_array(MYSQLI_ASSOC);

        if(mysqli_num_rows($result)==1)
        {

        	if($ToU == 'user_stu')
        	{
				session_start();
				//Store data in session variables
				$_SESSION["email"] = $email;
				$_SESSION["password"] = $password;  
				$_SESSION["user_type"] = $ToU; 

				$_SESSION["name"] = $data["stu_name"];
				$_SESSION["id"] = $data["stu_ID"];
				$_SESSION["age"] = $data["stu_age"];
				$_SESSION["dob"] = $data["stu_dob"];
				$_SESSION["under_supervision"] = $data["groups_under_supervision"];
				$_SESSION["upcomming_viva"] = $data["upcomming_viva"];

				echo "Welcome Student <br>";   
				
	            // Redirect Student to Home Page
	            header("location: stu_index.php");    			
        	}
	        else if($ToU == 'user_sup')
	        {
				session_start();
				//Store data in session variables
				$_SESSION["email"] = $email;
				$_SESSION["password"] = $password;  
				$_SESSION["user_type"] = $ToU; 

				$_SESSION["name"] = $data["sup_name"];
				$_SESSION["age"] = $data["sup_age"];
				$_SESSION["dob"] = $data["sup_dob"];
				$_SESSION["under_supervision"] = $data["groups_under_supervision"];
				$_SESSION["upcomming_viva"] = $data["upcomming_viva"];

	            echo "Welcome Supervisor <br>";                          
	            
	            // Redirect Supervisor to Home Page
	            header("location: sup_index.php");	
	        }
	        else if($ToU == 'user_adm')
	        {
				session_start();
				//Store data in session variables
				$_SESSION["email"] = $email;
				$_SESSION["password"] = $password;  
				$_SESSION["user_type"] = $ToU; 
				
				$_SESSION["name"] = $data["adm_name"];
				$_SESSION["age"] = $data["adm_age"];
				$_SESSION["dob"] = $data["adm_dob"];
				$_SESSION["under_supervision"] = $data["groups_under_supervision"];
				$_SESSION["upcomming_viva"] = $data["upcomming_viva"]; 

	            echo "Welcome Admin <br>";                        
	            
	            // Redirect Admin to Home Page
	            header("location: adm_index.php");
	        }
		}
		else
		{
			echo"<script>alert('Error login');</script>";
			//echo"<script>window.open('login.html','_self')</script>";
		}   
	}

	//closing DB connection
	$conn->close();
?>