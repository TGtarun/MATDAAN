<?php
session_start();
if(isset($_POST['send']))
		{
			require_once 'login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="INSERT INTO feedback VALUES( '{$_POST["name"]}' , '{$_POST["email"]}' ,'{$_POST["message"]}')";  
		
        $result = mysqli_query($conn , $query);
        if( !$result)
        	{  echo "Feedback could not be submitted";}
        else
        	{   header("Location:formpage.html ") ; }


		}
?>