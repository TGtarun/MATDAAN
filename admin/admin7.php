<!DOCTYPE html>
<html>
<head>
	<title>admin7</title>
	<link rel="stylesheet" href="../css/stylefp1.css">
</head>
<body class="bodyr">
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
				<li><a href="admin6.php" id="xy">Goback</a></li>
			</ul>
		</nav>
	</div>
<div class="divr">
<?php
session_start();
 if($_SESSION["uid"]&& $_SESSION["upass"])
  {
if($_SESSION["data"])
		{
			require_once '../login.php';
		  	$conn = new mysqli($hn, $un, $pw, $db);
		  	if ($conn->connect_error) die("Fatal Error");
		  	$query="select * from candidate where contestElection ='{$_SESSION["data"]}'";
		  	$result   = $conn->query($query);
		  	$users = $result->num_rows;
		  	echo "CANDIDATE CONTESTING:<br><br>";
		  	if($users>0)
		  	{
		  		echo "<table border='1' id= results>
				<tr>
				<th>SR.NO</th>
				<th>Candidate Name</th>
				<th>Candidate ID</th>
				<th>Details</th>
				</tr>";
		  		for($i=0;$i<$users;$i++)
	            {
	            	$row = $result->fetch_array(MYSQLI_NUM);
	            	$r8 = htmlspecialchars($row[8]);
	            	$r0 = htmlspecialchars($row[0]);
	            	$r5 = htmlspecialchars($row[5]);
	            	 echo "<tr>"; 
		   /* echo ($j+1)."<a href='admin11.php?data=".$r0."& elec=".$r1."'>approve</a>";*/
				    echo"<td>". ($i+1)."</td>";
				    echo"<td>". $r0."</td>";
				    echo"<td>". $r5."</td>";
				    echo "<td>" . "<a href='admin8.php?data=".$r5."'>Details</a>" . "</td>";
				    echo "</tr>";
	            }

	            echo '</table>';
		  	
		}

		else
		{
			echo "NO Candidate Contesting.<br><br>";
		}
	}

}

?>
</div>
</body>
</html>




