<!DOCTYPE html>
<html>
<head>
	<title>cand9</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyb">
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
				<li><a href="cand8.php" id="xy">Go Back</a></li>
			</ul>
		</nav>
	</div>
	<div class="divb">
<?php
		session_start();
		if(($_SESSION["uid"] && $_SESSION["upass"]))
		{
			if(isset($_POST["go"]))
	{
		
		if($_POST["age"])
		{
			if($_POST["age"]<25)
			{
				echo "Minimum Age for Contesting Election is 25.";
			}

			else
			{
				require_once '../login.php';
			  	$conn = new mysqli($hn, $un, $pw, $db);
			  	if ($conn->connect_error) die("Fatal Error");
			  	$query="update candidate set age='{$_POST["age"]}' where userID ='{$_SESSION["uid"]}'";
			  	$result   = $conn->query($query);
			  	$query="update voter set age='{$_POST["age"]}' where userid ='{$_SESSION["uid"]}'";
			  	$result   = $conn->query($query);
			  	echo "Changes Done In age.<br><br>";
			}
		}

		if($_POST["mobile"])
		{
			
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="update candidate set mobile='{$_POST["mobile"]}' where userID ='{$_SESSION["uid"]}'";
		  	$result   = $conn->query($query);
		  	$query="update voter set mobile='{$_POST["mobile"]}' where userid ='{$_SESSION["uid"]}'";
		  	$result   = $conn->query($query);
		  	echo "Changes Done in Mobile.<br><br>";
			
		}

		if($_POST["address"])
		{
			
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="update candidate set address='{$_POST["address"]}' where userID ='{$_SESSION["uid"]}'";
		  	$result   = $conn->query($query);
		  	$query="update voter set address='{$_POST["address"]}' where userid ='{$_SESSION["uid"]}'";
		  	$result   = $conn->query($query);
		  	echo "Changes Done in address.<br><br>";
			
		}

		if($_POST["slogan"])
		{
			
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="update candidate set slogan='{$_POST["slogan"]}' where userID ='{$_SESSION["uid"]}'";
		  	$result   = $conn->query($query);
		  	echo "Changes Done in slogan.<br><br>";
			
		}

		if($_POST["pass"])
		{
			
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="update candidate set password='{$_POST["pass"]}' where userID ='{$_SESSION["uid"]}'";
		  	$result   = $conn->query($query);
		  	$query="update voter set pass='{$_POST["pass"]}' where userid ='{$_SESSION["uid"]}'";
		  	$result   = $conn->query($query);
		  	echo "Changes Done in password.<br><br>";
			
		}

		
		}
}
		

	?>
</div>
</body>
</html>
