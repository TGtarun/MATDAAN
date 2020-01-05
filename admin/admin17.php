<!DOCTYPE html>
<html>
<head>
	<title>admin17</title>
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
				<li><a href="admin16.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
	<div class="divb">
<?php
		session_start();
		 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
		if($_SESSION["data"])
		{
			if(isset($_POST["go"]))
	{
		
		if($_POST["sd"] && $_POST["st"])
		{
			$b=$_POST["sd"];
	  		$c=$_POST["st"];
	  		$c.=":00";
	  		$b.=" ";
	  		$b.=$c;
				require_once '../login.php';
			  	$conn = new mysqli($hn, $un, $pw, $db);
			  	if ($conn->connect_error) die("Fatal Error");
			  	$query="update election set start='{$b}' where name ='{$_SESSION["data"]}'";
			  	$result   = $conn->query($query);
			  	echo "Changes done in start time<br><br>";
			
		}

		if($_POST["ed"] && $_POST["et"])
		{
			$b=$_POST["ed"];
	  		$c=$_POST["et"];
	  		$c.=":00";
	  		$b.=" ";
	  		$b.=$c;
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="update election set end='{$b}' where name ='{$_SESSION["data"]}'";
		  	$result   = $conn->query($query);
		  	echo "Changes Done in end time<br><br>";
			
		}
				
		}
}
		}

	?>
</div>
</body>
</html>
