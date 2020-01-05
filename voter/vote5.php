<!DOCTYPE html>
<html>
<head>
	<title>Vote5</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyh">
	<div id="main">
		<nav>
		<img src="../images/my.png" height="50" width="150">
			<ul>
				<li><a href="vote3.php" id="xy">Home</a></li>
				<li><a href="../nav_bar/about.html" id="xy">About</a></li>
				<li><a href="../nav_bar/formpage.html" id="xy">Contact</a></li>
				<li><a href="../Instructions.pdf" id="xy" download>Instructions</a></li>
				<li><a href="#" id="xy">FAQs</a></li>
				<li><a href="../logout.php" id="xy">Logout</a></li>
				<li><a href="vote4.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divh">
<?php
	session_start();
	if(($_SESSION["uid"] && $_SESSION["upass"] ))
		{
			if(isset($_GET["data"]))   //get[data] is election name
			{
			$_SESSION["data"]=$_GET["data"];
			echo "Election name :-".$_GET["data"]."<br><br><br>";
		  	echo "<a href='vote6.php'>SHOW CANDIDATES</a><br><br><br>";
		  	echo "<a href='vote13.php'>CAST VOTE</a><br><br><br>";
		  	echo "<a href='vote10.php'>RESULTS</a><br><br><br>";
			}

			else if($_SESSION["data"])
			{
				echo "Election name :-".$_SESSION["data"]."<br><br><br>";
		  	echo "<a href='vote6.php'>SHOW CANDIDATES</a><br><br><br>";
		  	echo "<a href='vote13.php'>CAST VOTE</a><br><br><br>";
		  	echo "<a href='vote10.php'>RESULTS</a><br><br><br>";
			}
			
		}
?>
</div>
</body>
</html>



