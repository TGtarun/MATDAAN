<!DOCTYPE html>
<html>
<head>
	<title>cand3</title>
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
			</ul>
		</nav>
	</div>
	<div class="divb1">
<?php
		session_start();
		if(($_SESSION["uid"] && $_SESSION["upass"]))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from candidate where userID ='{$_SESSION["uid"]}' AND password ='{$_SESSION["upass"]}'";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	echo "CANDIDATE PROFILE:<br><br>";
		  	$row = $result->fetch_array(MYSQLI_NUM);
		  			$r0 = htmlspecialchars($row[0]);
				    $r1 = htmlspecialchars($row[1]);
				    $r2 = htmlspecialchars($row[2]);
				    $r3 = htmlspecialchars($row[3]);
				    $r4 = htmlspecialchars($row[4]);
				    $r5 = htmlspecialchars($row[5]);
				    $r6 = htmlspecialchars($row[6]);
				    $r9 = htmlspecialchars($row[10]);
				    echo "*Name- ".$r0."<br>*Age- ".$r1."<br>*Sex- ".$r2."<br>*Mobile- ".$r3."<br>*Address- ".$r4."<br>*ID- ".$r5."<br>*Slogan- ".$r6."<br>*Election Participate- ".$r9."<br><br><br><br><br>";
				    echo "<a href='cand7.php'>choose election to contest</a><br><br><br>";
				    echo "<a href='cand8.php'>EDIT PROFILE</a><br><br><br>";
		echo "<a href='cand6.php'>results</a><br><br><br>";
		}

		

	?>
</div>
</body>
</html>

