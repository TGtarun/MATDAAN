<!DOCTYPE html>
<html>
<head>
	<title>Vote2</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="body3">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="vote1.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="#" id="xy">Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
			</ul>
		</nav>
	</div>
	<div class="div3">
	<p class="para3">
	<?php
	
	if(isset($_POST["go"]))
	{
	if(!($_POST["age"] && $_POST["name"] &&$_POST["mobile"] && $_POST["sex"] &&$_POST["pass"]&&$_POST["address"]&&$_POST["aadhar"]))
		{
			echo "Please Fill all Credentials..<br><br>";
		}

		else if($_POST["age"]<18)
		{
			echo "Minimum Age for voting is 18..<br>You Are Not Eligible<br><br>";
		}

		else  //check user already exists or not by quering sql if not insert data and assign random userid
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from voter where adhaar ='{$_POST["aadhar"]}'";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	if($users!=0)
		  	{
		  		echo "Voter Already Exists.<br><br>";
		  	}
		  	else
		  	{
		  		$userid=rand();
		  		$a= $_POST["name"];
		  		$b=$_POST["mobile"];
		  		$c=$_POST["sex"];
		  		$d=$_POST["age"];
		  		$e=$_POST["address"];
		  		$f=$_POST["aadhar"];
		  		$g=$userid;
		  		$h=$_POST["pass"];

		  		$query = "INSERT INTO voter(name,mobile,sex,age,address,adhaar,userid,pass) VALUES('{$a}','{$b}','{$c}' ,'{$d}','{$e}','{$f}','{$g}','{$h}')";
		    	$result   = $conn->query($query);
		    	if (!$result) echo "Registeration Failed<br><br>";
		    	else
		    	{
		    		echo "Successfully Registered.<br>";
		    		echo "Your Auto Generated userid is ";
		    		echo $userid."<br><br>";
		    	}

		  	}
		}
	}
?>
</p>

</div>
</body>
</html>



