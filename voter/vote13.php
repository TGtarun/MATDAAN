<!DOCTYPE html>
<html>
<head>
	<title>Vote13</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodyk">
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
				<li><a href="vote5.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divk">
<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
if(($_SESSION["uid"] && $_SESSION["upass"]&&$_SESSION["data"] ))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from election where name ='{$_SESSION["data"]}'";
		  	$result   = $conn->query($query);
		  	$users1 = $result->num_rows;
  			if($users1==1)
  			{
  				$rowe = $result->fetch_array(MYSQLI_NUM);
        		$e0 = htmlspecialchars($rowe[0]);
        		$e1 = htmlspecialchars($rowe[1]);
    			$e2 = htmlspecialchars($rowe[2]);
    			$start = strtotime($e1);
    			$end = strtotime($e2); 
				$now= date("Y-m-d H:i:s");
				  if(date('Y-m-d H:i:s', $start) > $now)
				  {
				    echo "CASTING WILL STARTS IN FUTURE.<br><br>";
				  }

				  else if(date('Y-m-d H:i:s', $end) <$now)
				  {
				  	echo "CASTING FINISHED.<br><br>";
				  }

				  else if(date('Y-m-d H:i:s', $start) <= $now && date('Y-m-d H:i:s', $end) >=$now)
				  {
				  	header("Location: vote8.php");
				  }
		  	}
		  	
		}
?>
</div>
</body>
</html>











