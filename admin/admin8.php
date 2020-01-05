<!DOCTYPE html>
<html>
<head>
	<title>admin8</title>
	<link rel="stylesheet" href="../css/stylefp.css">
</head>
<body class="bodys">
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
				<li><a href="admin7.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divs">
<?php
session_start();
 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
if(isset($_GET["data"]))
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from candidate where adhaar ='{$_GET["data"]}'";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	echo "CANDIDATE PROFILE:<br><br>";
		  	if($users>0)
		  	{
		  		for($i=0;$i<$users;$i++)
	            {
	            	$row = $result->fetch_array(MYSQLI_NUM);
				    $r0 = htmlspecialchars($row[0]);
				    $r1 = htmlspecialchars($row[1]);
				    $r2 = htmlspecialchars($row[2]);
				    $r3 = htmlspecialchars($row[3]);
				    $r4 = htmlspecialchars($row[4]);
				    $r5 = htmlspecialchars($row[5]);
				    $r6 = htmlspecialchars($row[6]);
				    $r10 = htmlspecialchars($row[10]);
				    echo "*Name- ".$r0."<br>*Age- ".$r1."<br>*Sex- ".$r2."<br>*Mobile- ".$r3."<br>*Address- ".$r4."<br>*Adhaar- ".$r5."<br>*Slogan- ".$r6."<br>*Election Participate- ".$r10."<br><br>";
	            }
		  	
			}
	}

}

?>
</div>
</body>
</html>






