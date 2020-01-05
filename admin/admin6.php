<!DOCTYPE html>
<html>
<head>
	<title>admin6</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyq">
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
				<li><a href="admin5.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divq">
<?php
	session_start();
	 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
	if(isset($_GET["data"]))
		{
			$_SESSION["data"]=$_GET["data"];

			echo "<br>Election Name: ".$_GET["data"]."<br>";
			echo "<br>Start time: ".$_GET["est"]."<br>";
			echo "<br>End time: ".$_GET["eend"]."<br><br><br><br><br>";
		  	echo "<a href='admin7.php'>SHOW CANDIDATES</a><br><br><br>";
		  	echo "<a href='admin16.php'>EDIT Election</a><br><br><br>";
		  	echo "<a href='admin9.php'>RESULTS</a><br><br><br>";
		}

	else if($_SESSION["data"])
	{
		echo "<br>Election Name: ".$_SESSION["data"]."<br><br><br><br><br>";
		echo "<a href='admin7.php'>SHOW CANDIDATES</a><br><br><br>";
		echo "<a href='admin16.php'>EDIT Election</a><br><br><br>";
		echo "<a href='admin9.php'>RESULTS</a><br><br><br>";	
	}
}
?>
</div>
</body>
</html>
