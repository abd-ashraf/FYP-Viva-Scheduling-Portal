<?php
	
	// Initialize the session
	//session_start();
	 
	// Include config file
	//require_once "config.php";

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
	echo "Connection Successful <br>";

	//Define Variables and intialize them with form input value
	$email = $_POST["email"];
	$password = $_POST['password'];
	$ToU = $_POST['ToU'];

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
        // Prepare a select statement
       $sql="SELECT * FROM  $ToU WHERE  email='$email' and password='$password'";

       $result = $conn -> query($sql);

        if(mysqli_num_rows($result)==1)
        {
        	if($ToU == 'user_stu')
        	{
	            //session_start();

	            // Store data in session variables
	            //$_SESSION["username"] = $username;
	            //$_SESSION["password"] = $password;     

	            echo "Welcome Student <br>";                     
	            
	            // Redirect Student to Home Page
	            header("location: stu_index.html");    			
        	}
	        else if($ToU == 'user_sup')
	        {
	            //session_start();

	            // Store data in session variables
	            //$_SESSION["username"] = $username;
	            //$_SESSION["password"] = $password;  

	            echo "Welcome Supervisor <br>";                          
	            
	            // Redirect Supervisor to Home Page
	            header("location: sup_index.html");	
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
	        else
	        {
	            echo"<script>alert('Error login')</script>";
	            //echo"<script>window.open('login.html','_self')</script>";
	        }
		}   
	}

	//closing DB connection
	$conn->close();
?>