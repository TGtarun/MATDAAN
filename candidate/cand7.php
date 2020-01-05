<!DOCTYPE html>
<html>
<head>
	<title>cand7</title>
	<link rel="stylesheet" href="../css/stylefp1.css">
</head>
<body class="bodye">
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
	<div class="dive">
<?php

session_start();
		if(($_SESSION["uid"] && $_SESSION["upass"]))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from requestElection where userid='{$_SESSION['uid']}'";  //change sign of less than or greater than
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	
		  	if($users==0)
		  	{
		  		header("Location: cand4.php");
		  		
		  	}

		  	else if($users==1)
		  	{
		  		$row = $result->fetch_array(MYSQLI_NUM);
	            $r2 = htmlspecialchars($row[2]);
	            $r1 = htmlspecialchars($row[1]);
	            if($r2=="completed")
	            {
	            	echo "Choosed election is ".$r1." <br><br>";
	            }

	            else if($r2=='pending')
	            {
	            	echo 'Your request for '.$r1." is pending <br><br>";
	            }

	            else
	            {
	            	echo 'Your request for '.$r1." is ".$r2." <br><br>";
	            	$query="delete from requestElection where userid='{$_SESSION['uid']}'";  
		  			$result   = $conn->query($query);
		  			echo "<a href='cand7.php'>choose election to contest Again</a><br><br><br>";

	            }
		  	}
		}

?>

</div>
</body>
</html>

