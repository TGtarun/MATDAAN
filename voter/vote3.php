<!DOCTYPE html>
<html>
<head>
	<title>Vote3</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyf">
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
			</ul>
		</nav>
	</div>
	<div class="divf">

<?php
		session_start();
		if(($_SESSION["uid"] && $_SESSION["upass"]))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from voter where userid ='{$_SESSION["uid"]}' AND pass ='{$_SESSION["upass"]}'";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	echo "USER FROFILE : <br><br>";
		  	$row = $result->fetch_array(MYSQLI_NUM);
		    $r0 = htmlspecialchars($row[0]);
		    $r1 = htmlspecialchars($row[1]);
		    $r2 = htmlspecialchars($row[2]);
		    $r3 = htmlspecialchars($row[3]);
		    $r4 = htmlspecialchars($row[4]);
		    $r5 = htmlspecialchars($row[5]);
		    echo "*Name- ".$r0."<br>*Mobile-  ".$r1."<br>*Sex- ".$r2."<br>*Age- ".$r3."<br>*Address-  ".$r4."<br>*ID- ".$r5."<br><br>";
			echo "<br><a href='vote4.php'>show elections</a><br><br><br>";
			echo "<br><a href='vote11.php'>EDIT PROFILE</a><br><br><br>";
		}


?>
</div>
</body>
</html>




