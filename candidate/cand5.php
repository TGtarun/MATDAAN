<!DOCTYPE html>
<html>
<head>
	<title>cand5</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyd">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="cand3.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="cand3.php" id="xy">Go Back</a></li>
			</ul>
		</nav>
	</div>
	<div class="div3">
		<p class="para3">
	<?php
		session_start();
		if(($_SESSION["uid"] && $_SESSION["upass"]&&isset($_GET["data"]) ))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from requestElection where userid ='{$_SESSION["uid"]}' AND comment='pending'";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	if($users==0)
		  	{
		  		$str='pending';
		  		$query = "INSERT INTO requestElection VALUES('{$_SESSION["uid"]}','{$_GET["data"]}','{$str}')";
		    	$result   = $conn->query($query);
		    	echo "Election request has sent to admin.<br><br>";
		    	if (!$result) echo "Registeration Failed<br><br>";
		  	}

		  	else if($users==1)
		  	{
		  		$query="UPDATE requestElection SET contestElection = '{$_GET["data"]}' where userID ='{$_SESSION["uid"]}' AND comment='pending'";  
		  	$result   = $conn->query($query);
		  	if (!$result) echo "Registeration Failed<br><br>";
		  	echo "Election request has sent to admin<br><br>";
		  	
		  	}
		  	
		}

?>

</p>
</div>
</body>
</html>






