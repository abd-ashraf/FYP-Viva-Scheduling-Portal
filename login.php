<?php
	
	// Initialize the session
	//session_start();
	 
	// Include config file
	//require_once "config.php";

	include "connection.php";

	$conn = connect_db();

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

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
			// Prepare a select statement
		$sql="SELECT * FROM  $ToU WHERE  email='$email' and pass='$password'";

		$result = $conn -> query($sql);

        if(mysqli_num_rows($result)==1)
        {

			session_start();
			//Store data in session variables
			$_SESSION["email"] = $email;
			$_SESSION["password"] = $password;  
			$_SESSION["user_type"] = $ToU; 

        	if($ToU == 'user_stu')
        	{
	            echo "Welcome Student <br>";                     
	            
	            // Redirect Student to Home Page
	            header("location: stu_index.php");    			
        	}
	        else if($ToU == 'user_sup')
	        {
	            //session_start();

	            // Store data in session variables
	            //$_SESSION["username"] = $username;
	            //$_SESSION["password"] = $password;  

	            echo "Welcome Supervisor <br>";                          
	            
	            // Redirect Supervisor to Home Page
	            header("location: sup_index.php");	
	        }
	        else if($ToU == 'user_adm')
	        {
	            //session_start();

	            // Store data in session variables
	            //$_SESSION["username"] = $username;
	            //$_SESSION["password"] = $password;    

	            echo "Welcome Admin <br>";                        
	            
	            // Redirect Admin to Home Page
	            header("location: adm_index.html");
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