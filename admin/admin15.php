<!DOCTYPE html>
<html>
<head>
	<title>admin15</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyb">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="admin1.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="admin14.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
	<div class="divb">
<?php

		session_start();
		 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
		if(isset($_GET["data"]) && $_SESSION["voterid"])
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from voterlist where username ='{$_SESSION["voterid"]}' AND elecname='{$_GET["data"]}' ";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	if($users!=0)
		  	{
		  		echo "Election already added.<br><br>";
		  	}
		  	else
		  	{
		  		require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  		$query = "INSERT INTO voterlist VALUES('{$_SESSION["voterid"]}','{$_GET["data"]}','0')";
	    		$result   = $conn->query($query);
	    		if (!$result) echo "Addition Failed<br><br>";
	    		else
	    		{
	    			header("Location: admin14.php");
	    		}
		  	}
		}
}
		

?>
</div>
</body>
</html>
